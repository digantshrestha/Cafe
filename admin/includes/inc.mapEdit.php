<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location: ../admin.php');
        exit();
    }
    else{
        if(isset($_POST['mapEdit'])){
            $lat = htmlspecialchars($_POST['lat']);
            $lng = htmlspecialchars($_POST['lng']);
            $zoom = htmlspecialchars($_POST['zoom']);

            // echo $lat."<br>";
            // echo $lng."<br>";
            // echo $zoom."<br>";

            if(empty($lat) || empty($lng) || empty($zoom)){
                header('Location: ../edit.php#mapId?error=emptyField');
                exit();
            }
            else{
                include_once("../../db/db.php");

                $getQuery = "SELECT * FROM map";
                $db->setQuery($getQuery);
                $datas = $db->getItems();
                $data = $datas[0];
                $id = $data['id'];

                // print_r($data);
                $updateQuery = 'UPDATE map SET lat = $1, lng = $2, zoom = $3 WHERE id = $4';
                $db->setQuery($updateQuery);
                $db->updateMap($lat, $lng, $zoom, $id);

                header('Location: ../edit.php#mapId?update=mapUpdated');
            }
        }
    }

?>