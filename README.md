# Smarthome
Smarthome Control - Touchscreen Android Tablet
https://www.youtube.com/watch?v=OmktTIJ05ME&t=106s

Untuk pairing code IR/RF.
Pakai Linux, Copy file broadlink pendukung di dalam 1 folder, lalu install perintah dibawah
ini didalam folder broadlink:
-Install python
 sudo apt install python
-Install ADB
 sudo apt install adb
-Install Python-pip
 sudo apt install python-pip
-Install simplejson
 pip install simplejson

Install aplikasi broadlink di android untuk pairing IR dan RF.
code pairing akan ada di 3file json dibawah ini.

Copy file ke folder scipt broadlink dijadikan 1 folder
file ada di internal memory HP "/Broadlink/newremote/SheredData/"
-jsonButton
-jsonIrCode
-jsonSubIr

Masuk ke folder file broadlinknya, jalankan perintah:
-python getBroadlinkSharedData.py



.::Daniells::.
