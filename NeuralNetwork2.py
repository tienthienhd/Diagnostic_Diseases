# -*- coding: utf-8 -*-
"""
Created on Wed Mar 28 08:01:27 2018

@author: HP Zbook 15
"""

import numpy as np
import matplotlib.pyplot as plt
import pandas as pd

dataset_train = pd.read_csv("E:\\Code\\term6\\knowlegde_base_system\\doctorAI3\\Training.csv")
dataset_test = pd.read_csv("E:\\Code\\term6\\knowlegde_base_system\\doctorAI3\\Training.csv")


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
#dataset_analysis(dataset_train)
    
X_train = dataset_train.iloc[:, 0:132]
y_train = dataset_train.iloc[:, 132]

X_test = dataset_test.iloc[:, 0:132]
y_test = dataset_test.iloc[:, 132]


with open('Symptoms.txt', 'w') as f:
    for symptom in X_train.columns:
        f.write(symptom + "\n")

from sklearn.preprocessing import LabelEncoder

#print("Before encoding: ")
#print(y[100:110])

labelencoder_Y = LabelEncoder()
labelencoder_Y.fit(y_train)
y_train = labelencoder_Y.transform(y_train)
y_test = labelencoder_Y.transform(y_test)

Y_train =[[1 if i == j else 0  for i in range(0, 42)] for j in y_train] 
Y_train = np.array(Y_train, dtype=object)

Y_test =[[1 if i == j else 0  for i in range(0, 42)] for j in y_test] 
Y_test = np.array(Y_test, dtype=object)



#print(max(y))
#print(min(y))
#print("\nAfter encoding: ")
#print(y[100:110])

#=================================================================
## I already found out the tuned hyper parameters so commenting the code.
#
#from keras.wrappers.scikit_learn import KerasClassifier
#from sklearn.model_selection import GridSearchCV
#from keras.models import Sequential
#from keras.layers import Dense
#def build_classifier(optimizer):
#    classifier = Sequential()
#    classifier.add(Dense(units = 132, kernel_initializer = 'uniform', activation = 'relu', input_dim = 132))
#    classifier.add(Dense(units = 100, kernel_initializer = 'uniform', activation = 'relu'))
#    classifier.add(Dense(units = 80, kernel_initializer = 'uniform', activation = 'relu'))
#    classifier.add(Dense(units = 60, kernel_initializer = 'uniform', activation = 'relu'))
#    classifier.add(Dense(units = 42, kernel_initializer = 'uniform', activation = 'sigmoid'))
#    classifier.compile(optimizer = optimizer, loss = 'binary_crossentropy', metrics = ['accuracy'])
#    return classifier
#classifier = KerasClassifier(build_fn = build_classifier)
#parameters = {'batch_size': [10],
#              'epochs': [100],
#              'optimizer': ['adam', 'rmsprop']}
#grid_search = GridSearchCV(estimator = classifier,
#                           param_grid = parameters,
#                           scoring = 'f1',
#                           cv = 2)
#grid_search = grid_search.fit(X, Y)
#
#best_parameters = grid_search.best_params_
#best_accuracy = grid_search.best_score_
#print('best parameters: ')
#print(best_parameters)
#print('best accuracy: ')
#print(best_accuracy)
#=====================================================================
from keras.models import Sequential
from keras.layers import Dense

#classifier = Sequential()
#classifier.add(Dense(units = 132, kernel_initializer = 'uniform', activation = 'relu', input_dim = 132))
#classifier.add(Dense(units = 100, kernel_initializer = 'uniform', activation = 'relu'))
#classifier.add(Dense(units = 80, kernel_initializer = 'uniform', activation = 'relu'))
#classifier.add(Dense(units = 60, kernel_initializer = 'uniform', activation = 'relu'))
#classifier.add(Dense(units = 42, kernel_initializer = 'uniform', activation = 'sigmoid'))
#classifier.compile(optimizer='adam', loss = 'binary_crossentropy', metrics = ['binary_accuracy'])
#
#history = classifier.fit(X_train, Y_train, batch_size=20, epochs=100, verbose=1)
#plt.plot(history.history['binary_accuracy'])
#plt.show()
#classifier.save('neuralnetwork2.h5')

# Saving/Loading model
from keras.models import load_model
classifier = load_model('neuralnetwork2.h5')

y_pred = classifier.predict(X_test)

index_predict = [np.argmax(y) for y in y_pred]
label_predict = list(labelencoder_Y.inverse_transform(index_predict))
#print(y_pred)

ex1 = np.zeros([1,132], dtype=int)
ex1_pred = classifier.predict(ex1)
ex1_pred_index = np.argmax(ex1_pred)
ex1_pred_label = labelencoder_Y.inverse_transform(ex1_pred_index)

##%%
#for i in range(0, 42):
#    print(labelencoder_Y.inverse_transform(i))
##%%

print("predict: " + ex1_pred_label)

