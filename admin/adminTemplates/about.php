<section class="about container" id="aboutId">
    <h5>About Us</h5>
    <form action="includes/inc.nameEdit.php" method="POST">
        <textarea name="about" class="form-control"><?php echo $brandName['about'];?></textarea>
        <input type="submit" name="aboutEdit" class="btn btn-primary" value ="Edit">
    </form>
</section>
<br><hr>