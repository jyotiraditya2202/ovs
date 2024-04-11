<?php
    $conn = new mysqli('localhost','root','','ovs');
    
    if($conn->connect_error)
    {
        echo "field";
        die("connection failed :". $conn->connect_error);
    }
?>