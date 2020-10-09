<?php
    include_once("../../db/db.php");

    $username = $pwd = '';
    if(isset($_POST['submit'])){
        if(empty($_POST['username']) || empty($_POST['password'])){
            header("Location: ../admin.php?error=emptyField");
            exit();
        }
        else{
            $username = htmlspecialchars($_POST['username']);
            $pwd = htmlspecialchars($_POST['password']);
        
            $row = $db->getRow($username);
            // header("Location: ../admin.php?row=".$row);
            if($row == 0){
                header("Location: ../admin.php?error=incorrectUsername");
                exit();
            }
            else{
                $query = 'SELECT * FROM admin WHERE username = $1';
                $db->setQuery($query);
                $datas = $db->getUserData($username);
                $data = $datas[0];
                
                if($data['password'] !== $pwd){
                    header("Location: ../admin.php?error=incorrectPassword");
                    exit();
                }
                else{
                    // header("Location: ../admin.php?loginmsg=success");
                    session_start();
                    $_SESSION['username'] = $username;
                    header('Location: ../admin.php');
                }
            }
        }
    }
?>
