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

<main class="container">
    <form action="" class="card form order-info-form" method="POST">
            <div class="card-header">
                <h3 class="form-header">Contact Details</h3>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="First Name">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Last Name">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Phone Number">
                </div>

                <div class="form-group">
                    <input type="address" class="form-control" placeholder="Address">
                </div>

                <div class="form-group row">
                    <span class="col-md-2 add-input-info">Date</span>
                    <input type="date" class="form-control col-md-10">
                </div>

                <div class="form-group row">
                    <span class="col-md-2 add-input-info">Time</span>
                    <input type="Time" class="form-control col-md-10">
                </div>
                <input type="submit" class="btn btn-primary proceed-btn" value="Proceed">
            </div>
            
    </form>
</main>

<footer class="order-footer">
    <p><?php echo $brandName['brandname']; ?> &copy; 2020</p>
</footer>

<script src="bootstrap/js/bootstrap.min.js"></script>                        
  <script src="bootstrap/js/jquery.slim.min.js"></script>
  <script src="bootstrap/js/popper.min.js"></script>

</body>
</html>
