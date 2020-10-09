<?php
    session_start();

    if(!isset($_SESSION['username'])){
        header('Location: ../admin.php');
        exit();
    }
    else{
        if(isset($_POST['submit'])){
            $email = htmlspecialchars($_POST['email']);

            if(empty($email)){
                header('Location: ../edit.php#contactId?error=emptyField');
                exit();
            }
            else{
                include_once("../../db/db.php");

                $getQuery = 'SELECT * FROM contact';
                $db->setQuery($getQuery);
                $datas = $db->getItems();
                $data = $datas[0];
                $id = $data['id'];

                if($email === $data['email']){
                    header('Location: ../edit.php?update=noUpdate');
                    exit();
                }
                else{
                    $updateQuery = 'UPDATE contact SET email = $1 WHERE id =$2';
                    $db->setQuery($updateQuery);
                    $db->update($email, $id);
                    header('Location: ../edit.php?update=emailUpdated');
                    exit();
                }
            }
        }
    }

?>