<?php
    include("connection.php");
    include("navbar.php");
    $election_id = $_GET['id'];
    date_default_timezone_set('Asia/Kolkata');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .card{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            width: 30%;
        }
        .content1{
            margin: 4rem;
            display: flex;
            background: white;
            box-shadow: 5px 7px 16px #80808073;
            padding: 1rem;
        }
        .election_candidate{
            display: flex;
            flex-direction: column;
            width: 46rem;
            height: auto;
            margin: 4rem;
        }
        .candidates{
            display: flex;
            height: 2rem;
            border-radius: 1rem 0rem 0 1rem;
            margin: 3px;
        }
        .content2{
            text-align: center;
        }
        .record{
            display: flex;
            flex-direction: column;
            align-items: center;    
        }
        .rg_form{
            display: none;
            flex-direction: column;
            position: absolute;
            top: 13rem;
            height: 10rem;
            border-radius: 10px;
            left: 35rem;
            width: 35rem;
            align-items: center;
            background: #ff8b00;
        }
        .rg_form button{
            height: 31px;
            width: 7rem;
            border-radius: 6px;
            border: none;
            background: green;
            color: white;
            font-size: medium;
            cursor: pointer;
        }

        .candidates img{
            height: 2rem;
            width: 2rem;
            border-radius: 50%;
            object-fit: cover;
        }
        .error{
            display: none;
            flex-direction: column;
            position: fixed;
            top: 16rem;
            left: 39rem;
            background: red;
            color: wheat;
            width: 30rem;
            text-align: center;
            height: 5rem;
        }
        .error button{
            height: 2rem;
            width: 2rem;
            align-self: center;
        }
    </style>
    <script>  
        function openrgform(){
            document.getElementById("rg_form").style.display = "flex";
            document.getElementById("c_body").style.filter = "blur(2px)";
            
        }
        function error(){
            document.getElementById("error").style.display = "flex";
            document.getElementById("c_body").style.filter = "blur(2px)";
        }

        function error_close(){
            document.getElementById("error").style.display = "none";
            document.getElementById("c_body").style.filter = "";
        }
    </script>
</head>
<body>
    <div class="content1" id="c_body"> 
        <div class="card">
            <div class="title">
            <h1> 
            <?php
                $sql = "SELECT * FROM elections";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()){
                    if($row['e_id'] == $election_id){

                $ele_sql = "SELECT * FROM election_name_details";
                $ele_result = $conn->query($ele_sql);
                                
                while($ele_row = $ele_result->fetch_assoc()){
                    if($row['e_name_id'] == $ele_row['election_name_id']){
                        echo $ele_row['election_name'];
                            }
                    
                    }
                }
            }?>

            </h1>
            </div> 
            <div class="time">
            <h1>

            </h1>
            </div>
            <div class="sub-title">
            <?php 
            $sql = "SELECT * FROM elections";
            $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                    if($row['e_id'] == $election_id){
                        $sql2 = "SELECT * FROM courses";
                         $result2 = $conn->query($sql2);
                
                         while($row2 = $result2->fetch_assoc()){
                            if($row['course_id'] == $row2['course_id']){
                                echo $row2['course_name'];
                        }
                    }
                    }
                }
            ?><br>

            <?php 
            $sql = "SELECT * FROM elections";
            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()){
                                if($row['e_id'] == $election_id){
                                    $sql3 = "SELECT * FROM semester";
                                    $result3 = $conn->query($sql3);
                           
                                    while($row3 = $result3->fetch_assoc()){
                                       if($row['sem_id'] == $row3['sem_id']){
                                           echo "sem ",$row3['sem_no'];
                                   }
                               }
                                }
                            }?>
                            
            <br>
            <?php
            $sql = "SELECT * FROM elections";
            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()){
                                if($row['e_id'] == $election_id){
                                echo "(",$row['year'],")";
                                }
                            }
            ?>
            </div>
            <br>
            <?php
            if(isset($_SESSION['status'])){
                $sql = "SELECT * FROM elections";
                $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()){
                                if($row['e_id'] == $election_id){
                                    $c_time = strtotime(date('h:i:sa')) + strtotime(date("Y/m/d"));
                                    $e_s_time = strtotime($row['s_t_t']) + strtotime($row['s_t_d']);
                                    
                                    $diffrence = $c_time - $e_s_time;
                                
                                    if($diffrence >= 0){
                                        ?>
                                        <a href="votter.php?id=<?php echo $election_id?>">Vote ></a>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <a href="#" onclick="openrgform()">Register ></a>
                                        <?php
                                                            
                                    }
                                }
                            }
                                
            }else{
            ?>
            <a href="#" onclick="openform()">Login First ></a>
            <?php
            }
            ?>
        </div>
        <div class="election_candidate">
        <?php
            $sql = "SELECT * FROM elections";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){ 
                if($row['e_id'] == $election_id){

                    $sql_c = "SELECT * FROM e_c_data";
                    $result_c = $conn->query($sql_c);
                    while($row_c = $result_c->fetch_assoc()){ 
                        if($row_c['election_id'] == $row['e_id']){

                            $sql_s = "SELECT * FROM student_data";
                            $result_s = $conn->query($sql_s);
                            while($row_s = $result_s->fetch_assoc()){ 
                                if($row_s['student_id'] == $row_c['student_id']){

        ?>

        <div class="candidates" style="border:1px solid;width:30rem;">

            <div class="profile">
                <img src="images/profile.jpg">
            </div>
            <div class="name" style="margin: 0 1rem;">
                <?php echo $row_s['f_name'] ," ", $row_s['l_name']?>
            </div>

        </div>
        <?php
                                }
                                }
                        }
                        }
                }
            }
            ?>
        </div>
    </div>
    <div class="content2">
    <div class="title"><h2>Past Candidates</h2></div> 
    
        <?php
            $sql = "SELECT * FROM elections";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){ 
                if($row['e_id'] == $election_id){
                    
                    echo $row['year'];?>
                    <div class="record">
                    <?php
                    
                
                    $sql_c = "SELECT * FROM e_c_data";
                    $result_c = $conn->query($sql_c);
                    while($row_c = $result_c->fetch_assoc()){ 
                        if($row_c['election_id'] == $row['e_id']){

                            $sql_s = "SELECT * FROM student_data";
                            $result_s = $conn->query($sql_s);
                            while($row_s = $result_s->fetch_assoc()){ 
                                if($row_s['student_id'] == $row_c['student_id']){

        ?>

        <div class="candidates" style="border:1px solid;width:30rem;">

            <div class="profile">
                <img src="images/profile.jpg">
            </div>
            <div class="name" style="margin: 0 1rem;">
                <?php echo $row_s['f_name'] ," ", $row_s['l_name'];?>
            </div>

        </div>
        <?php
                                }
                                }
                        }
                        }
                        ?>
                    </div>
                        <?php
                }
            }
            
            ?>
        
    </div>
    
<form id="rg_form" class="rg_form" method="post">
    <button style="background: transparent;width:100%;color:black;">
    <i class="fa fa-times" aria-hidden="true" style="margin:0;width: 97%;text-align: end;cursor: pointer;"></i>
    </button>
        <h1>Are You Sure</h1>
        <button type="submit" name="candidate_form">Apply</button>
</form>
<div class="error" id="error">
    You already entered in election
    <button type="submit" id="err_btn" onclick="error_close()">OK</button>
</div>
<?php
    if(isset($_POST['candidate_form'])){
        $s_id = $_SESSION['status'];
        $count = 0;

        $sql = "SELECT * FROM e_c_data";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            if($row['election_id'] == $election_id){
                if($row['student_id'] == $s_id){
                    $count = $count+1;
                    
                }

            }
        
        }
        if($count == 0){
        $sql="INSERT INTO `e_c_data`(`election_id`, `student_id`) VALUES ('$election_id','$s_id')";
        $result = $conn->query($sql);
        header('location:election_info.php');   
        }
        else{
            ?>
            <script>
                error();
            </script>
            <?php
        }

    }
?>
</body>
</html>