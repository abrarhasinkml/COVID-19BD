# -*- coding: utf-8 -*-
"""
Created on Thu Apr  9 16:11:31 2020

@author: Acer
"""

from bs4 import BeautifulSoup
import requests
import time
import datetime 

while True:
    url='https://www.iedcr.gov.bd'
    headers = {'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36'}
    req_url=requests.get(url, headers=headers).text
    soup=BeautifulSoup(req_url, 'html.parser')
    table=soup.find('table', class_='zebra')
    dateToday=table.find('strong').text
    currDate=''.join([i for i  in dateToday if i in '0123456789-'])
    mDate=datetime.date.today()   
    sysDate=datetime.datetime.strptime(str(mDate), "%Y-%m-%d").strftime("%d-%m-%Y")
    
    if currDate==sysDate:
        ##THIS MEANS THAT A NEW UPDATE HAS TAKEN PLACE##
        stream=open('iedcr_scraper.py')
        data_reader=stream.read()
        exec(data_reader)
        stream2=open('writeTodB.py')
        data_writer=stream2.read()
        exec(data_writer)
        stream3=open('regionBasedData.py')
        region_reader=stream3.read()
        exec(region_reader)
        stream4=open('newsScraper.py')
        news_reader=stream4.read()
        exec(news_reader)
        time.sleep(216000)
    else:
        infinite_logger=open('infinitelooperlog.txt').write("'{}' was not stored because of no new updates.\n".format(datetime.datetime.now()))
        infinite_logger.close()
        time.sleep(216000)