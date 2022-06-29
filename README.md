# AppWebOCO
AppWebOCO

Sur ce GitHub vous allais retrouver une application web qui permet de configurer notre objet connecté, qui est un distributeur de croquette.

La création de cet objet intervient dans le cadre de la matière objet connecté dispensé à l'IG2I de centrale Lille par les enseignants Le Glaz Isabelle et Bourdeaud Huy Thomas. Lors de cet enseignement nous avons pu penser et concevoir un objet connecté. Dans ce compte-rendu la démarche que nous avons adoptée vous sera présentée mais également les solutions que nous avons réalisées.

Ci-dessous veuillez retrouver le script permettant de configurer votre Raspberry Pi:

```
#!/bin/bash
#***************************************************************#
# Script setup Raspberry Pi IOT - Louis Boyaval                 #
#***************************************************************#

color=`tput setaf 2`
NC=`tput sgr0`

if [ $(whoami) != root ]; then
    echo "Le script doit être lancé en tant que root" >&2
    exit 1
fi


read -p "${color}Update and upgrade $foo? [y/n]${NC}" answer
if [[ $answer = y ]] ; then
    apt-get update
    apt-get upgrade
fi



#***************************************************************#
# Server Web                                                    #
#***************************************************************#

read -p "${color}Install apache2 $foo? [y/n]${NC}" answer
if [[ $answer = y ]] ; then
    apt-get install apache2
fi

read -p "${color}Install php $foo? [y/n]${NC}" answer
if [[ $answer = y ]] ; then
    apt-get install php
    apt-get install php-mysqli
    apt-get install apache2 php7.4 libapache2-mod-php7.4
    a2enmod php7.4
    service apache2 restart
fi

read -p "${color}Install git $foo? [y/n]${NC}" answer
if [[ $answer = y ]] ; then
    apt-get install git
fi


read -p "${color}Setup Web Server $foo? [y/n]${NC}" answer
if [[ $answer = y ]] ; then
    cd /var/www/html
    git clone https://github.com/LouisBoyaval/AppWebOCO.git
    service apache2 restart
fi


#***************************************************************#
# Setup Database                                                #
#***************************************************************#

read -p "${color}Install MariaDB $foo? [y/n]${NC}" answer
if [[ $answer = y ]] ; then
    sudo apt install mariadb-server
fi

read -p "${color}Setup database $foo? [y/n]${NC}" answer
if [[ $answer = y ]] ; then
    mysql -uroot -proot -e '
    DROP DATABASE IF EXISTS datadistributeur;

    create database datadistributeur;

    use datadistributeur;

    DROP TABLE IF EXISTS Statistique;
    DROP TABLE IF EXISTS Repas;
    DROP TABLE IF EXISTS Croquettes;
    DROP TABLE IF EXISTS Animaux;

    CREATE TABLE `Animaux` (
    `idAnimal` int(11) NOT NULL,
    `nom` varchar(15) DEFAULT NULL,
    `tag` varchar(60) NOT NULL,
    `poids` int(11) DEFAULT NULL,
    `age` int(11) DEFAULT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


    CREATE TABLE `Croquettes` (
    `idCroquette` int(11) NOT NULL,
    `nom` varchar(15) NOT NULL,
    `actif` tinyint(1) NOT NULL,
    `qteParSec` float NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


    CREATE TABLE `Programme` (
    `idProgramme` int(11) NOT NULL,
    `idAnimal` int(11) NOT NULL,
    `idCroquette` int(11) NOT NULL,
    `heure` time NOT NULL,
    `quantite` float NOT NULL,
    `distribue` tinyint(1) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

    CREATE TABLE `Repas` (
    `idRepas` int(11) NOT NULL,
    `date` datetime NOT NULL,
    `quantite` float NOT NULL,
    `idAnimal` int(11) NOT NULL,
    `idCroquette` int(11) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

    ALTER TABLE `Animaux`
    ADD PRIMARY KEY (`idAnimal`);

    ALTER TABLE `Croquettes`
    ADD PRIMARY KEY (`idCroquette`);

    ALTER TABLE `Programme`
    ADD PRIMARY KEY (`idProgramme`);

    ALTER TABLE `Repas`
    ADD PRIMARY KEY (`idRepas`),
    ADD KEY `idAnimal` (`idAnimal`),
    ADD KEY `idCroquette` (`idCroquette`);

    ALTER TABLE `Animaux`
    MODIFY `idAnimal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

    ALTER TABLE `Croquettes`
    MODIFY `idCroquette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

    ALTER TABLE `Programme`
    MODIFY `idProgramme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

    ALTER TABLE `Repas`
    MODIFY `idRepas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

    ALTER TABLE `Repas`
    ADD CONSTRAINT `Repas_ibfk_1` FOREIGN KEY (`idAnimal`) REFERENCES `Animaux` (`idAnimal`) ON UPDATE CASCADE,
    ADD CONSTRAINT `Repas_ibfk_2` FOREIGN KEY (`idCroquette`) REFERENCES `Croquettes` (`idCroquette`) ON UPDATE CASCADE;
    CREATE OR REPLACE USER serverWeb@localhost IDENTIFIED BY "'"password"'";
    GRANT all privileges on datadistributeur.* TO "'"serverWeb"'"@"'"localhost"'" identified by "'"password"'";'
fi


#***************************************************************#
# Setup Distribution                                            #
#***************************************************************#



#***************************************************************#
# Setup Acces Point                                             #
#***************************************************************#

read -p "${color}Setup Access Point $foo? [y/n]${NC}" answer
if [[ $answer = y ]] ; then
  apt install hostapd
  systemctl unmask hostapd
  systemctl enable hostapd

  apt install dnsmasq

  DEBIAN_FRONTEND=noninteractive apt install -y netfilter-persistent iptables-persistent

  apt-get install dhcpcd5
  echo 'interface wlan0
    static ip_address=192.168.4.1/24
    nohook wpa_supplicant' >> /etc/dhcpcd.conf

  echo '# Enable IPv4 routing
net.ipv4.ip_forward=1' >> /etc/sysctl.d/routed-ap.conf

  apt install iptables
  iptables -t nat -A POSTROUTING -o eth0 -j MASQUERADE

  apt-install netfilter-persistent
  netfilter-persistent save

  mv /etc/dnsmasq.conf /etc/dnsmasq.conf.orig
  echo 'interface=wlan0 # Listening interface
dhcp-range=192.168.4.2,192.168.4.20,255.255.255.0,24h
domain=wlan
address=/gw.wlan/192.168.4.1' >> /etc/dnsmasq.conf

rfkill unblock wlan

echo 'country_code=GB
interface=wlan0
ssid=Distributeur
hw_mode=g
channel=7
macaddr_acl=0
auth_algs=1
ignore_broadcast_ssid=0
wpa=2
wpa_passphrase=raspberry
wpa_key_mgmt=WPA-PSK
wpa_pairwise=TKIP
rsn_pairwise=CCMP' >> /etc/hostapd/hostapd.conf
fi


#***************************************************************#
# Setup rc.local                                                #
#***************************************************************#

cp rc.local default_rc.local
echo "#!/bin/sh -e
service dnsmaq restart
service hostapd restart
exit 0" > /etc/rc.local


read -p "${color}Reboot $foo? [y/n]${NC}" answer
if [[ $answer = y ]] ; then
reboot
fi
```
