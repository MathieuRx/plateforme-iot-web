<?php

function webDisplayData($_data, $_node) 
{
    $date = new DateTime();
    $date->setTimestamp(intval($_data[0]));
    echo '<span class="date"><b>'.$date->format('G:i:s') . " (" .$date->format('d-m-y'). ")</b></span>";
    switch($_node){
        case 'boopy':
            echo '<p>Luminosité: <b>' .$_data[1]. ' lux</b></p>';
            echo '<p>Temperature: <b>' .$_data[2]. ' °C</b></p>';
            echo '<p>Pourcentage d\'humidité: <b>' .$_data[3]. ' %</b></p>';
            echo '<p>Pression atmospherique: <b>' .$_data[4]. ' hpa</b></p>';
            echo '<p>Longitude: <b>'.$_data[5].'°</b></p>';
            echo '<p>Latitude: <b>'.$_data[6].'°</b></p>';
            echo '<p>Altitude: <b>'.$_data[7].' m</b></p>';
            break;
        case 'co2':
            echo '<p>Qualité de l\'air: <b>'.$_data[1].' ppm</b></p>'; 
            echo '<p>Temperature de l\'air: <b>' .$_data[2]. ' °C</b></p>';
            echo '<p>Pourcentage d\'humidité: <b>' .$_data[3]. ' %</b></p>';
            break;
        default:
            return -1;
    }
}
        
        /*

        Envoie donnée par MQTT
        
        mosquitto_pub -h localhost -r -t co2 -m "1651950479;486;25.3;28.5" 
        Données de noeud CO2: 'timestamp','co2','temperature','humidite';
        
        mosquitto_pub -h localhost -r -t boopy -m "1651950109;1838;31.1;41.2;1152.25;47.3146700;5.0266700;243" 
        Données de la boopy: 'timestamp','luminosite','temperature','humidite','pressionAtm','longitude','latitude','altitude';
        */
    ?>