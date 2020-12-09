<?php
    include_once("db/db.php");

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
  <title><?php echo $brandName['brandname']; ?></title>
  <style>
    <?php include("style/head.css"); ?>
    <?php include("style/order.css");?>
    <?php include("style/footer.css");?>
    <?php include("style/global.css");?>
  </style>
</head>

<body>
<header class="header sticky-top">
    <div class="container header-container">
      <a href="" class="brand"><h3><?php echo $brandName['brandname']; ?></h3></a>
    </div>
</header>
<?php include_once("globalTemplates/socialMedia.php"); ?>

<main class="jumbotron order-jumbo">
    <div class="opacity order-opacity">
        <div class="container">
            <form action="order_info.php" class="order-method-form">
                <button class="btn btn-primary" type="Submit">Delivery <i class="fas fa-truck"></i></button>
                <button class="btn btn-primary" type="Submit">Pick Up <i class="fas fa-store"></i></button>
            </form>
        </div>
    </div>
</main>

<footer class="order-footer fixed-bottom">
    <p><?php echo $brandName['brandname']; ?> &copy; 2020</p>
</footer>

<script src="bootstrap/js/bootstrap.min.js"></script>                        
  <script src="bootstrap/js/jquery.slim.min.js"></script>
  <script src="bootstrap/js/popper.min.js"></script>

</body>
</html>
