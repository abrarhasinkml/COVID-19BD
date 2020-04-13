# -*- coding: utf-8 -*-
"""
Created on Sun Apr  5 00:41:36 2020

@author: Acer
"""

import pandas as pd
import mysql.connector
from mysql.connector import Error
import datetime
#Read the csv file into a dataframe first
iedcr_data=pd.read_csv('data.csv')
#get the last update
get_last_update=iedcr_data.iloc[-1]
print(get_last_update)

def DftoSql(dataframe):
    h=dataframe.columns
    
    try:
        conn=mysql.connector.connect(host='localhost', user='root', password='', database='covid19bd', charset='utf8')
        #Creating cursor
        cur=conn.cursor()
        cur.execute('delete from iedcrdata')
        conn.commit()
        for(row, rs) in dataframe.iterrows():
            temp=rs[0]
            a=datetime.datetime.strptime(temp, "%d/%m/%Y").date()
            #print(type(a))
            b=rs[1]
            c=rs[2]
            d=rs[3]
            e=rs[4]
            f=rs[5]
            g=rs[6]
            h=rs[7]
            i=rs[8]
            j=rs[9]
            k=rs[10]
            query="insert into iedcrdata values ('{}', {}, {}, {}, {}, {}, {}, {}, {}, {}, {})".format(a,b,c,d,e,f,g,h,i,j,k) 
            #query="insert into iedcrdata values ("+ a +",'"+ b +"','"+ c +"','"+ d +"','"+ e +"','"+ f +"','"+ g +"','"+ h +"','"+ i +"','"+ j +"','"+ k +"')" 
            print(query)
            cur.execute(query)
        conn.commit()
        cur.close()
    except Error as e:
        print("Error in MySQL connection :", e)
        logfile=open("dbWriter.txt", 'a').write("'{}' data could not be stored in DB\n".format(datetime.date.today()))
        logfile.close()
    finally:
        conn.close()
        

DftoSql(iedcr_data)

            


