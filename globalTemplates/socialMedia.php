<div class="social fixed-top">
    <!-- <ul> -->
    <?php 
      $linkQuery = 'SELECT * FROM links';
      $db->setQuery($linkQuery);
      $links = $db->getItems();
      foreach($links as $link):
    ?>  
        <li><a href="<?php echo $link['link']; ?>"><i class="<?php echo $link['icon']; ?>"></i></a></li>    
    <?php endforeach;?>    
    <!-- </ul> -->
</div>

