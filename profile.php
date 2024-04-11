<?php
    include("connection.php");
    include("navbar.php");
    $student_id = 1;

            
            $sql = "SELECT COUNT(election_id) FROM e_c_data WHERE student_id = $student_id";
            $result = mysqli_query($conn,$sql);
            $value = mysqli_fetch_column($result);
        
            $sql2 = "SELECT count(election_id) FROM e_c_data";
            $result2 = mysqli_query($conn,$sql2);
            $value2 = mysqli_fetch_column($result2);
            
            $w_r= ($value * 100)/$value2;

            $sql = "SELECT COUNT(election_id) FROM e_c_data WHERE student_id = $student_id";
            $result = mysqli_query($conn,$sql);
            $value = mysqli_fetch_column($result);
        
            $sql2 = "SELECT count(election_id) FROM e_c_data";
            $result2 = mysqli_query($conn,$sql2);
            $value2 = mysqli_fetch_column($result2);
            
            $w_r= ($value * 100)/$value2;
            
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .body{
            display: flex;
        }
        .profile{
            width: 43%;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin: 4rem 1rem;
        }
        .content1{
            width: 50%;
        }
        .content2{
            width: 50%;
        }
        .profile{
            width: 100%;
        }
        .profile img{
            height: 27rem;
            width: 27rem;
            object-fit: cover;
            border-radius: 50%;
        }
        .name{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 3rem;
        }

        .progress_bar{
            height: 1rem;
            border-radius: 9px;
            width: 27rem;
            border: 1px solid;
        }
        .win_progress{
            height: 1rem;
            width: <?php echo $w_r;?>%;
            border-radius: 9px;
            background: #00db00ed;
            animation: progress 2s ease-in-out forwards;
            opacity: 0;
        }
        @keyframes progress {
            0%{
                opacity: 0;
                width: 0%;
            }
            100%{
                opacity: 1;
                width: <?php echo $w_r;?>%;
            }
            
        }   
    </style>
</head>
<body>
<div class="body">
    <div class="content1">
    <div class="profile">
        <img src="images/profile.jpg">
    </div>
    <div class="name">
        <h1>Rajat Chahuan</h1>
    </div>
    </div>
    <div class="content2">
        <div class="card">
        <div class="information">
            <div class="div">
            <h4 style="margin: 0;">Activness</h4><br><?php echo $w_r;?>%
            <div class="progress_bar">
            <div class="win_progress">

            </div>
            </div>
            </div>
            <div class="div">
                <h4>Popularity</h4>
                <div class="progress_bar">
                    <div class="popularity_progress">

                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

    
</body>
</html>