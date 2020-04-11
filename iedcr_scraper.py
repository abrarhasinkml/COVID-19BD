# -*- coding: utf-8 -*-
"""
Created on Thu Mar 26 02:51:06 2020

@author: Acer
"""
import bs4
import requests
from bs4 import BeautifulSoup
import pandas as pd
import datetime
import numpy as np
import datetime
##LETS GET THE PAGE FIRST
iedcr_url="https://www.iedcr.gov.bd"
webpg=requests.get(iedcr_url).text
##MAKING THE SOUP
bs4soup=BeautifulSoup(webpg, "html.parser")
#LETS SCRAPE OUT THE DATE FIRST
dash=bs4soup.findAll('div', class_='col-sm-3')
table=bs4soup.find('table', class_='table-hover')
table_data=[]
val1=""
for row in table.findAll('tr'):
    c=0
    for c in row.findAll('td'):
        val1=c.text

    table_data.append(val1)

totalTests=table_data[2]
last24hrtests=table_data[1]
newpos=table_data[3]
totalpos=table_data[4]

for i in dash:
    table_data.append(i.h3.text)

newRecs=table_data[5]
totRecs=table_data[6]
newDeaths=table_data[7]
totDeaths=table_data[8]

dateToday=table.find('th').text
currDate=''.join([i for i  in dateToday if i in '0123456789-'])

recoveryRate=(int(totRecs)/int(totalpos))*100
deathRate=(int(totDeaths)/int(totalpos))*100


formattedDate=datetime.datetime.strptime(currDate, "%d-%m-%Y").strftime("%d/%m/%Y")
cols=['Date','TOTAL COVID-19 TESTS', 'LAST 24 Hours Test', 'Covid-19 Positive Cases', 'Last 24Hours Cases', 'Recovered', 'Death Cases', 'Recovery Rate', 'Death Rate', 'New Recoveries', 'Deaths in last 24 hours']
daily_data=[formattedDate ,totalTests, last24hrtests, totalpos, newpos, totRecs, totDeaths, recoveryRate, deathRate, newRecs, newDeaths]
df=pd.DataFrame([daily_data],columns=cols)

getPrevData=pd.read_csv('data.csv')

lastUpdated=getPrevData["Date"].iloc[-1]
toXLformat=datetime.datetime.strptime(lastUpdated, "%d/%m/%Y").strftime("%d-%m-%Y")
if currDate!=toXLformat:
    df.to_csv('data.csv', mode='a', header=False, index=False)
else:
    print("Today's data is already in your file")


#
#findingdate=dash.findAll('p')
#datetext=findingdate[-3].text
##GOT THE DATE, NOW TO FILTER OUT THE TEXT
#currentdate=''.join([c for c in datetext if c in '0123456789-'])
##LETS GET THE NUMBERS NOW
#info_table=bs4soup.findAll('div', class_='counter')
#daily_data=[]
#daily_data.append(currentdate)
#for i in info_table:
#    daily_data.append(i.text)
#print(daily_data)
#
##LETS DISCOVER SOME MORE VALUES FROM THE INFORMATION WE HAVE
#recovery_rate=(int(daily_data[5])/int(daily_data[3]))*100
#death_rate=(int(daily_data[6])/int(daily_data[3]))*100
#daily_data.append(recovery_rate)
#daily_data.append(death_rate)
#
#getPrevData=pd.read_csv('/covid_bd/data.csv')
#recoveredTotal=getPrevData['Recovered']
##Let's also record the number of daily recoveries
#recoveredToday=int(daily_data[5])-int(recoveredTotal.iloc[-1])
##Let's append this information to our daily_data
#daily_data.append(recoveredToday)
#
##Now let's get the daily death toll
#deathTotal=getPrevData['Death Cases']
#deathToday=int(daily_data[6])-int(deathTotal.iloc[-1])
#daily_data.append(deathToday)
#
###TOTAL COVID-19 TESTS, LAST 24 Hours Test, Covid-19 Positive Cases, Last 24Hours Cases, Recovered, Death Cases##
#cols=['Date','TOTAL COVID-19 TESTS', 'LAST 24 Hours Test', 'Covid-19 Positive Cases', 'Last 24Hours Cases', 'Recovered', 'Death Cases', 'Recovery Rate', 'Death Rate', 'New Recoveries', 'Deaths in last 24 hours']
#df=pd.DataFrame([daily_data],columns=cols)
#lastUpdated=getPrevData["Date"].iloc[-1]
#toXLformat=datetime.datetime.strptime(lastUpdated, "%d/%m/%Y").strftime("%d-%m-%Y")
#if currentdate!=toXLformat:
#    df.to_csv('data.csv', mode='a', header=False, index=False)
#else:
#    print("Today's data is already in your file")
