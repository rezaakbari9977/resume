import tkinter as tk
from tkinter import filedialog
from tkinter.filedialog import askopenfilename
from tkinter.ttk import *
from tkinter import *
from tkinter import messagebox
import os
import pandas as pd
import numpy as np
import os
import glob
import re
import matplotlib.pyplot as plt
import seaborn as sns
import datetime
from pandas_datareader import data as web
from tkinter import messagebox
import pandas_datareader as pdr
import datetime as dt
from finta import TA 


def sell_crypto(t,s,c):
    if not t:
        messagebox.showerror("ERROR", 'please fill the crypto name')
        return
    if not s:
        s=datetime.datetime.now()
    if not c:
        messagebox.showerror("ERROR", 'please check the Strategy')
        return
    try:
        data = pdr.get_data_yahoo(t+'-USD', start='20200101', end=s)   
    except ValueError as e:
        messagebox.showerror("ERROR", e)
        return
    except pdr._utils.RemoteDataError:
        messagebox.showerror("ERROR", "Not find Symbol")
        return
    if c==1:
        sma21l=TA.SMA(data, 21)
        sma21l.reset_index(drop=True)
        sma21l=pd.DataFrame(sma21l)
        sma21l.columns=['sma21']
        sma21=sma21l['sma21'].iloc[-1]
        sma9l=TA.SMA(data, 9)
        sma9l.reset_index(drop=True)
        sma9l=pd.DataFrame(sma9l)
        sma9l.columns=['sma9']
        sma9=sma9l['sma9'].iloc[-1]
        if sma21>sma9:
            messagebox.showinfo("Info", "It`s good to sell now !!!")
        else:
            messagebox.showerror("ERROR", "It`s not good to sell now !!!")
    if c==2:
        rsil=TA.RSI(data,14)
        rsil.reset_index(drop=True)
        rsil=pd.DataFrame(rsil)
        rsil.columns=['rsi']
        rsi=rsil['rsi'].iloc[-1]
        if rsi>75:
            messagebox.showinfo("Info", "It`s very good to sell now !!!")
        if rsi>50:
            messagebox.showinfo("Info", "It`s good to sell now with stop loss !!!")
        else:
            messagebox.showerror("ERROR", "It`s not good to sell now !!!")
    if c==3:
        ema9l=TA.EMA(data,9)
        ema9l.reset_index(drop=True)
        ema9l=pd.DataFrame(ema9l)
        ema9l.columns=['ema9']
        ema9=ema9l['ema9'].iloc[-1]
        ema21l=TA.EMA(data,21)
        ema21l.reset_index(drop=True)
        ema21l=pd.DataFrame(ema21l)
        ema21l.columns=['ema21']
        ema21=ema21l['ema21'].iloc[-1]
        if ema21>ema9:
            messagebox.showinfo("Info", "It`s good to sell now !!!")
        else:
            messagebox.showerror("ERROR", "It`s not good to sell now !!!")
    if c==4:
        sma21l=TA.SMA(data, 21)
        sma21l.reset_index(drop=True)
        sma21l=pd.DataFrame(sma21l)
        sma21l.columns=['sma21']
        sma21=sma21l['sma21'].iloc[-1]
        sma9l=TA.SMA(data, 9)
        sma9l.reset_index(drop=True)
        sma9l=pd.DataFrame(sma9l)
        sma9l.columns=['sma9']
        sma9=sma9l['sma9'].iloc[-1]
        rsil=TA.RSI(data,14)
        rsil.reset_index(drop=True)
        rsil=pd.DataFrame(rsil)
        rsil.columns=['rsi']
        rsi=rsil['rsi'].iloc[-1]
        if rsi>75 and sma21>sma9:
            messagebox.showinfo("Info", "It`s good to sell now !!!")
        else:
            messagebox.showerror("ERROR", "It`s not good to sell now !!!")
    if c==5:
        ema9l=TA.EMA(data,9)
        ema9l.reset_index(drop=True)
        ema9l=pd.DataFrame(ema9l)
        ema9l.columns=['ema9']
        ema9=ema9l['ema9'].iloc[-1]
        sma9l=TA.SMA(data, 9)
        sma9l.reset_index(drop=True)
        sma9l=pd.DataFrame(sma9l)
        sma9l.columns=['sma9']
        sma9=sma9l['sma9'].iloc[-1]
        if sma9>ema9:
            messagebox.showinfo("Info", "It`s good to sell now !!!")
        else:
            messagebox.showerror("ERROR", "It`s not good to sell now !!!")
    


def buy_crypto(t,s,c):
    if not t:
        messagebox.showerror("ERROR", 'please fill the crypto name')
        return
    if not s:
        s=datetime.datetime.now()
    if not s:
        messagebox.showerror("ERROR", 'please check the Strategy')
        return
    try:
        data = pdr.get_data_yahoo(t+'-USD', start='20200101', end=s)   
    except ValueError as e:
        messagebox.showerror("ERROR", e)
        return
    except pdr._utils.RemoteDataError:
        messagebox.showerror("ERROR", "Not find Symbol")
        return
    if c==1:
        sma21l=TA.SMA(data, 21)
        sma21l.reset_index(drop=True)
        sma21l=pd.DataFrame(sma21l)
        sma21l.columns=['sma21']
        sma21=sma21l['sma21'].iloc[-1]
        sma9l=TA.SMA(data, 9)
        sma9l.reset_index(drop=True)
        sma9l=pd.DataFrame(sma9l)
        sma9l.columns=['sma9']
        sma9=sma9l['sma9'].iloc[-1]
        if sma21<sma9:
            messagebox.showinfo("Info", "It`s good to buy now !!!")
        else:
            messagebox.showerror("ERROR", "It`s not good to buy now !!!")
    if c==2:
        rsil=TA.RSI(data,14)
        rsil.reset_index(drop=True)
        rsil=pd.DataFrame(rsil)
        rsil.columns=['rsi']
        rsi=rsil['rsi'].iloc[-1]
        if rsi<25:
            messagebox.showinfo("Info", "It`s very good to buy now !!!")
        if rsi<50:
            messagebox.showinfo("Info", "It`s good to buy now with stop loss !!!")
        else:
            messagebox.showerror("ERROR", "It`s not good to buy now !!!")
    if c==3:
        ema9l=TA.EMA(data,9)
        ema9l.reset_index(drop=True)
        ema9l=pd.DataFrame(ema9l)
        ema9l.columns=['ema9']
        ema9=ema9l['ema9'].iloc[-1]
        ema21l=TA.EMA(data,21)
        ema21l.reset_index(drop=True)
        ema21l=pd.DataFrame(ema21l)
        ema21l.columns=['ema21']
        ema21=ema21l['ema21'].iloc[-1]
        if ema21<ema9:
            messagebox.showinfo("Info", "It`s good to buy now !!!")
        else:
            messagebox.showerror("ERROR", "It`s not good to buy now !!!")
    if c==4:
        sma21l=TA.SMA(data, 21)
        sma21l.reset_index(drop=True)
        sma21l=pd.DataFrame(sma21l)
        sma21l.columns=['sma21']
        sma21=sma21l['sma21'].iloc[-1]
        sma9l=TA.SMA(data, 9)
        sma9l.reset_index(drop=True)
        sma9l=pd.DataFrame(sma9l)
        sma9l.columns=['sma9']
        sma9=sma9l['sma9'].iloc[-1]
        rsil=TA.RSI(data,14)
        rsil.reset_index(drop=True)
        rsil=pd.DataFrame(rsil)
        rsil.columns=['rsi']
        rsi=rsil['rsi'].iloc[-1]
        if rsi<25 and sma21<sma9:
            messagebox.showinfo("Info", "It`s good to buy now !!!")
        else:
            messagebox.showerror("ERROR", "It`s not good to buy now !!!")
    if c==5:
        ema9l=TA.EMA(data,9)
        ema9l.reset_index(drop=True)
        ema9l=pd.DataFrame(ema9l)
        ema9l.columns=['ema9']
        ema9=ema9l['ema9'].iloc[-1]
        sma9l=TA.SMA(data, 9)
        sma9l.reset_index(drop=True)
        sma9l=pd.DataFrame(sma9l)
        sma9l.columns=['sma9']
        sma9=sma9l['sma9'].iloc[-1]
        if sma9<ema9:
            messagebox.showinfo("Info", "It`s good to buy now !!!")
        else:
            messagebox.showerror("ERROR", "It`s not good to buy now !!!")

def delete():
    e1.delete(0, 'end')
    e2.delete(0, 'end')


master = tk.Tk()
master.title("Crypto Trading Signal")
master.geometry('470x350')

tab_control = Notebook(master)

# tab encrypt
tab1 = Frame(tab_control)

tab_control.add(tab1, text='Check Signal')

tk.Label(tab1,text="Cryptocurrency Name",font=("Arial Bold", 10)).pack()
var = IntVar()
e1 = tk.Entry(tab1, width=30)
e2 = tk.Entry(tab1,width=30)
e3 = tk.Entry(tab1,width=30)
e1.pack(ipady=3)
tk.Label(tab1,text="Date",font=("Arial Bold", 10)).pack()
e2.pack(ipady=3)

tk.Label(tab1,text="Strategy",font=("Arial Bold", 10)).pack()

r1 = Radiobutton(tab1, text="SMA", variable=var, value=1)
r1.pack( anchor = tk.W ,ipady=3 )

r2 = Radiobutton(tab1, text="RSI", variable=var, value=2)
r2.pack( anchor = tk.W ,ipady=3 )

r3 = Radiobutton(tab1, text="EMA", variable=var, value=3)
r3.pack( anchor = tk.W ,ipady=3 )

r4 = Radiobutton(tab1, text="SMA & RSI", variable=var, value=4)
r4.pack( anchor = tk.W ,ipady=3 )

r5 = Radiobutton(tab1, text="EMA & SMA", variable=var, value=5)
r5.pack( anchor = tk.W ,ipady=3 )

b1=tk.Button(tab1, bg="pink",text='Delete',command=lambda:delete(),width=10,height=2)
b1.pack(side = tk.LEFT,padx=30, pady=2)

b2=tk.Button(tab1,bg="red", text='sell',width=10,height=2, command=lambda:sell_crypto(e1.get(), e2.get(),var.get()))
b2.pack(side = tk.RIGHT, padx=30, pady=2)

b2=tk.Button(tab1,bg="green", text='buy',width=10,height=2, command=lambda:buy_crypto(e1.get(), e2.get(),var.get()))
b2.pack(side = tk.RIGHT, padx=30, pady=2)

tab_control.pack(expand=1, fill='both')

tk.mainloop()
