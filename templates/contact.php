<?php
  if(isset($_GET['error'])){
    $error = htmlspecialchars($_GET['error']);
    echo "<script>
          alert('ERROR $error')
          </script>";
  }

  if(isset($_GET['update'])){
    $update = htmlspecialchars($_GET['update']);
    echo "<script>
          alert('UPDATE $update')
          </script>" ;
  
}
?>

<section class="contact" id="contactId">
      <h5>Contact Us</h4>

      <form action="mainIncludes/inc.contact.php" method="POST" class="contact-form grey">
        <div class="form-group">
          <input type="email" class="input" name="email" placeholder="Email...">
        </div>
        <div class="form-group">
          <textarea name="msg" class="input message" placeholder="Enter your Message..."></textarea>
        </div>
        <input type="submit" class="btn btn-secondary btn-sm" name="submit" value="Submit">
      </form>

</section>