<?php
    if(isset($_POST['submit'])){

        $first_name = htmlspecialchars($_POST['first_name']);
        $last_name = htmlspecialchars($_POST['last_name']);
        $contact_no = htmlspecialchars($_POST['contact_no']);
        $address = htmlspecialchars($_POST['address']);
        $date = htmlspecialchars($_POST['date']);
        $time = htmlspecialchars($_POST['time']);
        $message = htmlspecialchars($_POST['message']);

        $error = [];
        if(empty($message)){
            $message = "NA";
        }

        // echo "$fname\r\n$lname\r\n$phone\r\n$msg";

        $params = [$first_name, $last_name, $contact_no, $address, $date, $time, $message];

        // print_r($reqParams);

        foreach($params as $p){
            if(empty($p)){
                array_push($error, "empty-field");
                break;
            }
        }
        

        if(!empty($error)){
            header('Location: ../order_info.php?error=emptyField');
            exit();
        }
        else{
            include('../db/db.php');

            $query = "INSERT INTO orderDetails (first_name, last_name, 
                      contact_no, address, date, time, message) VALUES (
                      $1, $2, $3, $4, $5, $6, $7)";
            $db->setQuery($query);
            $db->setOrderDetails($first_name, $last_name, $contact_no, $address, $date, $time, $message);
            $db->insertOrderDetails();
            // echo $result;

            header('Location: ../?update=msgsent');
            exit();

        }
    }
    
?>