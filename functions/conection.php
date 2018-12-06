<?php
    $con = new mysqli('localhost', 'root', '29.Mayo1972', 'profiles');
    if($con->connect_error){
        echo $con->connect_error;
    }
    $dato = "SELECT * FROM users ORDER BY Name ASC";
?>