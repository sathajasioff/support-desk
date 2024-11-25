<?php 
    require 'config.php';

    if(isset($_GET['delete'])){
        $delete = $_GET['delete'];
        $sql = "delete from register where StuID = $delete";
        $result = $connection->query($sql);

        if($connection->query($sql)){
            echo '<script>location.replace("sdetails.php")</script>';
        }
        else{
            echo "Error:".$connection->error;
        }
    }


     
    
    $connection->close();

?>