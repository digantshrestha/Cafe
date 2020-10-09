<?php
  $contactQuery = 'SELECT * FROM contact';
  $db->setQuery($contactQuery);
  $contactDatas = $db->getItems(); 
  $contactData = $contactDatas[0];

?>

<section class="contact container" id="contactId">
    <h5>Contact Us</h4>
    <form action="includes/inc.editContact.php" method="POST">
      <input type="email" class="form-control" name="email" value="<?php echo $contactData['email']; ?>">
      <input type="submit" class="btn btn-primary btn-sm" name="submit" value="Submit">
    </form>
</section>