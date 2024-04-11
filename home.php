<?php
    include 'connection.php';
    include 'navbar.php';
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background: #80808021;
            height: 100%;
        }
        .content{
            display: flex;
            flex-direction: row;
        }
        .section1{
            background: white;
            width: 14rem;
            margin: 3rem 1rem;
            box-shadow: -1px 12px 16px -3px #afadadb5;
            height: auto;
            text-align: center;
        }
        .catagory{
            font-weight: 300;
            text-align: center;
        }
        .sub-catagory{
            display: none;
            font-weight: 200;
            text-align: center;
        }

        .section2{
            background: white;
            margin: 3rem 2rem;
            box-shadow: -1px 12px 16px -3px #afadadb5;
            height: auto;
            text-align: center;
            width: 100%;
            border-radius: 1rem;
        }
        .card-content{
            display: flex;
        }
        .card{
            background: #f6f6f6;
            width: 15rem;
            height: 17rem;
            margin: 1rem;
            border-radius: 10px;
            box-shadow: 0px 5px 8px 0px gray;
        }
        .title{
            display: flex;
            align-items: end;
            justify-content: center;
            overflow: hidden;
            font-size: 25px;
            height: 7rem;
        }
        .time{
            font-size: 2rem;
            height: 3rem;
        }
        .selector{
            display: flex;
        }
        .selector ul{
            display: flex;
            align-items: center;
            justify-content: center;
            list-style: none;
        }
        .selector li{
            margin: 0 1rem;
        }
        <?php
             $sql = "SELECT * FROM courses";
             $result = $conn->query($sql);

             while($row = $result->fetch_assoc()){
                
        ?>
        .s-c<?php echo $row["course_id"]?>{
            font-size: 0px;
            transition: 0.5s;
        }
        .catagory<?php echo $row["course_id"]?>{
            margin: 1rem;
        }
        .catagory<?php echo $row["course_id"]?>:hover .s-c<?php echo $row["course_id"]?>{
            font-size: 18px;
            transition: 0.5s;
        }
        <?php
    }
    ?>
    </style>

</head>
<body>
    <div class="content">
<div class="section1">
<?php
             $sql = "SELECT * FROM courses";
             $result = $conn->query($sql);

             while($row = $result->fetch_assoc()){
                
        ?>

        <div class="catagory<?php echo $row['course_id']?>">
        <span style="font-weight:400;;font-size:20px;">
        <a href="home.php?course=<?php echo $row['course_id']?>&sem=0">
        <?php echo $row['course_name']?>
        </a>
        </span>
        
            <button style="background: transparent; border:none; cursor:pointer;">></button>
        <div class="s-c<?php echo $row['course_id']?>">
           <?php
             $sql2 = "SELECT * FROM semester";
             $result2 = $conn->query($sql2);
             while($row2 = $result2->fetch_assoc()){ 
                if($row['total_sem'] >= $row2['sem_id']){
                ?>
            <div class="sub-catagory<?php echo $row2['sem_id'];?>"> 
                <span style="font-weight:300;">
                <a href="home.php?course=<?php echo $row['course_id']?>&sem=<?php echo $row2['sem_id']?>">
                Sem <?php echo $row2['sem_no'];?>
                </a>
                </span>
            </div>
<?php
                }
             }
             
?>
        </div>
        </div>
        <?php
             }
        ?>

    </div>

    <div class="section2">
        <div class="selector">
            <ul>
                <li>All</li>
                <li>Ongoing</li>
                <li>Upcoming</li>
            </ul>
        </div>
        <div class="card-content">
        <?php
           $course_id = $_GET['course'];
           $sem_id = $_GET['sem'];
           $sql3 = "SELECT * FROM elections";
           $result3 = $conn->query($sql3);
           while($row3 = $result3->fetch_assoc()){

            $date1 = strtotime($row3['e_t_d']);
            $date2 = strtotime(date('y-m-d'));
            $diffrence = $date2 - $date1;

            if($course_id == 0){
                if($diffrence <= 0){
                    
        ?>
        <div class="card">
            <div class="title">
            <?php
             $ele_sql = "SELECT * FROM election_name_details";
             $ele_result = $conn->query($ele_sql);
                            
            while($ele_row = $ele_result->fetch_assoc()){
                if($row3['e_name_id'] == $ele_row['election_name_id']){
                    echo $ele_row['election_name'];
                }
           
           }?>
            
            </div> 
            <div class="sub-title">
            <?php
                         $c_sql = "SELECT * FROM courses";
                         $c_result = $conn->query($c_sql);
                
                         while($c_row = $c_result->fetch_assoc()){
                            if($row3['course_id'] == $c_row['course_id']){
                                echo $c_row['course_name'];
                        }
                    }
                ?>
                <br>sem
                            <?php
                         $sem_sql = "SELECT * FROM semester";
                         $sem_result = $conn->query($sem_sql);
                
                         while($sem_row = $sem_result->fetch_assoc()){
                            if($row3['sem_id'] == $sem_row['sem_id']){
                                echo $sem_row['sem_no'];
                        }
                    }
                ?>
                <br>
                (<?php echo $row3['year']?>)
            </div>

            <div class="button" style="margin:2rem;">
                <a href="election_info.php?id=<?php echo $row3["e_id"]?>&e_cat=<?php echo $row3["e_name_id"]?>">view more ></a>
            </div>  
        </div>
        <?php
                }
            }
            if($course_id !=0 && $row3['course_id'] == $course_id){

                $date1 = strtotime($row3['e_t_d']);
                $date2 = strtotime(date('y-m-d'));
                $diffrence = $date1 - $date2;

                if($sem_id == 0){
                    if($diffrence >= 0){
            ?>,
            
            <div class="card">
            <div class="title">
            <?php
             $ele_sql = "SELECT * FROM election_name_details";
             $ele_result = $conn->query($ele_sql);
                            
            while($ele_row = $ele_result->fetch_assoc()){
                if($row3['e_name_id'] == $ele_row['election_name_id']){
                    echo $ele_row['election_name'];
                }
           
           }?>
            </div> 
            <div class="sub-title">
            <?php
                         $c_sql = "SELECT * FROM courses";
                         $c_result = $conn->query($c_sql);
                
                         while($c_row = $c_result->fetch_assoc()){
                            if($row3['course_id'] == $c_row['course_id']){
                                echo $c_row['course_name'];
                        }
                    }
                ?>
                <br>sem
                            <?php
                         $sem_sql = "SELECT * FROM semester";
                         $sem_result = $conn->query($sem_sql);
                
                         while($sem_row = $sem_result->fetch_assoc()){
                            if($row3['sem_id'] == $sem_row['sem_id']){
                                echo $sem_row['sem_no'];
                        }
                    }
                ?>
                <br>
                (<?php echo $row3['year']?>)
            </div>
            <div class="button" style="margin:2rem;">
                <a href="election_info.php?id=<?php echo $row3["e_id"]?>&e_cat=<?php echo $row3["e_name_id"]?>">view more ></a>
            </div>  
        </div>
        <?php
                }
                }
                if($sem_id != 0 && $row3['sem_id'] == $sem_id){
                    $date1 = strtotime($row3['e_t_d']);
                    $date2 = strtotime(date('y-m-d'));
                    $diffrence = $date1 - $date2;
                    if($diffrence >= 0){
                    ?>

            <div class="card">
            <div class="title"><?php
             $ele_sql = "SELECT * FROM election_name_details";
             $ele_result = $conn->query($ele_sql);
                            
            while($ele_row = $ele_result->fetch_assoc()){
                if($row3['e_name_id'] == $ele_row['election_name_id']){
                    echo $ele_row['election_name'];
                }
           
           }?></div> 
            <div class="sub-title">
            <?php
                         $c_sql = "SELECT * FROM courses";
                         $c_result = $conn->query($c_sql);
                
                         while($c_row = $c_result->fetch_assoc()){
                            if($row3['course_id'] == $c_row['course_id']){
                                echo $c_row['course_name'];
                        }
                    }
                ?>
                <br>sem
                            <?php
                         $sem_sql = "SELECT * FROM semester";
                         $sem_result = $conn->query($sem_sql);
                
                         while($sem_row = $sem_result->fetch_assoc()){
                            if($row3['sem_id'] == $sem_row['sem_id']){
                                echo $sem_row['sem_no'];
                        }
                    }
                ?>
                <br>
                (<?php echo $row3['year']?>)
            </div>

            <div class="button" style="margin:2rem;">
                <a href="election_info.php?id=<?php echo $row3["e_id"]?>&e_cat=<?php echo $row3["e_name_id"]?>">view more ></a>
            </div>  
        </div>
                    <?php
                }
            }
            }
           }
        ?>
    </div>
    </div>
            </div>
</body>
</html>