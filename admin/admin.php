<?php session_start(); ?>

<?php

    include_once('../db/db.php');

    $brandNameQuery = 'SELECT * FROM brand';
    $db->setQuery($brandNameQuery);
    $brandNames = $db->getItems();
    $brandName = $brandNames[0];
    

    $error = ['emptyFields'=>'', 'username'=>'', 'password'=>''];
    $output = '';

    if(isset($_GET['error'])){
        $tempError = $_GET['error'];
        if($tempError == "emptyField"){
            $error['emptyFields'] = "Please fill the form";
        }
        else if($tempError == "incorrectUsername"){
            $error['username'] = "Incorrect Username";
        }
        else{
            $error['password'] = "Incorrect Password";
        }
    }

?>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="fontawesome/css/all.min.css" />
  <title>Admin | <?php echo $brandName['brandname'];?></title>
</head>

<?php
    if(!isset($_SESSION['username'])){
?>
        <a href="../">Home</a>

        <?php echo $error['emptyFields']; ?>
        <?php echo $error['username']; ?>
        <?php echo $error['password']; ?>
        <form action="includes/inc.adminLogin.php" method="POST">

            <input type="text" name="username" placeholder="Username...">

            <input type="password" name="password" placeholder="Password...">

            <input type="submit" name="submit" class="btn btn-primary" value="Login">
            <a href="forgetPwd.php">Forget Password</a>
        </form>

<?php
    }
    else{
?>
        
        <a href="stats.php">Stats</a>
        <a href="edit.php">Edit</a>

        <form action="includes/inc.adminLogout.php" method="POST">
            <input type="submit" class="btn btn-primary" name="logout" value="Logout">
        </form>
<?php
    }

?>
