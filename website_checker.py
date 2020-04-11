# -*- coding: utf-8 -*-
"""
Created on Thu Apr  9 16:11:31 2020

@author: Acer
"""

from bs4 import BeautifulSoup
import requests
import time
import datetime 
url='https://www.iedcr.gov.bd'
headers = {'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36'}
req_url=requests.get(url, headers=headers).text
soup=BeautifulSoup(req_url, 'html.parser')
table=soup.find('table', class_='zebra')
dateToday=table.find('strong').text
currDate=''.join([i for i  in dateToday if i in '0123456789-'])
mDate=datetime.date.today()   
sysDate=datetime.datetime.strptime(str(mDate), "%Y-%m-%d").strftime("%d-%m-%Y")
print(sysDate)
if currDate==sysDate:
    print("No change")
    stream=open('iedcr_scraper.py')
    reader=stream.read()
    exec(reader)
else:
    print("CHANGE HAPPENED!")
    