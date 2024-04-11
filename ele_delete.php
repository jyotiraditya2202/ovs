<?php
    include('connection.php');
    $id = $_GET['e_id'];
    $sql = "DELETE FROM `elections` WHERE $id";
    $result = $conn->query($sql);
    header("location:admin.php?id=2");
?>