<?php
  $query = 'SELECT * FROM menus';
  $db->setQuery($query);

  $items = $db->getItems();
?>

<section class="menu" id = "menuId">
    <div class="container">
      <h5>We Serve</h4>
    </div>  

    <div class="glider-contain">

      <button class="glider-prev"><i class="fa fa-chevron-left"></i></button>
        <ul class="glider items">

          <?php foreach($items as $item): ?>
            
            <li class="item">
              <div class="box grey">
                <div class="img" style = "background-image:url(<?php echo 'uploads/'.$item['image_name'] ;?>);">
                  <div class="inner-img"></div>
                </div>
                <div class="item-info">
                  <p><?php echo $item['name'] ; ?></p>
                  <p>Price : Rs. <?php echo $item['price']; ?></p>
                  <button class="btn btn-primary btn-sm order-btn">Order</button>
                </div>
              </div>
            </li>

          <?php endforeach;?>
        </ul>

      <button class="glider-next"><i class="fa fa-chevron-right"></i></button>

      <div role="tablist" class="dots"></div>


    </div>

    <div class="glider-contain">

      <button class="glider-prev"><i class="fa fa-chevron-left"></i></button>
        <ul class="glider3 items">

          <?php foreach($items as $item): ?>
            
            <li class="item">
              <div class="box grey">
                <div class="img" style = "background-image:url(<?php echo 'uploads/'.$item['image_name'] ;?>);">
                  <div class="inner-img"></div>
                </div>
                <div class="item-info">
                  <p><?php echo $item['name'] ; ?></p>
                  <p>Price : Rs. <?php echo $item['price']; ?></p>
                  <button class="btn btn-primary btn-sm order-btn">Order</button>
                </div>
              </div>
            </li>

          <?php endforeach;?>
        </ul>

      <button class="glider-next"><i class="fa fa-chevron-right"></i></button>

      <div role="tablist" class="dots"></div>


    </div>


    
</section>
