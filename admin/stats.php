<?php
    session_start();

    if(!isset($_SESSION['username'])){
        header('Location: admin.php');
        exit();
    }
    else{
        include('../db/db.php');

        $brandNameQuery = 'SELECT * FROM brand';
        $db->setQuery($brandNameQuery);
        $brandNames = $db->getItems();
        $brandName = $brandNames[0];

        $query = 'SELECT * FROM contact';
        $db->setQuery($query);
        $results = $db->getMsgs();

        $msgNum = $db->getMsgCount();

?>

<?php include("adminGlobal/seperateHeader.php");?>
    
    <section class="container tables">
                
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Contact no.</th>
                    <th>Message</th>
                </tr>
            </thead>

            <tbody>
        
    <?php
            // echo $msgNum;
            foreach($results as $result):?>

            <tr>
                <th scope="row"><?php echo $result['id'];?></th>
                <td><?php echo $result['first_name'].$result['last_name'] ;?></td>
                <td><?php echo $result['contact_no'];?></td>
                <td><?php echo $result['message'];?></td>
            </tr>

            <?php endforeach; ?>

            </tbody>
        </table>        
    </section>

<?php
include("adminGlobal/footer.php");


    }

?>

