# -*- coding: utf-8 -*-
"""
Created on Wed Mar 28 21:53:56 2018

@author: HP Zbook 15
"""
import pandas as pd


data = pd.read_csv("Scraped-Data/dataset_clean.csv", encoding ="ISO-8859-1")
print(data.head())
print()
print("Number of diseases: %d" % len(data['Source'].unique()))
print("Number of symptoms: %d" % len(data['Target'].unique()))

df = pd.DataFrame(data)
df_1 = pd.get_dummies(df.Target)
print(df_1.head())

df_s = df['Source']
df_pivoted = pd.concat([df_s,df_1], axis=1)
df_pivoted.drop_duplicates(keep='first',inplace=True)
print(df_pivoted[:5])

print(len(df_pivoted))
cols = df_pivoted.columns
cols = cols[1:]
df_pivoted = df_pivoted.groupby('Source').sum()
df_pivoted = df_pivoted.reset_index()
print(df_pivoted[:5])

print(len(df_pivoted))
df_pivoted.to_csv("Scraped-Data/df_pivoted.csv")

#x = df_pivoted[cols]
#y = df_pivoted['Source']
