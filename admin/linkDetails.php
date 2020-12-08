<?php
session_start();
    if(!isset($_SESSION['username'])){
        header('Location: admin.php');
        exit();
    }else{
        include_once("../db/db.php");

        $brandNameQuery = 'SELECT * FROM brand';
        $db->setQuery($brandNameQuery);
        $brandNames = $db->getItems();
        $brandName = $brandNames[0];

        if(isset($_GET['id'])){
            $id = htmlspecialchars($_GET['id']);
            $linkQuery = 'SELECT * FROM links WHERE id = $1';
            $db->setQuery($linkQuery);
            $links = $db->getItem($id);
            $link = $links[0];
        }
?>
<?php include("adminGlobal/seperateHeader.php");?>

    <header class="header">
        <div class="container">
            <a href="admin.php">Home</a>
            <br>
            <a href="edit.php">Back</a>
        </div>         
        <hr>
    </header>
    
    <div class="row">
        <li class="col-6"><a href="<?php echo $link['link']; ?>" target="_blank"><i class="<?php echo $link['icon']; ?>"></i>   <?php echo $link['name']; ?></a></li>
        <form action="includes/inc.adminLinks.php" class="col-6 editor-form" method="POST">
        <input type="text" class="editor" name="name" value = "<?php echo $link['name']; ?>"> <br><br>
        <input type="text" class="editor" name="icon" value = "<?php echo $link['icon']; ?>"><br><br>
        <input type="text" class="editor" name="link" value = "<?php echo $link['link']; ?>">
        <input type="hidden" name="linkId" value = "<?php echo $link['id']; ?>">
        <br><br>
        <input type="submit" name="edit" class="btn btn-secondary btn-sm" value ="Edit">
    </form>
    </div>
</body>

<?php  
        include("adminGlobal/footer.php");
?>

<?php
    }

?>



