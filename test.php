<?php
    include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

   <?php
   $sql = "SELECT * FROM elections";
   $result = $conn->query($sql);

   $row = $result->fetch_assoc();

   date_default_timezone_set('Asia/Kolkata');
    $time = strtotime(date('h:i:sa'));
    $time2 = strtotime($row['s_t_t']);
    $date1 = strtotime('2024-01-02');
    $date2 = strtotime('2024-01-01');
    $diffrence = $date1 - $date2;
    $diffrence2 = $time2 - $time;

    echo''.$diffrence2.'';
    ?>
    <br>
    <?php
    echo date('h:i:sa');

    ?>
    <br>
    <?php
    echo $time;
   ?>

</body>
</html>