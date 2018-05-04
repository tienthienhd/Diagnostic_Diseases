# -*- coding: utf-8 -*-
"""
Created on Fri May  4 15:54:46 2018

@author: HP Zbook 15
"""

import numpy as np
import matplotlib.pyplot as plt
import pandas as pd
from sklearn.preprocessing import LabelEncoder
from keras.wrappers.scikit_learn import KerasClassifier
from sklearn.model_selection import GridSearchCV
from keras.models import Sequential
from keras.layers import Dense
from keras.models import load_model
import sys

class DiseasePredict:
    labelencoder_Y = LabelEncoder()
    standarded = 0
    symptoms = []
    
    def load_data_train_test(self, filepath):
        dataset = pd.read_csv(filepath)
        return dataset
    
    def load_model(self):
        with open('C:/Apache24/htdocs/PredictDiseases/AI/Symptoms.txt') as f:
            for line in f:
                self.symptoms.append(line.strip())
                
        self.classifier = load_model('C:/Apache24/htdocs/PredictDiseases/AI/neuralnetwork2.h5')
        self.standarded = 1
        self.labelencoder_Y.classes_ = np.load('C:/Apache24/htdocs/PredictDiseases/AI/labelencoder_y.npy')
        
    
    def dataset_analysis(df):
        #view starting value of data set
        print("Dataset Head")
        print(df.head(3))
        print("=" * 30)
        
        # View features in dataset
        print("Dataset Features")
        print(df.columns.values)
        print("=" * 30)
        
        # View how many samples and how many missing values for each feature
        print("Dataset Features Details")
        print(df.info())
        print("="*30)
        
        # View distribution of numberical features across the dataset
        print("Dataset Numberical Features")
        print(df.describe())
        print("=" * 30)
        
        # view distribution of categorical features across the data set
        print("Dataset Categorical Features")
        print(df.describe(include=['O']))
        print("=" * 30)
        
    def standard_label(self ,Y_raw):
        if(self.standarded == 0):
            self.labelencoder_Y.fit(Y_raw);
            np.save('labelencoder_y.npy', self.labelencoder_Y.classes_)
            self.standarded = 1
        y_temp = self.labelencoder_Y.transform(Y_raw)
        Y =[[1 if i == j else 0  for i in range(0, 42)] for j in y_temp] 
        self.Y = np.array(Y, dtype=object)
        
    def standard_input(self, values):
        result = np.zeros([1, 132], dtype=int)
        for symptom in values:
            for i in range(0, 132):
                if(symptom != self.symptoms[i]): continue
                result[0][i] = 1
#        print(result)
        return result
        
    
    def prepare_data_train(self, dataset):
        X = dataset.iloc[:, 0:132]
        self.symptoms = X.columns
        Y = dataset.iloc[:, 132]
        self.X = X;
        self.standard_label(Y)
        
    def build_classifier(self):
        classifier = Sequential()
        classifier.add(Dense(units = 132, kernel_initializer = 'uniform', activation = 'relu', input_dim = 132))
        classifier.add(Dense(units = 100, kernel_initializer = 'uniform', activation = 'relu'))
        classifier.add(Dense(units = 80, kernel_initializer = 'uniform', activation = 'relu'))
        classifier.add(Dense(units = 60, kernel_initializer = 'uniform', activation = 'relu'))
        classifier.add(Dense(units = 42, kernel_initializer = 'uniform', activation = 'sigmoid'))
        classifier.compile(optimizer='adam', loss = 'binary_crossentropy', metrics = ['binary_accuracy'])
        return classifier

    def training_model(self):
        self.classifier = self.build_classifier()
        history = self.classifier.fit(self.X, self.Y, batch_size=20, epochs=100, verbose=1)
        plt.plot(history.history['binary_accuracy'])
        plt.show()
        self.classifier.save('DiseasePredict.h5')

    def predict(self, values_input):
        inp = self.standard_input(values_input)
        pred = self.classifier.predict(inp)
        return pred
    
    def decode_label(self, inp):
        return self.labelencoder_Y.inverse_transform(inp)

    def get_predict(self, inp):
        pred_p = self.predict(inp)
        
        pred_label_code = []
        pred_label_prop = []
        for i in range(len(pred_p[0])):
            if(pred_p[0][i] > 0.4):
                pred_label_code.append(i)
                pred_label_prop.append(pred_p[0][i])
                
        pred_label = self.decode_label(pred_label_code)
        return [pred_label, pred_label_prop]
        
    
#d = DiseasePredict();
#dataset = d.load_data_train_test("E:\\Code\\term6\\knowlegde_base_system\\doctorAI3\\Training.csv");
#d.prepare_data_train(dataset)
#d.load_model()
#ex1 = ['itching', 'yellow_crust_ooze']
#
#result = d.get_predict(ex1)
#
#print(result)



symptoms = sys.argv[1:]
d = DiseasePredict()
d.load_model()
result = d.get_predict(symptoms)

for i in range(len(result[0])):
    print(i, result[0][i], result[1][i])


