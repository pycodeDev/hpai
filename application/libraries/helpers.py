import pandas as pd
import numpy as np
from sklearn.linear_model import LinearRegression
import json
import ast

month = {
    '1': 'Januari',
    '2': 'Februari',
    '3': 'Maret',
    '4': 'April',
    '5': 'May',
    '6': 'Juni',
    '7': 'Juli',
    '8': 'Agustus',
    '9': 'September',
    '10': 'Oktober',
    '11': 'November',
    '12': 'Desember'
}


def predictMonth(x):
    a = str(x)
    m = a.split('-')
    return month.get(int(m[1]))


def Reg_Linear(X, y):
    pre = len(X)+1
    X_train = X.values.reshape(len(X), 1)
    y_train = y.values.reshape(len(y), 1)
    reg = LinearRegression()
    reg.fit(X_train, y_train)
    return (reg.predict([[pre]]))


def parseData(x):
    # dict = ast.literal_eval(x)
    data = pd.read_json(json.dumps(x))
    leng = len(x)
    per = [(int(i)+1) for i in range(0, leng)]
    data['periode'] = per

    X = data.iloc[:, -1]
    y = data.iloc[:, 5]

    reg = Reg_Linear(X, y)
    hasil = reg[0][0]
    return abs(round(hasil))


def saran_bulan(x):
    data = pd.read_json(json.dumps(x))
    t = data.iloc[[len(data)-1], 4].values
    a = str(t[0])
    m = a.split('-')
    pre = int(m[1])+1
    if pre == 13:
        pre = '1'
        hasil = month.get(pre)
    else:
        hasil = month.get(str(pre))
    return hasil


def get_bulan(x):
    m = x.split('-')
    h = (int(m[1])+int(m[1]))-int(m[1])
    hasil = month.get(str(h))
    a = []
    a.append(hasil)
    a.append(m[0])
    s = ' '

    return s.join(a)


def saran_stok(stock, pred):
    if stock > pred:
        hasil = 0
    else:
        hasil = pred - stock
    return hasil
