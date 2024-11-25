<?php 
    require 'con_config.php';

    if(isset($_GET['delete'])){
        $delete = $_GET['delete'];
        $sql = "delete from contact where contactid = $delete";
        $result = $connection->query($sql);

        if($connection->query($sql)){
            echo '<script>location.replace("contactApp.php")</script>';
        }
        else{
            echo "Error:".$connection->error;
        }
    }


     
    
    $connection->close();

?>