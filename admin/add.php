<?php session_start();  ?>
<?php //include("adminGlobal/header.php"); ?>

<?php

    if(!isset($_SESSION['username'])){
        header('Location: admin.php');
        exit();
    }
    else{
        include_once("../db/db.php");
        $brandNameQuery = 'SELECT * FROM brand';
        $db->setQuery($brandNameQuery);
        $brandNames = $db->getItems();
        $brandName = $brandNames[0];

        $name = $price = $quantity = $imagePath = $imageName = $available = '';

        // checking for all the input fields are filled or empty
        $error=['name'=>'', 'price'=>'', 'quantity'=>'', 'image'=>'', 'extension'=>'', 'uploadError'=>'', 'size'=>'', 'available'=>''];
        if(isset($_POST['submit'])){
            if(empty($_POST['name'])){
                $error['name'] = "Please enter the name";
            }else{
                $name = htmlspecialchars($_POST['name']);//checking and filtering input data
            }

            if(empty($_POST['price'])){
                $error['price'] = "Please enter the price";
            }else{
                $price = htmlspecialchars($_POST['price']);//checking and filtering input data
            }

            if(empty($_POST['quantity'])){
                $error['quantity'] = "Please enter the quantity";
            }else{
                $quantity = htmlspecialchars($_POST['quantity']);//checking and filtering input data
            }

             if(!empty($_FILES['image'])){
                $file = $_FILES['image'];
                // print_r($file);
                //extract info from the variable file
                $fileName = $file['name'];
                $fileTmpPath = $file['tmp_name'];
                $fileSize = $file['size'];
                $fileError = $file['error'];
                $fileType = $file['type'];//not imp
                
                //seperating file extension
                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));

                $extAllowed = array('jpg', 'jpeg', 'png');

                if(in_array($fileActualExt, $extAllowed)){
                    if($fileError === 0){
                        if($fileSize <= 50000){
                            $newFileName = uniqid('', true).".".$fileActualExt;
                            $imageName = $newFileName;
                            $fileDestination = '../uploads/'.$newFileName;
                            move_uploaded_file($fileTmpPath, $fileDestination);
                            $imagePath = $fileDestination;
                        }else{
                            $error['size'] = "File size cannot be more than 5mb";
                            echo $error['size'];
                        }
                    }else{
                        $error['uploadError'] = "You have error uploading file";
                        echo $error['uploadError'];
                    }
                }else{
                    $error['extension'] = "You cannot upload file of this type";
                    echo $error['extension'];
                }
             }else{
                $error['image'] = "Please select an image";
            }

            $available = $_POST['available'];
            if($available == 'yes'){
                $availableData = 'true';
            }else{
                $availableData = 'false';
            }

            

            if(!array_filter($error)){//checking if the array $error is empty or not
                $query = "INSERT INTO menus (name, price, quantity, image_path, image_name, available) VALUES(
                $1, $2, $3, $4, $5, $6)";

                $db->setQuery($query);
                $db->setValue($name, $price, $quantity, $imagePath, $imageName, $availableData);
                $db->addItem();
                header("Location: edit.php");
            }

        }

?>

        <?php include("adminGlobal/seperateHeader.php");?>
        <body>
        <header class="container">
            <a href="edit.php">Back</a>
            <a href="admin.php">Admin Page</a>
        </header>
        <section class="addItems">
            <h4>Add Items</h4>
            <form action="add.php" class="add-form" method="POST" enctype="multipart/form-data">
                <div class="input">
                    <input type="text" name="name" for="name" placeholder="Name" value="<?php echo $name ;?>">
                    <?php echo $error['name'];?>
        
                    <input type="text" name="price" for="price" placeholder="Price" value="<?php echo $price ;?>">
                    <?php echo $error['price'];?>
        
                    <input type="text" name="quantity" for="quantity" placeholder="Quantity" value="<?php echo $quantity ;?>">
                    <?php echo $error['quantity'];?>
        
                    <input type="file" name="image" for="image">
                    <?php //echo $error['image'];?>
        
                    <label for="available">Available Now</label>
                    <select name="available">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                    <?php echo $error['available'];?>
                    <br>
                    <input type="submit" name="submit" value="Add">
                </div>
            </form>
        </section>
<?php        
        include("adminGlobal/footer.php");
    }

?>