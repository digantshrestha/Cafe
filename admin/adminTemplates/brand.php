<?php
  // $brandNameQuery = 'SELECT * FROM brand';
  // $db->setQuery($brandNameQuery);
  // $brandNames = $db->getItems();
  // $brandName = $brandNames[0];
?>

<div class="my-container" id="brand">
    <span class="edit-brand row">
    <h5 class="col-6">Brand Name :</h5>
        <form action="includes/inc.nameEdit.php" class="col-6 editor-form" method="POST">
          <input type="text" name="brandName" class="editor" value = "<?php echo $brandName['brandname']; ?>">
          <input type="submit" name="brandEdit" class="btn btn-primary btn-sm" value ="Edit">
        </form>
    </span>  
</div>
<hr>