<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location: ../admin.php');
        exit();
    }else{
        include_once("../../db/db.php");

        if(isset($_POST['edit'])){
            $id = htmlspecialchars($_POST['linkId']);
            if(empty($_POST['name']) || empty($_POST['icon']) || empty($_POST['link'])){
                header('Location: ../linkDetails.php#social?id='.$id.'&error="emptyLinkField');
                exit();
            }
            else{
                $name = htmlspecialchars($_POST['name']);
                $icon = htmlspecialchars($_POST['icon']);
                $link = htmlspecialchars($_POST['link']);

                // echo $name."\r\n";
                // echo $icon."\r\n";
                // echo $link."\r\n";
                // $query = 'SELECT * FROM links WHERE id = $1';
                // $db->setQuery($query);
                // $datas = $db->getItem($id);
                // $data = $datas[0];

                $updateQuery = 'UPDATE links SET name = $1, link = $2, icon = $3 WHERE id = $4';
                $db->setQuery($updateQuery);
                $db->updateLink($name, $link, $icon, $id); 

                header("Location: ../linkDetails.php?id=".$id."&update=linkUpdated"); 

                // if($data['name'] !== $name){
                //     $nameUpdateQuery = 'UPDATE links SET name = $1 where id = $2';
                //     $db->setQuery($nameUpdateQuery);
                //     $db->update($name, $id);
                //     header("Location: ../linkDetails.php?id=".$id."&update=nameUpdated");
                // }

                // if($data['icon'] !== $icon){
                //     $iconUpdateQuery = 'UPDATE links SET icon = $1 where id = $2';
                //     $db->setQuery($iconUpdateQuery);
                //     $db->update($icon, $id);
                //     header("Location: ../linkDetails.php?id=".$id."&update=iconUpdated");
                // }

                // if($data['link'] !== $link){
                //     $linkUpdateQuery = 'UPDATE links SET link = $1 where id = $2';
                //     $db->setQuery($linkUpdateQuery);
                //     $db->update($link, $id);
                //     header("Location: ../linkDetails.php?id=".$id."&update=linkUpdated");
                // }
            }
        }   
        
    }
?>