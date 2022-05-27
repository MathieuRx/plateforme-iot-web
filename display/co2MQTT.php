<?php

require('phpMQTT.php');
require('displayData.php');

$co2Topic = 'application/3/device/70b3d57ed0048d3e/event/up';

$co2MQTT = new Bluerhinos\phpMQTT('10.121.41.128', 1883, 'co2ID');

if(!$co2MQTT->connect(true, NULL, 'co2Username', 'co2Password')) exit(1);

$co2AllData = $co2MQTT->subscribeAndWaitForMessage($co2Topic, 0);

// On récupère uniquement les valeurs qui nous interesse
$co2Trame = explode('trame":"', $co2AllData);
$co2Trame = substr($co2Trame[1], 0, -4);

// On les sépare sous forme de tableau
$co2Array = explode(';', $co2Trame);


webDisplayData($co2Array, 'co2');

$co2MQTT->close();

?>