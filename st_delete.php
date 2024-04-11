<?php
    include('connection.php');
    $id = $_GET['s_id'];
    $sql = "DELETE FROM `student_data` WHERE $id";
    $result = $conn->query($sql);
    header("location:admin.php");
?>