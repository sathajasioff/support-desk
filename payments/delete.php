<?php 
    require 'conn.php';

    if(isset($_GET['delete'])){
        $delete = $_GET['delete'];
        $sql = "delete from payment where paymentid = $delete";
        $result = $connection->query($sql);

        if($connection->query($sql)){
            echo '<script>location.replace("paydetails.php")</script>';
        }
        else{
            echo "Error:".$connection->error;
        }
    }


     
    
    $connection->close();

?>