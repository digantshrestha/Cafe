<?php
  // if(isset($_GET['error'])){
  //   $error = htmlspecialchars($_GET['error']);
  //   echo "<script>
  //         alert('ERROR $error')
  //         </script>";
  // }

  // if(isset($_GET['update'])){
  //   $update = htmlspecialchars($_GET['update']);
  //   echo "<script>
  //         alert('UPDATE $update')
  //         </script>" ;
  
// }
?>

<section class="contact" id="contactId">
      <h5>Contact Us</h4>

      <form action="mainIncludes/inc.contact.php" method="POST" class="contact-form grey">
        <div class="row">
          <div class="form-group col-md-6">
            <span class="req">*</span>
            <input type="text" class="input form-control" name="fname" placeholder="First Name" required="required">
          </div>

          <div class="form-group col-md-6">
            <span class="req">*</span>  
            <input type="text" class="input form-control" name="lname" placeholder="Last Name" required="required">
          </div>
        </div>

        <div class="form-group">
          <span class="req">*</span>
          <input type="text" class="input form-control" name="phone" placeholder="Phone no." required="required">
        </div>

        <div class="form-group">
          <span class="req">*</span>
          <textarea name="msg" class="input message form-control" placeholder="Enter your Message..." required="required"></textarea>
        </div>

        <input type="submit" class="btn btn-secondary btn-sm" name="submit" value="Submit">
      </form>

</section>