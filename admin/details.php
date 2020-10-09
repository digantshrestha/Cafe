<?php session_start(); ?>


<?php

    if(!isset($_SESSION['username'])){
        header("Location: admin.php");
        exit();
    }
    else{
        include_once("../db/db.php");

        $id = $item = '';

        $brandNameQuery = 'SELECT * FROM brand';
        $db->setQuery($brandNameQuery);
        $brandNames = $db->getItems();
        $brandName = $brandNames[0];

        if(isset($_GET['id'])){
            $id = htmlspecialchars($_GET['id']);
            $query = 'SELECT * FROM menus WHERE id = $1';
            $db->setQuery($query);
            $items = $db->getItem($id);
            $item = $items[0];
        }


        if(isset($_POST['delete'])){
            $delete_id = htmlspecialchars($_POST['delete_id']);
            $query = 'DELETE FROM menus WHERE id = $1';
            $pathNames = $db->getPath($delete_id);
            $pathName = $pathNames[0];
            // echo $pathName['image_path'];
            unlink($pathName['image_path']);
            $db->setQuery($query);
            $db->delItem($delete_id);
            header("Location: edit.php");
        }

        if(isset($_GET['update'])){
            $update = htmlspecialchars($_GET['update']);
            if($update == 'nameUpdated'){
                echo "<script>
                        alert('Name Updated');
                    </script>"; 
            }
        }

?>  

<?php include("adminGlobal/seperateHeader.php");?>
<body>
    <header class="header">
        <div class="container">
            <a href="admin.php">Home</a>
            <br>
            <a href="edit.php">Back</a>
        </div>         
        <hr>
    </header>

    <section class="details">
    <div class="item-image" style = "background-image:url(<?php echo $item['image_path']; ?>);"></div>
        <form action="includes/inc.detailsEdit.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="image">
            <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
            <input type="submit" class = "btn btn-primary btn-sm" name="imageSubmit" value="Update">
            <br>
        </form>        
        
        <form action="includes/inc.detailsEdit.php" method="POST" enctype="multipart/form-data">
            <label for="name">Name : </label>
            <input type="text" name="name" value="<?php echo $item['name']; ?>">
            <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
            <input type="submit" class = "btn btn-primary btn-sm" name="nameSubmit" value="Update">
            <br>
        </form> 

        <form action="includes/inc.detailsEdit.php" method="POST" enctype="multipart/form-data">
            <label for="price">Price : </label>
            <input type="number" name="price" value="<?php echo $item['price']; ?>">
            <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
            <input type="submit" class = "btn btn-primary btn-sm" name="priceSubmit" value="Update">
            <br>
        </form>

        <form action="includes/inc.detailsEdit.php" method="POST" enctype="multipart/form-data">        
            <label for="quantity">Quantity : </label>
            <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>">
            <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
            <input type="submit" class = "btn btn-primary btn-sm" name="quantitySubmit" value="Update">
            <br>
        </form>

        <form action="includes/inc.detailsEdit.php" method="POST" enctype="multipart/form-data">
            <label for="available">Available Now</label>
            <select name="available">
                <option value="yes" <?php if($item['available']=='t'){echo 'selected="selected"';}?>>Yes</option>
                <option value="no" <?php if($item['available']=='f'){echo 'selected="selected"';}?>>No</option>
            </select>
            <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
            <input type="submit" class = "btn btn-primary btn-sm" name="availableSubmit" value="Update">
        </form>

            <p>Added Date : <?php echo $item['added_date']; ?></p>
            <p>Last Updated : <?php echo $item['modified_date']; ?></p>


        <div class="delete">
            <form action="details.php" method="POST">
              <input type="hidden" name="delete_id" value="<?php echo $item['id']; ?>">
              <input type="submit" class = "btn btn-danger" name="delete" value="Delete">
            </form>
        </div>
    </section>


<?php  
        include("adminGlobal/footer.php");

    }
?>