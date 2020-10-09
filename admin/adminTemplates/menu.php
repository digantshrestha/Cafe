<?php
  // $conn=mysqli_connect("localhost", "root", "database1234", "cafedb");
  // if(!$conn){
  //   echo "Connection Error" . mysqli_connect_error();
  // }
  //   $query = 'SELECT * FROM menus';

  //   $result = mysqli_query($conn,$query);
  //   $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
  //   mysqli_free_result($result);
  //   mysqli_close($conn);

  // include("DB_Config.php");
  // $db = new DB_Config();

  // include("dbSetter.php");
  // $db->setConnection($host, $user, $password, $dbname);
  // $db->connect();
  
  $query = 'SELECT * FROM menus';
  $db->setQuery($query);

  $items = $db->getItems();
  
?>

<section class="menu" id="menuId">
    <div class="container">
      <h5>We Serve</h4>
    </div>  

    <div class="glider-contain">
      <button class="glider-prev"><i class="fa fa-chevron-left"></i></button>
      <ul class="glider items row">

        <?php foreach($items as $item): ?>

          <li class="item">
            <div class="box">
              <div class="img" style = "background-image:url(<?php echo $item['image_path'];?>);">
                <div class="inner-img"></div>
              </div>
              <div class="item-info">
                <p><?php echo $item['name']; ?></p>
                <p>Price : Rs. <?php echo $item['price']; ?></p>
              </div>

              <div class="more">
                <a href="details.php?id=<?php echo $item['id'];?>" class="btn btn-primary btn-sm">Edit</a>
              </div>
            </div>
          </li>

        <?php endforeach;?>

      </ul>   

      <button class="glider-next"><i class="fa fa-chevron-right"></i></button>
      <div role="tablist" class="dots"></div>   
    </div>
    
    <div class="container">
    <a href="add.php" class="btn btn-primary">Add Items</a>
    </div>
</section>
<br><hr>
