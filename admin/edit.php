<?php session_start(); ?>

<?php
  if(!isset($_SESSION['username'])){
    header('Location: admin.php');
    exit();
  }else{
?>
    <?php
      include_once("../db/db.php");

      $brandNameQuery = 'SELECT * FROM brand';
      $db->setQuery($brandNameQuery);
      $brandNames = $db->getItems();
      $brandName = $brandNames[0];
  
    ?>
    <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="fontawesome/css/all.min.css" />
  <link rel="stylesheet" href="glider.css"/>
  
  <title>Admin | <?php echo $brandName['brandname'];?></title>
  <style>
    <?php include("adminStyle/header.css"); ?>
    <?php include("adminStyle/socialMedia.css"); ?>
    <?php include("adminStyle/menu.css"); ?>
    <?php include("adminStyle/add.css"); ?>
    <?php include("adminStyle/map.css"); ?>
    <?php include("adminStyle/about.css"); ?>
    <?php //include("adminStyle/form.css"); ?>
    <?php //include("adminStyle/footer.css");?>
    <?php //include("adminStyle/global.css");?>
  </style>
</head>

    <?php include("adminGlobal/header.php"); ?>
    <?php include("adminGlobal/socialMedia.php"); ?>
    <?php include("adminTemplates/brand.php"); ?>
    <?php include("adminTemplates/jumbotron.php"); ?>
    <?php include("adminTemplates/menu.php"); ?>

    <?php include("adminTemplates/info.php"); ?>

    <?php include("adminTemplates/contact.php"); ?>

    <?php include("adminGlobal/footer.php"); ?>



<?php
  }


?>