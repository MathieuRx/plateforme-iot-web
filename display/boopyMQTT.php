<?php

require('phpMQTT.php');
require('displayData.php');

$boopyMQTT = new Bluerhinos\phpMQTT('10.121.41.128', 1883, 'co2ID');

if(!$boopyMQTT->connect(true, NULL, 'boopyUsername', 'boopyPassword')) exit(1);

$boopyAllData = $boopyMQTT->subscribeAndWaitForMessage('application/3/device/+/event/up', 0);

$boopyTrame = explode('trame":"', $boopyAllData);
$boopyTrame = substr($boopyTrame[1], 0, -4);

$boopyArray = explode(';', $boopyTrame);


webDisplayData($boopyArray, 'boopy'); 
$boopyMQTT->close();

?>