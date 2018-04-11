<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    
    
	$update = $cnn->updatedeleterows("UPDATE event_master SET enoti_counter='0' WHERE enoti_counter!='0'");
    
?>    