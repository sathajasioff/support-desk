<?php 
    require 'Clerinconfig.php';

    if(isset($_GET['delete'])){
        $delete = $_GET['delete'];
        $sql = "delete from inquiry where inquiryid = $delete";
        $result = $connection->query($sql);

        if($connection->query($sql)){
            echo '<script>location.replace("ClerinCrudApp.php")</script>';
        }
        else{
            echo "Error:".$connection->error;
        }
    }


     
    
    $connection->close();

?>