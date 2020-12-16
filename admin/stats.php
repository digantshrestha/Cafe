<?php
    session_start();

    if(!isset($_SESSION['username'])){
        header('Location: admin.php');
        exit();
    }
    else{
        include_once('../db/db.php');

        $brandNameQuery = 'SELECT * FROM brand';
        $db->setQuery($brandNameQuery);
        $brandNames = $db->getItems();
        $brandName = $brandNames[0];

        

?>

<?php include_once("adminGlobal/seperateHeader.php");?>
    
    

<?php
include("adminGlobal/footer.php");


    }

?>

