<?php
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
  <link rel="stylesheet" href="glider.css">
  <title><?php echo $brandName['brandname']; ?></title>
  <style>
    <?php include("style/head.css"); ?>
    <?php include("style/menu.css"); ?>
    <?php include("style/info.css"); ?>
    <?php include("style/form.css"); ?>
    <?php include("style/footer.css");?>
    <?php include("style/global.css");?>
  </style>
</head>

<body>
<header class="header sticky-top">
    <div class="container header-container">
      <div class="dropdown">
        <i class="fas fa-bars float-right" type="button" id="dropdownMenuButton" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false"></i>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a href="#menuId" class="dropdown-item">Menus</a>
          <a href="#mapId" class="dropdown-item">Location</a>
          <a href="#aboutId" class="dropdown-item">About Us</a>
          <a href="#contactId" class="dropdown-item">Contact Us</a>
        </div>
      </div>

      <a href="" class="brand"><h3><?php echo $brandName['brandname']; ?></h3></a>
    </div>
</header>