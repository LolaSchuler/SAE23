#!/bin/bash
#gets data from MQTT broker

#gets room B105 sensor's name (AM107-13)
capteur=$(cat ~/Documents/GitHub/SAE23/capteurs | cut -d " " -f 3)

#gets exactly one message from the sensor thanks to the MQTT broker
message=$(mosquitto_sub -h mqtt.iut-blagnac.fr -t AM107/by-deviceName/$capteur/# -C 1)
valeur=$(echo -n "$message" | jq '.[0].co2')

#gets the other variables that will be used in the SQL table
date=$(date +%Y-%m-%d)
heure=$(date +%T)

#launches the data sending script
bash ./data_insertion $valeur $date $heure $capteur
