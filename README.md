# myDrop-v2
myDrop-v2 - better version of my Drop Remote for Raspberry Pi

 <br />

### INSTALLATION

 <br />

you will need WiringPi, so install it using this tutorial:

[WiringPi](http://wiringpi.com/download-and-install/)

 <br />

Than, use the following commands to install Apache2, PHP and myDrop2

```
$ sudo apt-get install apache2 php libapache2-mod-php -y

$ wget https://github.com/fachinformatiker/myDrop-v2/archive/master.zip

$ unzip master.zip

$ cd myDrop2-master

$ sudo mv * /var/www/html/

$ sudo chmod -R 777 /var/www/html/*

$ sudo adduser www-data gpio

$ sudo systemctl restart apache2
```

<br />

 <br />
 
### CHANGE (in conf.php)

* $kamera = "22";
* $ventil1 = "12";
* $ventil2 = "16";
* $blitz = "29";

 <br />
 
 <br />

### RUN

http://IP-OF-YOUR-PI/index.php

 <br />
 
 <br />

You have to accept any warning about storing session data, otherwise your values can't be transfered to the script and back.

 <br />
 
 <br />

 <br />
 
 <br />

If you need help feel free to write my an e-mail: **github@fachinformatiker.app**  :speech_balloon:

:+1:
