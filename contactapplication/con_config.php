<?php 
    $connection = new mysqli("localhost", "root", "", "iwt");

    if($connection->connect_error)
        {
            die("Connection failed:" .$connection->connect_error);
        }
?>