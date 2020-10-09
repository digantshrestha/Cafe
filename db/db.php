<?php 
    include_once('DB_Config.php');
    include_once('dbSetter.php');

    $db = new DB_Config();
    $db->setConnection($host, $port, $dbname, $credentials);
    $db->connect();
?>