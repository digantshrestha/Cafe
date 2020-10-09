<?php
    if(isset($_POST['submit'])){
        $email = htmlspecialchars($_POST['email']);
        $msg = htmlspecialchars($_POST['msg']);

        if(empty($email) || empty($msg)){
            header('Location: ../?error=emptyField');
            exit();
        }
        else{
            if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                header('Location: ../?error=invalidEmail');
                exit();
            }
            else{
                include_once("../db/db.php");

                $query = 'SELECT * FROM contact';
                $db->setQuery($query);
                $datas = $db->getItems();                
                $data = $datas[0];

                $toEmail = $data['email'];
                $subject = 'Contact Request from '.$email;
                $body = "<h2>Contact Request</h2>
                <h4>Email</h4><p>$email</p>
                <h4>Message</h4><p>$message</p>"
                ;

                // Email Headers
                $headers = "MIME-Version : 1.0\r\n";
                $headers .= "Content-Type:text/html;charset=UTF-8\r\n";

                // Additional Headers
                $headers .= "From: $email\r\n";

                // Mail Function
                if(mail($toEmail, $subject, $body, $headers)){
                    header('Location: ../?update=messegeSent');
                    exit();
                }
                else{
                    header('Location: ../?error=failedtosendmessage');
                    exit();
                }
            }
        }
    }
    
?>