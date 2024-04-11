<?php
    include 'connection.php';
    session_start();
    $_SESSION['status']; 
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
        .st_form{
            font-family: "Poppins", sans-serif;
        }
        .navbar{
            display: grid;
            background: white;
            grid-auto-flow: column;
            width: 100%;
            box-shadow: -1px 7px 13px -4px #afadadb5;
            align-items: center;
            height: 4rem;
        }
        .disable{
            font-weight: 300;
            font-size: larger;

        }
        .content{
            display: flex;
        }
        .section1{
            display: flex;
            flex-direction: column;
            align-items: center;
            background: white;
            margin: 1rem 0;
            width: 15rem;
            height: auto;
            box-shadow: -5px 5px 12px 0px #8080805e;
        }
        .section2{
            background: white;
            margin: 1rem 2rem;
            width: 100%;
            height: auto;
            box-shadow: -5px 5px 12px 0px #8080805e;
        }
        .div{
            margin: 11px 0px;
        }
        .header{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }
        .header i{
            margin: 0 1rem;
            color: gray;
            font-size: larger;
        }
        table{
            border: 1px solid;
            border-collapse: collapse;
            width: 100%;
        }
        td{
            border: 1px solid;
            text-align: center;
        } 
        form{
            display: none;
            position: absolute;
            flex-direction: column;
            left: 44rem;
            top: 11rem;
            width: 15rem;
            border-radius: 1rem;
            background: white;
            padding: 0 4rem;
            box-shadow: 5px 7px 20px 4px #80808078;
        }      
        input{
            margin: 7px;
            text-align: center;
            width: 13rem;
            height: 23px;
            border-radius: 4px;
            border: 1px solid;
        }
        select{
            width: 9rem;
            height: 27px;
            margin: 0 11px;
            border-radius: 5px;
            border: 1px solid;
            text-align: center;
        }
        .st_form button,.ele_updt_form button{
            width: 6rem;
            align-self: center;
            margin: 1rem;
            cursor: pointer;
            height: 30px;
            background: #1b1bc4bd;
            color: white;
            border: none;
            border-radius: 7px;
        }
    </style>
    <script>
        function st_form(){
            document.getElementById("st_form").style.display = "flex";
            document.getElementById("body").style.filter = "blur(1px)";
        }
        function st_form_close(){
            document.getElementById("st_form").style.display = "none";
            document.getElementById("body").style.filter = "";
        }
        function ele_updt_form(){
            document.getElementById("ele_updt_form").style.display = "flex";
            document.getElementById("body").style.filter = "blur(2px)";
        }
        function ele_updt_form_close(){
            document.getElementById("ele_updt_form").style.display = "none";
            document.getElementById("body").style.filter = "";
        }
    </script>
</head>
<body >


    <div class="navbar">
        <div class="disable">
            &nbsp;&nbsp;&nbsp;
            <a href="home.php?course=0&sem=0">LOGO</a> 
        </div>
    </div>

    <div class="content" id="body">
    <div class="section1">  
        <div class="div">
            <a href="admin.php?id=1" >student detail</a> 
        </div>
        <div class="div">
            <a href="admin.php?id=2">election data</a> 
        </div>
        <div class="div">
            <a href="admin.php?id=3">candidate details</a> 
        </div>
        <div class="div">
            <a href="admin.php?id=4">courses</a> 
        </div>
        <div class="div">
            <a href="admin.php?id=5">election catagory</a> 
        </div>

    </div>
    <div class="section2">

        <?php
        $var = $_GET['id'];
        ?>

    <table>
        <?php 
        if($var == 1){
        ?>
        <div class="header">
            <div class="add">
            <button style="background:transparent;border:none;cursor:pointer" onclick="st_form()"><i class="fa fa-plus"></i></button>
            </div>
        </div>
        
    <tr>
           <td>
            sr.no
           </td>
           <td>
            first name
           </td>
           <td>
            Last name
           </td>
           <td>
            course
           </td>
           <td>
            sem
           </td>
           <td>
            Enrollment NO
           </td>
           <td>
            Password
           </td>
           <td>
            Phone no
           </td>
           <td>
            Status
           </td>
           <td>
            
           </td>
    </tr>
        <?php
         $sql = "SELECT * FROM student_data";
         $result = $conn->query($sql);

         while($row = $result->fetch_assoc()){
        ?>
    <tr>
           <td>
            <?php echo $row['student_id'] ?>
           </td>
           <td>
           <?php echo $row['f_name'] ?>
           </td>
           <td>
           <?php echo $row['l_name'] ?>
           </td>
           <td>
                <?php
                         $sql2 = "SELECT * FROM courses";
                         $result2 = $conn->query($sql2);
                
                         while($row2 = $result2->fetch_assoc()){
                            if($row['course_id'] == $row2['course_id']){
                                echo $row2['course_name'];
                        }
                    }
                ?>
            </td>
            <td>
            <?php
                         $sql3 = "SELECT * FROM semester";
                         $result3 = $conn->query($sql3);
                
                         while($row3 = $result3->fetch_assoc()){
                            if($row['sem_id'] == $row3['sem_id']){
                                echo $row3['sem_no'];
                        }
                    }
                ?>
            </td>
           <td>
           <?php echo $row['enrollment_no'] ?>
           </td>
           <td>
           <?php echo $row['password'] ?>
           </td>
           <td>
           <?php echo $row['phone_no'] ?>
           </td>
           <td>
           <?php echo $row['status'] ?>
           </td>
           <td>
            <button style="background-color: red; border:none;cursor:pointer;font-size: 19px;">
            <a href="st_delete.php?s_id=<?php echo $row['student_id']?>" style="text-decoration:none; color:white;">
            <i class="fa fa-trash" aria-hidden="true"></i></a></button>
            
            <button style="background-color: blue; border:none;cursor:pointer;font-size: 19px;">
            <a href="st_update.php" style="text-decoration:none; color:white;">
            <i class="fa fa-refresh" aria-hidden="true"></i></a></button>
           </td>
    </tr>


        <?php
         }
         }
        ?>
        <?php
            if($var == 2){
        ?>
        <div class="header">
            <div class="add">
            <a style="text-decoration:none;color:gray;cursor:pointer;" onclick="ele_updt_form()"><i class="fa fa-plus"></i></a>
            </div>
        </div>
        <tr>
            <td>
                sr no
            </td>
            <td>
                election name
            </td>
            <td>
                year
            </td>
            <td>
                start date
            </td>
            <td>
                end date
            </td>
            <td>
                start time
            </td>
            <td>
                end time
            </td>
            <td>
                course
            </td>
            <td>
                sem
            </td>
            <td>
                
            </td>
            
        </tr>
        <?php
         $sql = "SELECT * FROM elections";
         $result = $conn->query($sql);

         while($row = $result->fetch_assoc()){
        ?>
        <tr>
            <td>
                <?php echo $row['e_id']?>
            </td>
            <td>
            <?php
             $ele_sql = "SELECT * FROM election_name_details";
             $ele_result = $conn->query($ele_sql);
                            
            while($ele_row = $ele_result->fetch_assoc()){
                if($row['e_name_id'] == $ele_row['election_name_id']){
                    echo $ele_row['election_name'];
                }
           
           }?>
            </td>
            <td>
                <?php echo $row['year']?>
            </td>
            <td>
                <?php echo $row['s_t_d']?>
            </td>
            <td>
                <?php echo $row['e_t_d']?>
            </td>
            <td>
                <?php echo $row['s_t_t']?>
            </td>
            <td>
                <?php echo $row['e_t_t']?>
            </td>
            <td>
                <?php
                         $sql2 = "SELECT * FROM courses";
                         $result2 = $conn->query($sql2);
                
                         while($row2 = $result2->fetch_assoc()){
                            if($row['course_id'] == $row2['course_id']){
                                echo $row2['course_name'];
                        }
                    }
                ?>
            </td>
            <td>
            <?php
                         $sql3 = "SELECT * FROM semester";
                         $result3 = $conn->query($sql3);
                
                         while($row3 = $result3->fetch_assoc()){
                            if($row['sem_id'] == $row3['sem_id']){
                                echo $row3['sem_no'];
                        }
                    }
                ?>
            </td>
            <td>
            <button style="background-color: red; border:none;cursor:pointer;font-size: 19px;"><a href="ele_delete.php?e_id=<?php echo $row['e_id']?>" style="text-decoration:none; color:white;"><i class="fa fa-trash" aria-hidden="true"></i></a></button>
            <button style="background-color: blue; border:none;cursor:pointer;font-size: 19px;"><a href="ele_update.php?e_id=<?php echo $row['e_id']?>" style="text-decoration:none; color:white;"><i class="fa fa-refresh" aria-hidden="true"></i></a></button>
            </td>

        <?php
         }
            }
        ?>
                <?php
            if($var == 3){
        ?>
        <div class="header">
            <div class="add">
            <a href="#" style="text-decoration:none;color:gray;cursor:pointer;"><i class="fa fa-plus"></i></a>
            </div>
        </div>
        <?php 
         $sql = "SELECT * FROM elections";
         $result = $conn->query($sql);
                                    
        while($row = $result->fetch_assoc()){
            ?>
            <tr>
                <td style="height:3rem; border:none;">

                </td>
            </tr>
            <tr style="border:3px solid">
            <td  colspan="2"><?php echo $row['year']?>

                    <?php
                    $ele_sql = "SELECT * FROM election_name_details";
                    $ele_result = $conn->query($ele_sql);
                                               
                    while($ele_row = $ele_result->fetch_assoc()){
                    
                    if($row['e_name_id'] == $ele_row['election_name_id']){
                        echo "(",$ele_row['election_name'],")";
                    }
                    }
                    ?>
            </td>
                
            </tr>
            <tr style="border:3px solid">
                <td>
                    Student name
                </td>
                <td>
                    Enrollment_no
                </td>
                <td>

                </td>
            </tr>

        <?php
            $cand_sql = "SELECT * FROM e_c_data";
            $cand_result = $conn->query($cand_sql);
                                       
           while($cand_row = $cand_result->fetch_assoc()){
            if($row['e_id'] == $cand_row['election_id']){

                $std_sql = "SELECT * FROM student_data";
                $std_result = $conn->query($std_sql);
                                           
               while($std_row = $std_result->fetch_assoc()){
                if($cand_row["student_id"] == $std_row["student_id"]){
                    ?>
                    <tr>
                        <td>
                            <?php echo $std_row["f_name"]," ", $std_row["l_name"];?>
                        </td>
                        <td>
                            <?php echo $std_row["enrollment_no"]?>
                        </td>
                        <td>
                        <button style="background-color: red; border:none;cursor:pointer;font-size: 19px;"><a href="cand_delete.php?cand_id=<?php echo $cand_row['e_c_id']?>" style="text-decoration:none; color:white;"><i class="fa fa-trash" aria-hidden="true"></i></a></button>
                        <button style="background-color: blue; border:none;cursor:pointer;font-size: 19px;"><a href="ele_update.php?cand_id=<?php echo $cand_row['e_c_id']?>" style="text-decoration:none; color:white;"><i class="fa fa-refresh" aria-hidden="true"></i></a></button>
                        </td>
                    </tr>
                    
                    <?php
               }
            }
           }
            }
    
            }
        }
        if($var == 4){
            ?>
            <div class="header">
                <div class="add">
                <a href="#" style="text-decoration:none;color:gray;cursor:pointer;"><i class="fa fa-plus"></i></a>
                </div>
            </div>
            <tr>
                <td>course_id</td>
                <td>course_name</td>
                <td>Total sem</td>
                <td> </td>
            </tr>
        <?php
            $course_sql = "SELECT * FROM courses";
            $course_result = $conn->query($course_sql);
                                               
            while($course_row = $course_result->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $course_row['course_id']?></td>
                <td><?php echo $course_row['course_name']?></td>
                <td><?php echo $course_row['total_sem']?></td>
                <td>
                    <button style="background-color: red; border:none;cursor:pointer;font-size: 19px;"><a href="cand_delete.php?cand_id=<?php echo $course_row['course_id']?>" style="text-decoration:none; color:white;"><i class="fa fa-trash" aria-hidden="true"></i></a></button>
                    <button style="background-color: blue; border:none;cursor:pointer;font-size: 19px;"><a href="ele_update.php?cand_id=<?php echo $course_row['course_id']?>" style="text-decoration:none; color:white;"><i class="fa fa-refresh" aria-hidden="true"></i></a></button>
                </td>
            </tr>
            
            <?php
            }
        }
        if($var == 5){
            ?>
            <div class="header">
                <div class="add">
                <a href="#" style="text-decoration:none;color:gray;cursor:pointer;"><i class="fa fa-plus"></i></a>
                </div>
            </div>
            <tr>
                <td>election catagory id</td>
                <td>election catagory</td>
                <td> </td>
            </tr>

        <?php
            $e_cat_sql = "SELECT * FROM election_name_details";
            $e_cat_result = $conn->query($e_cat_sql);
                                               
            while($e_cat_row = $e_cat_result->fetch_assoc()){
            ?>
                <tr>
                    <td><?php echo $e_cat_row['election_name_id']?></td>
                    <td><?php echo $e_cat_row['election_name']?></td>
                    <td>
                    <button style="background-color: red; border:none;cursor:pointer;font-size: 19px;"><a href="cand_delete.php?cand_id=<?php echo $e_cat_row['election_name_id']?>" style="text-decoration:none; color:white;"><i class="fa fa-trash" aria-hidden="true"></i></a></button>
                    <button style="background-color: blue; border:none;cursor:pointer;font-size: 19px;"><a href="ele_update.php?cand_id=<?php echo $e_cat_row['election_name_id']?>" style="text-decoration:none; color:white;"><i class="fa fa-refresh" aria-hidden="true"></i></a></button>
                </td>
                </tr>
            <?php
            }
        }
        ?>
        </table>
    </div>
    </div>
        <!-- student form !-->

    <form id="st_form" class="st_form" method="post">
            <button style="background:transparent;color:black;cursor:pointer;" onclick="st_form_close()">
            <i class="fa fa-times" aria-hidden="true"></i>
            </button>
            <h3 style="text-align:center;margin:0;">Student form</h3>
            <input type="text" placeholder="first name" name="f_name">
            <input type="text" placeholder="last name" name="l_name">
            <input type="text" placeholder="Enrollment_no" name="e_no">

            <select style="margin:3px 11px;" name="st_course">
            <?php
            $sql = "SELECT * FROM courses";
            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()){
            ?>
            <option value="<?php echo $row['course_id']?>"><?php echo $row['course_name']?></option>
            <?php
        }
            ?>
            </select>

            <select style="margin:3px 11px;" name="st_sem">
            <?php $sql = "SELECT * FROM semester";
            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()){
                ?>
            <option value="<?php echo $row['sem_id']?>">sem <?php echo $row['sem_no']?></option>
            <?php
        }
            ?>
            </select>

            <input type="password" placeholder="Password" name="password">
            <input type="text" placeholder="Phone No" name="phone_no">

            <button type="submit" name="st_submit">submit</button>
    </form>

        <!-- election form !-->

    <form id="ele_updt_form" class="ele_updt_form" method="post">
        <button style="background:transparent;color:black;cursor:pointer;" onclick="ele_updt_form_close()">
        <i class="fa fa-times" aria-hidden="true" style="margin:0;width: 210%;text-align: end;"></i>
        </button>
        <h3 style="text-align: center;padding:0;margin:0;">Elections</h3>
        election catagory:
        <select name="ele_name">
            <?php
        $sql = "SELECT * FROM election_name_details";
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()){
            ?>

            <option value="<?php echo $row['election_name_id']?>"><?php echo $row['election_name']?></option>

            <?php
        }
            ?>
        </select>

        starting date:<input type="date" name="strt_date">
        ending date:<input type="date" name="end_date">

        course
        <select name="course_id">
        <?php
        $sql = "SELECT * FROM courses";
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()){
            ?>
            <option value="<?php echo $row['course_id']?>"><?php echo $row['course_name']?></option>
            <?php
        }
            ?>
        </select>
        year:<input type="text" name="year">
        sem:<select name="sem_id">
        <?php

        $sql = "SELECT * FROM semester";
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()){
            ?>
            <option value="<?php echo $row['sem_id']?>">sem <?php echo $row['sem_no']?></option>
            <?php
        }
            ?>
        </select>

        <button type="submit" name="ele_submit">submit</button>
    </form>
    <?php
    if(isset($_POST['ele_submit'])){

        $ele_name = $_POST['ele_name'];
        $strt_date = $_POST['strt_date'];
        $end_date = $_POST['end_date'];
        $course = $_POST['course_id'];
        $e_year = $_POST['year'];
        $sem = $_POST['sem_id'];

        $sql = "INSERT INTO elections(e_name_id,s_t_d,e_t_d,course_id,year,sem_id) VALUES ('$ele_name' , '$strt_date' , '$end_date' , '$course' , '$e_year' , '$sem')";
        $result = $conn->query($sql);
    }
    if(isset($_POST['st_submit'])){

        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $e_no = $_POST['e_no'];
        $st_course = $_POST['st_course'];
        $st_sem = $_POST['st_sem'];
        $password = $_POST['password'];
        $phone_no = $_POST['phone_no'];


        $sql = "INSERT INTO student_data(`f_name`, `l_name`, `enrollment_no`, `course_id`, `sem_id`, `password`, `phone_no`) VALUES ('$f_name' , '$l_name' , '$e_no' , '$st_course' , '$st_sem' , '$password', '$phone_no')";
        $result = $conn->query($sql);
    }
    ?>
</body>
</html>