# -*- coding: utf-8 -*-
"""
Created on Thu Mar 26 13:47:16 2020

@author: Acer
"""

import pandas as pd
import chart_studio
import plotly.express as px
from plotly.offline import plot
from plotly.subplots import make_subplots
import plotly.graph_objects as go
import chart_studio.plotly as py
chart_studio.tools.set_credentials_file(username='abrarhasinkml', api_key='78E80pBjGknRHGbml0TJ')
chart_studio.tools.set_config_file(world_readable=True,
                             sharing='public')
data=pd.read_csv('/covid_bd/data.csv')

data.head()


#LETS START PLOTTING

#LETS LOOK AT A BAR PLOT FIRST OF THE TOTAL NUMBER OF POSITIVE COVID PATIENTS PER DAY
bar=px.bar(data, x='Date', y='Covid-19 Positive Cases')
bar.update_layout(title_text="TOTAL NUMBER OF CASES AS OF TODAY")
###IF YOU ARE USING SPYDER IDE THEN USE THIS
#plot(bar)
###OTHERWISE JUST GO AHEAD WITH THIS
#bar.show()

#LETS ALSO PLOT A BAR CHART FOR THE NUMBER OF CASES PER DAY
dailybar=px.bar(data, x="Date", y='Last 24Hours Cases')
dailybar.update_layout(title_text="DAILY NEW CASES")
#plot(dailybar)
#dailybar.show()

#NOW LETS TAKE A LOOK AT THE NUMBER OF DAILY RECOVERIES AND DEATHS
lineplot=make_subplots(specs=[[{'secondary_y':True}]])
lineplot.add_trace(go.Scatter(x=data["Date"], y=data['Recovered'], name='Recoveries', line=dict(color='green', width=4)), secondary_y=False)
lineplot.add_trace(go.Scatter(x=data["Date"], y=data['Death Cases'], name='Deaths',line=dict(color='red', width=4)), secondary_y=True)
lineplot.update_layout(title_text="Daily Recoveries and Death Cases in Bangladesh")
lineplot.update_xaxes(title_text="Date")
lineplot.update_yaxes(title_text="<b>Recoveries</b>", secondary_y=False)
lineplot.update_yaxes(title_text="<b>Deaths</b>", secondary_y=True)
#plot(lineplot)
#lineplot.show()


#PLOTTING A LINE PLOT FOR THE TOTAL DEATHS
totDeaths=px.line(data, x='Date', y='Death Cases', text=data['Death Cases'])
totDeaths.update_layout(title_text="TOTAL NUMBER OF DEATHS")
#plot(totDeaths)
#totDeaths.show()

#PLOTTING A BARCHART SHOWING THE DAILY DEATHS
dailyDeaths=px.bar(data, x='Date', y='Deaths in last 24 hours')
dailyDeaths.update_layout(title_text="TOTAL NUMBER OF DEATHS ON A DAILY BASIS")
#plot(dailyDeaths)
#dailyDeaths.show()

#PLOTTING A LINE TO SHOW THE TOTAL NUMBER OF RECOVERIES 
totRec=px.line(data, x='Date', y='Recovered', text=data['Recovered'])
totRec.update_layout(title_text="TOTAL NUMBER OF RECOVERIES")
#plot(totRec)
#totRec.show()


#PLOTTING A BARCHART SHOWING THE DAILY RECOVERIES
dailyRec=px.bar(data, x='Date', y='New Recoveries')
dailyRec.update_layout(title_text="TOTAL NUMBER OF Recoveries ON A DAILY BASIS")
#plot(dailyRec)
#dailyRec.show()

#PLOTTING THE RECOVERY RATE AGAINST THE DEATH RATE IN BANGLADESH
lineplot2=make_subplots(specs=[[{'secondary_y':True}]])
lineplot2.add_trace(go.Scatter(x=data["Date"], y=data['Recovery Rate'], name='Recovery Rate', line=dict(color='green', width=4)), secondary_y=False)
lineplot2.add_trace(go.Scatter(x=data["Date"], y=data['Death Rate'], name='Death Rate',line=dict(color='red', width=4)), secondary_y=True)
lineplot2.update_layout(title_text="Recovery Rate vs Death Rate in Bangladesh")
lineplot2.update_xaxes(title_text="Date")
lineplot2.update_yaxes(title_text="<b>Recovery Rate</b>", secondary_y=False)
lineplot2.update_yaxes(title_text="<b>Death Rate</b>", secondary_y=True)
#plot(lineplot2)
#lineplot2.show()

plot_url=py.plot(lineplot2,height=1000,width=1000,auto_open=False,filename='demo')
print(plot_url)