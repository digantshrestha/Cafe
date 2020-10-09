<?php session_start(); ?>


<?php
    if(!isset($_SESSION['username'])){
        header("Location: ../admin.php");
        exit();
    }
    else{
        include_once("../../db/db.php");

        $id = $name = $price = $quantity = $imageName = $imagePath = $available = '';
        $error=['name'=>'', 'price'=>'', 'quantity'=>'', 'image'=>'', 'extension'=>'', 'uploadError'=>'', 'size'=>'', 'available'=>'', 'empty'=>''];


        if(isset($_POST['nameSubmit'])){
            $id = htmlspecialchars($_POST['id']);
            if(empty($_POST['name'])){
                header('Location: ../details.php?id='.$id.'&error=emptyNameField');
                exit();
            }
            else{
                $name = htmlspecialchars($_POST['name']);
    
                $query = 'SELECT name FROM menus WHERE id = $1';
                $db->setQuery($query);
                $datas = $db->getItem($id);
                $data = $datas[0];
                
                if($data['name'] !== $name){
                    $updateQuery = "UPDATE menus SET name = $1 WHERE id = $2";
                    $db->setQuery($updateQuery);
                    $db->update($name, $id);
                    header('Location: ../details.php?id='.$id.'&update=nameUpdated');   
                }               
                else{
                    header('Location: ../details.php?id='.$id);   
                } 
            }
        }
        
        if(isset($_POST['priceSubmit'])){
            $id = htmlspecialchars($_POST['id']);
            if(empty($_POST['price'])){
                header('Location: ../details.php?id='.$id.'&error=emptyPriceField');
                exit();
            }
            else{
                $price = htmlspecialchars($_POST['price']);
    
                $query = 'SELECT price FROM menus WHERE id = $1';
                $db->setQuery($query);
                $datas = $db->getItem($id);
                $data = $datas[0];
                
                if($data['price'] !== $price){
                    $updateQuery = "UPDATE menus SET price = $1 WHERE id = $2";
                    $db->setQuery($updateQuery);
                    $db->update($price, $id);
                    header('Location: ../details.php?id='.$id.'&update=priceUpdated');   
                } 
                else{
                    header('Location: ../details.php?id='.$id);   
                }                
            }
        }

        if(isset($_POST['quantitySubmit'])){
            $id = htmlspecialchars($_POST['id']);
            if(empty($_POST['quantity'])){
                header('Location: ../details.php?id='.$id.'&error=emptyPriceField');
                exit();
            }
            else{
                $quantity = htmlspecialchars($_POST['quantity']);
    
                $query = 'SELECT quantity FROM menus WHERE id = $1';
                $db->setQuery($query);
                $datas = $db->getItem($id);
                $data = $datas[0];
                
                if($data['quantity'] !== $quantity){
                    $updateQuery = "UPDATE menus SET quantity = $1 WHERE id = $2";
                    $db->setQuery($updateQuery);
                    $db->update($quantity, $id);
                    header('Location: ../details.php?id='.$id.'&update=quantityUpdated');   
                }
                else{
                    header('Location: ../details.php?id='.$id);   
                }                 
            }
        }

        if(isset($_POST['availableSubmit'])){
            $id = htmlspecialchars($_POST['id']);
            $available = htmlspecialchars($_POST['available']);

            if($available == 'yes'){
                $available = 'true';
            }
            else{
                $available = 'false';
            }

            $query = 'SELECT available FROM menus WHERE id = $1';
            $db->setQuery($query);
            $datas = $db->getItem($id);
            $data = $datas[0];
            
            if($data['available'] !== $available){
                $updateQuery = "UPDATE menus SET available = $1 WHERE id = $2";
                $db->setQuery($updateQuery);
                $db->update($available, $id);
                header('Location: ../details.php?id='.$id.'&update=availableUpdated');   
            }     
            else{
                header('Location: ../details.php?id='.$id);   
            }            
            
        }


        if(isset($_POST['imageSubmit'])){
            $id = htmlspecialchars($_POST['id']);
            if(empty($_FILES['image'])){
                header('Location: ../details.php?id='.$id.'&error=emptyImageField');
                exit();
            }
            else{
                $file = $_FILES['image'];
                $fileName = $file['name'];
                $fileTmpPath = $file['tmp_name'];
                $fileSize = $file['size'];
                $fileError = $file['error'];
                $fileType = $file['type'];//not imp

                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));
                $extAllowed = array('jpg', 'jpeg', 'png');

                

                if(in_array($fileActualExt, $extAllowed)){
                    if($fileError === 0){
                        if($fileSize <= 50000){
                            $newFileName = uniqid('', true).".".$fileActualExt;
                            $imageName = $newFileName;
                            $fileDestination = "../../uploads/".$newFileName;
                            $imagePath = "../uploads/".$newFileName;
                            
                            $tempImgName = $db->getImgName($id);
                            $imgName = $tempImgName[0];
                            $path = "../../uploads/".$imgName['image_name'];

                            if(unlink($path)){
                                move_uploaded_file($fileTmpPath, $fileDestination);
                                $imgQuery = 'UPDATE menus SET image_path = $1, image_name = $2 WHERE id = $3';
                                $db->setQuery($imgQuery);
                                $db->updateImg($imagePath, $imageName, $id);
                                header('Location: ../details.php?id='.$id.'&update=imgUpdated');
                            }
                        }
                        else{
                            header('Location: ../details.php?id='.$id.'&error=imgSizeError');
                            exit();
                        }
                    }
                    else{
                        header('Location: ../details.php?id='.$id.'&error=uploadError');
                        exit();
                    }
                }
                else{
                    header('Location: ../details.php?id='.$id.'&error=extError');
                    exit();
                }
            }                        
        }
     

    }


?>

