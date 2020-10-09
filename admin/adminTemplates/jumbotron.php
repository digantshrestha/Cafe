<div class="my-container" id="quote">
  <section class="jumbotron-editor row">
    <h5 class="col-6">Quote : </h5>
    
    <form action="includes/inc.nameEdit.php" class="col-6 editor-form" method="POST">
      <input type="text" name="quote" class="editor" value="<?php echo $brandName['quote']; ?>">
      <input type="submit" name="quoteEdit" class="btn btn-primary btn-sm edit" value="Edit">
    </form>
    
  </section>
</div>
<hr>