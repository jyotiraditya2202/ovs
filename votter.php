<?php
    include "connection.php"; 
    session_start();

    $election_id = $_GET['id'];
    $_SESSION['status'] = 4;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        body{
            font-family: "Poppins", sans-serif;
            font-style: normal;
            font-size: large;
        }
        .candidate{
            display: flex;
        }
        .cand{
            display: flex;
            width: 36rem
        }
        .checkbox{
            display: flex;
        }
        .candidate img{
            width: 4rem;
            height: 4rem;
            overflow: hidden;
            object-fit: cover;
            border-radius: 50%;
        }
        form{
            display: flex;
            flex-direction: column;
            align-items: center;
            background: #80808024;
            width: 40rem;
            margin: 1rem 33rem;
            border-radius: 1rem;
            padding: 1rem;
            box-shadow: 1rem 1rem 20px 2px #8080801a;
        }
    </style>
</head>
<body>
    <form method="post">
            <h2>KSV VOTTING MACHINE</h2>
    <?php
        $sql = "SELECT * FROM e_c_data";
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()){
            if($row['election_id'] == $election_id){
        ?>
    <class class="candidate">
        <class class="cand">
        <img src="images/profile.jpg">
        <h4>Candidate name</h4>
        </class>
        <class class="checkbox">
        <input name="radio" type="radio" value="<?php echo $row['e_c_id']?>">
        </class>
    </class>
    <?php
            }
        }
    ?>
        <button type="submit" name ="vote">VOTE</button>
        <?php
        if(isset($_POST['vote'])){
            $vote = $_POST['radio'];
            $student_id = $_SESSION['status'];
            $sql="INSERT INTO `voter_table`(`student_id`, `election_id`, `candidate_id`) VALUES ('$student_id','$election_id','$vote')";
            $result = $conn->query($sql);
            header("location:registration.php");
        }
        ?>
    </form>
</body>
</html>