# Smarthome
Smarthome Control - Touchscreen Android Tablet

https://www.youtube.com/watch?v=OmktTIJ05ME&t=106s


Langkah Pertama:

================

Pakai Linux, buat folder bradlink lalu Copy file broadlink pendukung di dalam 1 folder, yaitu

-econtrol-db-dump.py

-getBroadlinkSharedData.py

-sendCode.py

-broadlink_to_home_assistant_encoder.py


lalu install perintah dibawah ini didalam folder broadlink:

-Install python

 sudo apt install python
 
-Install ADB

 sudo apt install adb
 
-Install Python-pip

 sudo apt install python-pip
 
-Install simplejson

 pip install simplejson


Langkah Kedua:

==============

Install aplikasi broadlink di playstore pada hp android untuk pairing IR dan RF.

lakukan pairing dengan remote ir atau remote rf nanti akan terbuat code ir/rf pada 3 file json dibawah ini.

file json ada di internal memory HP "/Broadlink/newremote/SheredData/"

-jsonButton

-jsonIrCode

-jsonSubIr

Copy ke 3 file tersebut ke folder broadlink pada folder di langkah pertama.


Langkah ketiga:

===============

Masuk ke folder file broadlinknya, jalankan perintah:

-python getBroadlinkSharedData.py


Install aplikasi di

-Bit Web Server-Mod.apk

 Copy program ke dalam folder /sdcard/www/
 
-RM Bridge_v1.3.2.apk

 Program ini untuk mengirimkan sinyal dari tablet android ke perangkat broadlink
 
-Opera

 untuk browser dan pilih fullscreen


.::Daniells::.
