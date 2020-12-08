<?php
    if(isset($_POST['submit'])){

        $fname = htmlspecialchars($_POST['fname']);
        $lname = htmlspecialchars($_POST['lname']);
        $phone = htmlspecialchars($_POST['phone']);
        $msg = htmlspecialchars($_POST['msg']);

        // echo "$fname\r\n$lname\r\n$phone\r\n$msg";

        if(empty($fname) || empty($lname) || empty($phone) || empty($msg)){
            header('Location: ../?error=emptyField');
            exit();
        }
        else{
            include('../db/db.php');

            $query = "INSERT INTO contact (first_name, last_name, contact_no, message)
            VALUES ($1, $2, $3, $4)";
            $db->setQuery($query);
            $db->setMsgData($fname, $lname, $phone, $msg);
            $db->insertMsg();
            header('Location: ../?update=msgsent');
            exit();
        }
    }
    
?>