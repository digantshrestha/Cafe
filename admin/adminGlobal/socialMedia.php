<?php //session_start(); ?>

<?php
  // if(!isset($_SESSION['username'])){
  //   header('Location: admin.php');
  //   exit();
  // }else{
?>
<div class="social my-container" id = "social">
    <ul>
    <?php 
      $linkQuery = 'SELECT * FROM links';
      $db->setQuery($linkQuery);
      $links = $db->getItems();
      
      foreach($links as $link):
    ?>
      <div class="row">
        <li class="col-6"><a href="<?php echo $link['link']; ?>" target="_blank"><i class="<?php echo $link['icon']; ?>"></i>   <?php echo $link['name']; ?></a></li>
        <a class="btn btn-primary btn-sm" href="linkDetails.php?id=<?php echo $link['id']?>">Edit</a> 
      </div>
      <br>
    <?php endforeach;?>
    </ul>
</div>
<hr>

<?php
  //  }


?>






