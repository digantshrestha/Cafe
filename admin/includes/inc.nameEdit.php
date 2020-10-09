<?php
    session_start();

    if(!isset($_SESSION['username'])){
        header("Location: ../admin.php");
        exit(); 
    }
    else{
        include_once("../../db/db.php");

        $query = 'SELECT * FROM brand';
        $db->setQuery($query);
        $datas = $db->getItems();
        $data = $datas[0];
        $id = $data['id'];

        if(isset($_POST['brandEdit'])){
            $brandName = htmlspecialchars($_POST['brandName']);
            if(empty($brandName)){
                header("Location: ../edit.php#brand?error=emptyBrand");
                exit();
            }
            else{
                if($brandName !== $data['brandname']){
                    $updateQuery = 'UPDATE brand SET brandname = $1 WHERE id = $2';
                    $db->setQuery($updateQuery);
                    $db->update($brandName, $id);

                    header('Location: ../edit.php?update=brandNameUpdated');
                }
                else{
                    header('Location: ../edit.php');
                }
            }
        }

        if(isset($_POST['quoteEdit'])){
            $quote = htmlspecialchars($_POST['quote']);
            if(empty($quote)){
                header("Location: ../edit.php#quote?error=emptyQuote");
                exit();
            }
            else{
                if($quote !== $data['quote']){
                    $updateQuery = 'UPDATE brand SET quote = $1 WHERE id = $2';
                    $db->setQuery($updateQuery);
                    $db->update($quote, $id);

                    header('Location: ../edit.php?update=quoteUpdated');
                }
                else{
                    header('Location: ../edit.php');
                }
            }
        }

        if(isset($_POST['aboutEdit'])){
            $about = htmlspecialchars($_POST['about']);
            if(empty($about)){
                header('Location: ../edit.php#aboutId?error=emptyAbout');
                exit();
            }
            else{
                if($about !== $data['about']){
                    $updateQuery = 'UPDATE brand SET about = $1 WHERE id = $2';
                    $db->setQuery($updateQuery);
                    $db->update($about, $id);

                    header('Location: ../edit.php?update=aboutUpdated');
                }
                else{
                    header('Location: ../edit.php');
                }
            }
        }
    }
?>

