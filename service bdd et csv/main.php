<?php
require('CNode.php');

$server = '10.121.41.128';
$port = '1883';

// TOPIC MQTT
$boopyTopic = 'application/3/device/70b3d57ed0056fe/event/up'; 

$co2Topic = 'application/4/device/70b3d57ed0048d3e/event/up';
//                      $_server, $_port, $_username, $_password, $_id, $_topic, $_nodeName
$co2Node = new CNode($server, $port,'','','co2Id', $co2Topic, 'co2', 
                    array('timestamp', 'co2', 'temperature', 'humidite'));

$boopyNode = new CNode($server, $port, '', '', 'boopyId', $boopyTopic, 'boopy', 
                    array('timestamp','luminosite','temperature','humidite',
                    'pressionAtm','longitude','latitude','altitude'));

$waitingTime = 10 * 60; // 10 * 60 pour 10 minutes

while(true) {
        
    $co2Node->goConnect();
    $boopyNode->goConnect();

    
    $co2Node->waitMessage();
    $boopyNode->waitMessage(); 
    
    // Attendre 
    sleep($waitingTime);
}
?>
