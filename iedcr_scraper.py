# -*- coding: utf-8 -*-
"""
Created on Thu Mar 26 02:51:06 2020

@author: Acer
"""
import bs4
import requests
from bs4 import BeautifulSoup
import timer
import pandas as pd

##LETS GET THE PAGE FIRST
iedcr_url="https://www.iedcr.gov.bd"
webpg=requests.get(iedcr_url).text
##MAKING THE SOUP
bs4soup=BeautifulSoup(webpg, "html.parser")
#LETS SCRAPE OUT THE DATE FIRST
dash=bs4soup.find('div', class_='covid-dash-div')
findingdate=dash.findAll('p')
datetext=findingdate[-2].text
#GOT THE DATE, NOW TO FILTER OUT THE TEXT
currentdate=''.join([c for c in datetext if c in '0123456789-'])
#LETS GET THE NUMBERS NOW
info_table=bs4soup.findAll('div', class_='counter')
daily_data=[]
daily_data.append(currentdate)
for i in info_table:
    daily_data.append(i.text)
print(daily_data)

#LETS DISCOVER SOME MORE VALUES FROM THE INFORMATION WE HAVE
recovery_rate=(int(daily_data[5])/int(daily_data[3]))*100
death_rate=(int(daily_data[6])/int(daily_data[3]))*100
daily_data.append(recovery_rate)
daily_data.append(death_rate)

getPrevData=pd.read_csv('/covid_bd/data.csv')
recoveredTotal=getPrevData['Recovered']
#Let's also record the number of daily recoveries
recoveredToday=int(daily_data[5])-int(recoveredTotal.iloc[-1])
#Let's append this information to our daily_data
daily_data.append(recoveredToday)

#Now let's get the daily death toll
deathTotal=getPrevData['Death Cases']
deathToday=int(daily_data[6])-int(deathTotal.iloc[-1])
daily_data.append(deathToday)

##TOTAL COVID-19 TESTS, LAST 24 Hours Test, Covid-19 Positive Cases, Last 24Hours Cases, Recovered, Death Cases##
cols=['Date','TOTAL COVID-19 TESTS', 'LAST 24 Hours Test', 'Covid-19 Positive Cases', 'Last 24Hours Cases', 'Recovered', 'Death Cases', 'Recovery Rate', 'Death Rate', 'New Recoveries', 'Deaths in last 24 hours']
df=pd.DataFrame([daily_data],columns=cols)
lastUpdated=getPrevData["Date"].iloc[-1]
if currentdate!=lastUpdated:
    df.to_csv('/covid_bd/data.csv', mode='a', header=False, index=False)    
else:
    print("Today's data is already in your file")