# -*- coding: utf-8 -*-
"""
Created on Mon Apr  2 21:05:26 2018

@author: HP Zbook 15
"""

import pandas as pd

import csv
from collections import defaultdict

#def return_list(disease):
#    disease_list = []
#    match = disease.replace('^','_').split('_')
#    ctr = 1
#    for group in match:
#        if ctr%2==0:
#            disease_list.append(group)
#        ctr = ctr + 1
#
#    return disease_list
#
#with open("Scraped-Data/dataset_uncleaned.csv") as csvfile:
#    reader = csv.reader(csvfile)
#    disease=""
#    weight = 0
#    disease_list = []
#    dict_wt = {}
#    dict_=defaultdict(list)
#    for row in reader:
#
#        if row[0]!="\xc2\xa0" and row[0]!="":
#            disease = row[0]
#            disease_list = return_list(disease)
#            weight = row[1]
#
#        if row[2]!="\xc2\xa0" and row[2]!="":
#            symptom_list = return_list(row[2])
#
#            for d in disease_list:
#                for s in symptom_list:
#                    dict_[d].append(s)
#                dict_wt[d] = weight
#
#    #print (dict_)
#
#with open("Scraped-Data/dataset.csv","w") as csvfile:
#    writer = csv.writer(csvfile)
#    for key,values in dict_.items():
#        num_symptom = len(values)
#        
#        for i in range(0, num_symptom):
#            j = 0
#            for v in values:
#                if j == i : continue
#                j += 1
#                key = str.encode(key).decode('utf-8')
#                writer.writerow([key,v,dict_wt[key]])
##        print(num_symptom)
##        for v in values:
##            #key = str.encode(key)
##            key = str.encode(key).decode('utf-8')
##            #.strip()
##            #v = v.encode('utf-8').strip()
##            #v = str.encode(v)
##            writer.writerow([key,v,dict_wt[key]])


#data = pd.read_csv("Scraped-Data/dataset_clean.csv", encoding ="ISO-8859-1")
#print(data.head())
#print()
#print("Number of diseases: %d" % len(data['Source'].unique()))
#print("Number of symptoms: %d" % len(data['Target'].unique()))
#
#df = pd.DataFrame(data)
#df_1 = pd.get_dummies(df.Target)
#print(df_1.head())
#
#df_s = df['Source']
#df_pivoted = pd.concat([df_s,df_1], axis=1)
#df_pivoted.drop_duplicates(keep='first',inplace=True)
#print(df_pivoted[:5])
#
#print(len(df_pivoted))
#cols = df_pivoted.columns
#cols = cols[1:]
#df_pivoted = df_pivoted.groupby('Source').sum()
#df_pivoted = df_pivoted.reset_index()
##print(df_pivoted[:5])
##
##print(len(df_pivoted))
#df_pivoted.to_csv("Scraped-Data/df_pivoted.csv")


data = pd.read_csv("Scraped-Data/df_pivoted.csv", encoding ="ISO-8859-1")
#data = data.iloc[:, 1:]

diseases = data.iloc[:, 1].values
symptoms = data.iloc[:, 2:].values
dataset = []
for d in range(len(diseases)):
    num_symptoms = 0
    for v in symptoms[d]:
        if v == 1:
            num_symptoms += 1
            
    for i in range(0, num_symptoms):
        j = 0;
        symptom = []
        for v in symptoms[d]:
            if v == 1:
                if j == i:
                    symptom.append(0)
                    continue
            symptom.append(v)
            
        symptom.append(diseases[d])
        dataset.append(symptom)
        
            
    

