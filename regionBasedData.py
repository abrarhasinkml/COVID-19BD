# -*- coding: utf-8 -*-
"""
Created on Wed Apr  8 02:02:42 2020

@author: Acer
"""
import requests
import pandas as pd
import camelot
import mysql.connector
from mysql.connector import Error
import  re
from bs4 import BeautifulSoup

iedcr_web="https://www.iedcr.gov.bd"
request_web=requests.get(iedcr_web).text
soup=BeautifulSoup(request_web, 'html.parser')
dash=soup.find('section', id='innermid')

find_url=dash.findAll('a')
theUrlweNeed=find_url[-1]['href']

headers = {'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36'}

#Let's get the pdf first
pdfUrl=iedcr_web+theUrlweNeed
pdf=requests.get(pdfUrl)

#pdf=requests.get('https://www.iedcr.gov.bd/images/files/nCoV/Today_9th.pdf', headers=headers)

#Now let's write it to a temp file
tempPdf=open('temp.pdf', 'wb').write(pdf.content)

#Let's start reading the pdf now
reader=open('temp.pdf', 'rb')
tables=camelot.read_pdf('temp.pdf', pages='1-end')
regionData=tables[0].df
dhakaData=tables[1].df
dhakaData2=tables[2].df

dhakaData=pd.concat([dhakaData, dhakaData2], ignore_index=True)
dhakaData.drop(index=50, axis=1, inplace=True)

regionData.drop(labels=0, axis=1, inplace=True)
regionData[3]=regionData[1].map(lambda x:re.sub(r'\W+', ' ', x))    
regionData.drop(labels=1, axis=1, inplace=True)

regionData.columns=regionData.iloc[0]
regionData.drop(index=0, axis=0, inplace=True)
regionData.set_index('District City', inplace=True)

dhakaData.columns=dhakaData.iloc[0]
dhakaData.drop(index=0, inplace=True)

dhakaData.set_index('Location', inplace=True)



##LETS SAVE TO THE DB##

def DftoSql(dataframe, tableName):
    dataframe.reset_index(inplace=True)
    try:
        conn=mysql.connector.connect(host='localhost', user='root', password='', database='covid19bd', charset='utf8')
        #Creating cursor
        cur=conn.cursor()
        cur.execute('delete from {}'.format(tableName))
        conn.commit()
        for(row, rs) in dataframe.iterrows():
            a=rs[0]
            b=rs[1]
            query="insert into {} values ('{}', {})".format(tableName,a,b) 
            #query="insert into iedcrdata values ("+ a +",'"+ b +"','"+ c +"','"+ d +"','"+ e +"','"+ f +"','"+ g +"','"+ h +"','"+ i +"','"+ j +"','"+ k +"')" 
            print(query)
            cur.execute(query)
        conn.commit()
        cur.close()
    except Error as e:
        print("Error in MySQL connection :", e)
    finally:
        conn.close()
        

DftoSql(regionData, 'regionData')

DftoSql(dhakaData, 'dhakaData')

import os
reader.close()
os.remove('temp.pdf')

#regionData.to_csv('regionData.csv')
#dhakaData.to_csv('dhakaData.csv')
