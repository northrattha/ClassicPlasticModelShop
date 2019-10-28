<?php
    $con= new mysqli("localhost", "root", "", "classicmodels");
    
    if($con->connect_errno){
        die("Connection failed" . $con->connection_errno);
    }
?>