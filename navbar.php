<?php
    include 'connection.php';
    session_start();
    $_SESSION['status']; 
    ob_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
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
        .navbar{
            display: grid;
            background: white;
            grid-auto-flow: column;
            position: sticky;
            top: 0%;
            width: 100%;
            box-shadow: -1px 7px 13px -4px #afadadb5;
            align-items: center;
            height: 4rem;
        }
        .login{
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }
        .disable{
            font-weight: 300;
            font-size: larger;

        }
        .link a{
            text-decoration: none;
            color: black;
        }
        .login button{
            margin: 1rem;
            width: 6rem;
            height: 2rem;
            text-align: center;
            background-color:#33b249;
            border: none;
            cursor: pointer;
            font-size: medium;
        }
        .login-form{
            display: none;
        }
        .login-form form{
            position: fixed;
            background: white;
            justify-content: center;
            align-items: center;
            top: 5rem;
            display: grid;
            align-self: center;
            justify-self: flex-end;
            height: 14rem;
            width: 15rem;
            box-shadow:-8px 10px 15px -6px #afadadb5;
        }
        .login-form input{
            margin: 6px 1rem;
            margin: 6px 1rem;
            width: 11rem;
            height: 22px;
            text-align: center;
            border-radius: 9px;
            border: 1px solid;
        }
        .login-form button{
            width: 5rem;
            margin: 10px 67px;
            background-color: #33b249;
            border: none;
            height: 28px;
        }
        .login-form i{
            font-size: small;
            font-weight: 100;
            color: gray;
            margin: 2px 4px;
        }
        
    </style>
    <script>
        function openform(){
            document.getElementById("form").style.display = "grid";
        }
        function closeform(){
            document.getElementById("form").style.display = "none";
        }
    </script>
</head>
<body id="body">
    <div class="navbar">
        <div class="disable">
            &nbsp;&nbsp;&nbsp;
            <a href="home.php?course=0&sem=0">LOGO</a> 
        </div>
        <div class="link">
            <a href="home.php?course=0&sem=0">home</a>
        </div>
        <div class="link">
            <a href="#">help</a>
        </div>
        <div class="link">
            <a href="#">contact</a>
        </div>
        <div class="link">
            <a href="#">news</a>
        </div>
        <div class="link">
            <a href="#">about us</a>
        </div>
        <div class="login">
            <?php
            if($_SESSION['status'] == null){
            ?>
            <button onclick="openform()">Login</button>
            <div class="login-form" id="form">
                <form method="post">
                            <button style="background-color: transparent; text-align:left; height: 1px;width: 100%;margin: 0;text-align: end;" onclick="closeform()">
                            <i class="fa fa-close"></i></button>   
                        <span style="text-align: center;">Login</span>
                        
                    <input type="text" placeholder="enrollment no" name="eno" required>
                    <input type="password" placeholder="password" name="password" required>
                    <button type="submit" style="font-size: small;" name="submit">
                    Login    
                    </button>
                </form>
                <?php
                if(isset($_POST['submit'])){
                    $eno = $_POST['eno'];
                    $password = $_POST['password'];

                    $sql = "SELECT * FROM student_data";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()){ 

                        if($row['enrollment_no'] == $eno){
                            if($row['password'] == $password){ 
                                $_SESSION['status'] = $row['student_id'];
                                header('Refresh:0');
                                
                        }
                        else{

                        }
                }
            }

        }
    }
    else{
        ?>
            <form method="post">
            <button name="logout">Log-out</button>
            </form>
            <?php
                if(isset($_POST['logout']))
                {
                    $_SESSION['status'] = null;
                    header('Refresh:0');
                }
            ?>
        <?php
    }
                ?>
            </div>
        </div>
    </div>
    
</body>
</html>