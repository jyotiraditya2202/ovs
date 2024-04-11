<?php
    include('connection.php');
    $id = $_GET['cand_id'];
    $sql = "DELETE FROM `e_c_data` WHERE $id";
    $result = $conn->query($sql);
    header("location:admin.php");
?>