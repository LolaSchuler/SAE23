#!/bin/bash
#SQL request to get all the different sensors that are listed in the "Capteur" table

#SQL database connection information
DB_USER='CTL';
DB_PASSWD='systemctl';
DB_NAME='sae23';

cd /opt/lampp/bin

#SQL request ; result is stored in a file
liste=$(./mysql --user=$DB_USER --password=$DB_PASSWD $DB_NAME -se "SELECT Nom_capt From Capteur")
echo $liste > ~/Documents/GitHub/SAE23/capteurs

