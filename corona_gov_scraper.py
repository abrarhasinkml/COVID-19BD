# -*- coding: utf-8 -*-
"""
Created on Mon Apr  6 14:22:30 2020

@author: Acer
"""
import string
import bs4
import requests
from bs4 import BeautifulSoup
import timer
import pandas as pd
import datetime
##LETS GET THE PAGE FIRST
iedcr_url="https://corona.gov.bd"
webpg=requests.get(iedcr_url, verify=False).text
##MAKING THE SOUP
bs4soup=BeautifulSoup(webpg, "html.parser")

the_dataTable=bs4soup.findAll('div', class_="box-top-part")
date=bs4soup.find("section", class_="at-a-glance").find('p').text

daily_data=[]

req_data=[]
#First let's get our required data
for i in the_dataTable:
    req_data.append(i.text)

def convert_bangla_num_to_eng(datalist):
    search_array= ["১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০"]
    replace_array= ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"]

    convertedNums=[]
    for j in datalist:
        en_num=''
        for a in j:
            if a in search_array:
                i=search_array.index(a)
                en_num+=''.join(replace_array[i])
        #print(en_num)
        convertedNums.append(en_num)
    return convertedNums

newLs=convert_bangla_num_to_eng(req_data)
get_date=convert_bangla_num_to_eng(date)
date=str.join('', get_date)
curr_date=datetime.datetime.strptime(date, "%d%m%Y").strftime("%d-%m-%Y")
currentDate=datetime.datetime.strptime(curr_date, "%d-%m-%Y").strftime("%d/%m/%Y")
print(currentDate)
daily_data.append(currentDate)
daily_data.append('-')
daily_data.append('-')
daily_data.append(newLs[1])#Total COVID 19 Patients
daily_data.append(newLs[0])#Last 24  hours detected
daily_data.append(newLs[2])#Total Recovered
daily_data.append(newLs[3])#Total Deaths
recover_rate=(int(daily_data[5])/int(daily_data[3]))*100
death_rate=(int(daily_data[6])/int(daily_data[3]))*100
daily_data.append(recover_rate)
daily_data.append(death_rate)
getPrevData=pd.read_csv('/covid_bd/data.csv')
recoveredTotal=getPrevData['Recovered']
recoveredToday=int(daily_data[5])-int(recoveredTotal.iloc[-1])
daily_data.append(recoveredToday)
#Now let's get the daily death toll
deathTotal=getPrevData['Death Cases']
deathToday=int(daily_data[6])-int(deathTotal.iloc[-1])
daily_data.append(deathToday)

cols=['Date','TOTAL COVID-19 TESTS', 'LAST 24 Hours Test', 'Covid-19 Positive Cases', 'Last 24Hours Cases', 'Recovered', 'Death Cases', 'Recovery Rate', 'Death Rate', 'New Recoveries', 'Deaths in last 24 hours']
df=pd.DataFrame([daily_data],columns=cols)
lastUpdated=getPrevData["Date"].iloc[-1]
toXLformat=datetime.datetime.strptime(lastUpdated, "%d/%m/%Y").strftime("%d-%m-%Y")

if curr_date!=toXLformat:
    df.to_csv('data.csv', mode='a', header=False, index=False)    
else:
    print("Today's data is already in your file")


