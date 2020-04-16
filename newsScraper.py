# -*- coding: utf-8 -*-
"""
Created on Fri Apr 10 19:29:45 2020

@author: Acer
"""
import re
from bs4 import BeautifulSoup
import requests
import pandas as pd
import datetime
import time
import mysql.connector
from mysql.connector import Error

date=datetime.date.today()

headers = {'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36'}

columns=['date', 'Title', 'image', 'link', 'Source']
newsLists=[]

##NEWS SCRAPING WEBPAGES##
ittefaq_bd="https://www.ittefaq.com.bd/national"
ntv_bd="https://www.ntvbd.com/bangladesh"
prothom_alo="https://www.prothomalo.com/bangladesh"
bbc_bangla="https://www.bbc.com/bengali"
##SCRAPER FOR ITTEFAQ##
ittefaq_url="https://www.ittefaq.com.bd"
url_req=requests.get(ittefaq_bd).text
ittefaqSoup=BeautifulSoup(url_req, "html.parser")
topNews=ittefaqSoup.findAll('div', class_="col-md-6 col-sm-6")
subNews=ittefaqSoup.findAll('div', class_="col-md-4 col-sm-4")
for i in topNews:
    d=date
    title=i.find('h2').text
    image=ittefaq_url+i.find('img')['src']
    link=i.find('a')['href']
    src=ittefaq_url
    news=[d, title, image, link, src]
    newsLists.append(news)

for i in subNews:
    d=date
    title=i.find('h2').text
    image=ittefaq_url+i.find('img')['src']
    link=i.find('a')['href']
    src=ittefaq_url
    news=[d,title,image,link,src]
    newsLists.append(news)
    
##SCRAPPER FOR NTV_BD##
#ntv_base="https://www.ntvbd.com"
#ntv_req=requests.get(ntv_bd).text
#ntvSoup=BeautifulSoup(ntv_req, 'html.parser')
#mostClicked=ntvSoup.findAll('div', class_="tabs-panel is-active")
#i=0
#for i in mostClicked:
#    d=date
#    get_link=i.findAll('a')
#    for j in get_link:
#        link=ntv_base+j['href']
#        new_req=requests.get(link).text
#        tempSoup=BeautifulSoup(new_req, 'html.parser')
#        title=tempSoup.find('meta', property='og:title')['content']
#        image=tempSoup.find('meta', property='og:image')['content']
#        src=ntv_base
#        news=[d, title, image, link, src]
#        newsLists.append(news)
        
##SCRAPPER FOR PROTHOM ALO##
prothomalo_base="https://www.prothomalo.com"
pa_req=requests.get(prothom_alo).text
prothomSoup=BeautifulSoup(pa_req, 'html.parser')
topContent=prothomSoup.find('div', id='wrapper_51686').find('div',class_='inner')
subtopContent=prothomSoup.find('div', id="widget_103086").findAll('div', class_="col col3")
i=0
for i in topContent:
    d=date
    link=prothomalo_base+i.find('a')['href']
    image=i.find('img')['src']
    title=i.find('h2').text
    src=prothomalo_base
    news=[d,title,image,link,src]
    newsLists.append(news)
j=0
for j in subtopContent:
    d=date
    link=prothomalo_base+j.find('a')['href']
    image=j.find('img')['src']
    title=j.find('h2').text
    src=prothomalo_base
    news=[d,title,image,link,src]
    newsLists.append(news)
    
    
##SCRAPPER FOR BBC BANGLA##
bbc_base='https://www.bbc.com'
bbc_req=requests.get(bbc_bangla, headers=headers).text
bbcSoup=BeautifulSoup(bbc_req, 'html.parser')
mRead=bbcSoup.findAll('li', class_="StoryPromoLi-sc-171lqjd-0")[0:9]

i=0
for i in mRead:
    d=date
    get_links=i.findAll('a')
    for j in get_links:
        link=bbc_base+j['href']
        req=requests.get(link).text
        tempSoup=BeautifulSoup(req, 'html.parser')
        title=tempSoup.find('meta', property="og:title")['content']
        image=tempSoup.find('meta', property="og:image")['content']
        src=bbc_base
        news=[d,title,image,link,src]
        newsLists.append(news)


##DHAKA TRIBUNE##

dtlink="https://www.dhakatribune.com"
req_dtlink=requests.get(dtlink, headers).text

dtsoup=BeautifulSoup(req_dtlink, 'html.parser')
findlinks=dtsoup.find('section', class_='banner_btm-cont').findAll('a')


for i in findlinks:
    d=date
    newlink=dtlink+i['href']
    newRequest=requests.get(newlink,headers).text
    newSoup=BeautifulSoup(newRequest,'html.parser')
    title=newSoup.find('meta', property='og:title')['content']
    image=newSoup.find('meta', property='og:image')['content']
    url=newlink
    source=dtlink
    news=[d,title,image,url,source]
    newsLists.append(news)
            

##BANGLA DT##
bdtlink="https://bangla.dhakatribune.com/articles/bangladesh"
req_bdtlink=requests.get(bdtlink, headers).text

bdtsoup=BeautifulSoup(req_bdtlink, 'html.parser')
bfindlinks=bdtsoup.findAll('div', class_="col-sm-4")
base_url="https://bangla.dhakatribune.com"
for i in bfindlinks:
     findurl=i.find('a')['href']
     newUrl=base_url+findurl
     newReq=requests.get(newUrl).text
     newSoup=BeautifulSoup(newReq, 'html.parser')
     title=newSoup.find('meta', property="og:title")['content']
     image=newSoup.find('meta', property='og:image')['content']
     url=newUrl
     src=base_url
     news=[d,title,image,url,src]
     newsLists.append(news)
     time.sleep(2)
            


##NOW CREATING A DATAFRAME FROM THE NESTED LISTS##

newsUpdate=pd.DataFrame(newsLists, columns=columns) 
##PUSH TO DB##
def DftoSql(dataframe, tableName):
    try:
        conn=mysql.connector.connect(host='localhost', user='root', password='', database='covid19bd', charset='utf8')
        #Creating cursor
        cur=conn.cursor()
        cur.execute('delete from {}'.format(tableName))
        conn.commit()
        for(row, rs) in dataframe.iterrows():
            d=rs[0]
            T=rs[1]
            i=rs[2]
            l=rs[3]
            s=rs[4]
            query="insert into {} values ('{}', %s,%s,%s,%s)".format(tableName, d) 
            vals=(T,i,l,s)
            #print(query)
            cur.execute(query, vals)
        conn.commit()
        cur.close()
    except Error as e:
        print("Error in MySQL connection :", e)
    finally:
        conn.close()

DftoSql(newsUpdate, "covidnews")

##AWARENESS PAGE##
src="https://bangla.bdnews24.com/"
bdnews24='https://bangla.bdnews24.com/covid19-awareness-video/'
bn24req=requests.get(bdnews24).text
bn24Soup=BeautifulSoup(bn24req,'html.parser')
newsWidget=bn24Soup.find('div', class_="inpage-widget-1502994").findAll('div', class_="news-bn")
i=0
awareness=[]
for i in newsWidget:
    d=date
    title=i.find('h3').text
    fix_title=title.split()
    proper_title=' '.join(fix_title)
    image=i.find('img')['src']
    link=i.find('a')['href']
    source=src
    awarelst=[d,proper_title,image,link,source]
    awareness.append(awarelst)

awarenessDf=pd.DataFrame(awareness, columns=columns)
DftoSql(awarenessDf, "awarenessnews")
