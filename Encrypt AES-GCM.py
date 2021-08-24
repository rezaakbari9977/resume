import tkinter as tk
from Crypto.Cipher import AES
from tkinter import filedialog
from Crypto.Protocol.KDF import PBKDF2
from Crypto.Random import get_random_bytes
from tkinter.filedialog import askopenfilename
from tkinter.ttk import *
from tkinter import messagebox
import os



def encrypt_text(p, k,aad):
    if not p or not k:
        messagebox.showerror("ERROR", "Please fill in the blank field!!!")
        return 0
    kdf_salt = get_random_bytes(16)
    key = PBKDF2(str.encode(k,'utf-8'), kdf_salt)
    cipher = AES.new(key, AES.MODE_GCM)
    nonce = cipher.nonce
    aad=str.encode(aad,'utf-8')
    cipher.update(aad)
    ciphertext, tag = cipher.encrypt_and_digest(str.encode(p,'utf-8'))
    all = [ciphertext, tag, nonce, kdf_salt]
    with open('Encrypted.txt', 'w') as f:
        for l in all:
            f.write(l.hex())
            f.write('\n')
        path=os.path.realpath(f.name)
        f.close()
    messagebox.showinfo("Info", "Encryption Complete!\nPath File :{}".format(path))



def decrypt_text(k,aad):
    if not k:
        messagebox.showerror("ERROR", "Please fill Key field!!!")
    d = filedialog.askopenfilename()
    fil = open(d, 'r')
    a = []
    for i in fil.readlines():
        a.append(bytes.fromhex(i.rstrip()))
    key = PBKDF2(k, a[3])
    aad=str.encode(aad,'utf-8')
    cipher = AES.new(key, AES.MODE_GCM, nonce=a[2])
    cipher.update(aad)
    try:
        decrypted_data = cipher.decrypt_and_verify(a[0], a[1])
        with open('Decrypted.txt', 'w') as f:
            f.write(decrypted_data.decode())
            path = os.path.realpath(f.name)
            f.close()
        messagebox.showinfo("Info", "Decryption Complete!\nDecrypted file path :{}\nPlain Text :{}".format(path,decrypted_data.decode()))
    except ValueError:
        messagebox.showerror("ERROR", "Decryption Faild!\nCheck your file or key")

def delete():
    e1.delete(0, 'end')
    e2.delete(0, 'end')
    e3.delete(0, 'end')

def delete2():
    e4.delete(0, 'end')
    e5.delete(0, 'end')


master = tk.Tk()
master.title("AES GCM")
master.geometry('470x250')

tab_control = Notebook(master)

# tab encrypt
tab1 = Frame(tab_control)

tab_control.add(tab1, text='Encrypt')

tk.Label(tab1,text="plain text",font=("Arial Bold", 10)).pack()

e1 = tk.Entry(tab1, width=50)
e2 = tk.Entry(tab1,width=50)
e3 = tk.Entry(tab1,width=50)
e1.pack(ipady=20)
tk.Label(tab1,text="Key",font=("Arial Bold", 10)).pack()
e2.pack(ipady=3)
tk.Label(tab1,text="AAD",font=("Arial Bold", 10)).pack()
e3.pack(ipady=3)

b1=tk.Button(tab1, bg="red",text='Delete',command=lambda:delete(),width=10,height=2)
b1.pack(side = tk.LEFT,padx=30, pady=2)

b2=tk.Button(tab1,bg="green", text='Encrypt',width=10,height=2, command=lambda:encrypt_text(e1.get(), e2.get(),e3.get()))
b2.pack(side = tk.RIGHT, padx=30, pady=2)

# tab decrypt
tab2 = Frame(tab_control)
tab_control.add(tab2, text='Decrypt')

tk.Label(tab2,text="Key",font=("Arial Bold", 10)).pack(ipady=10)

e4 = tk.Entry(tab2,width=50)
e4.pack(ipady=2)

tk.Label(tab2,text="AAD",font=("Arial Bold", 10)).pack()
e5 = tk.Entry(tab2,width=50)
e5.pack(ipady=3)

b4=tk.Button(tab2, bg="red",text='Delete',command=lambda:delete2(),width=10,height=2)
b4.pack(side = tk.LEFT, padx=10)

b3 = tk.Button(tab2, bg="blue", text='Decrypt',width=10,height=2,command=lambda: decrypt_text(e4.get(),e5.get()))
b3.pack(side = tk.RIGHT, padx=10)

tk.Label(tab2,bg="pink",text="Note : press decrypt to choose the file and decrypt").pack(side = tk.BOTTOM)

tab_control.pack(expand=1, fill='both')

tk.mainloop()
