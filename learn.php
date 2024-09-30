<?php
 include 'dbConnect.php';
 session_start();
 if(!isset($_SESSION['sessionRegNumber'])){
    header("Location: signin.php");
}else{

    $reg = $_SESSION['sessionRegNumber'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-dark-subtle">
<nav class="navbar navbar-expand p-4 bg-light-subtle">
        <h2 class="fw-bolder">Learn AI</h2>


      </nav>
      <a href="dashboard.php" class="bi bi-arrow-left-circle fs-1 m-3 text-dark"></a>
    <br>
    <?php 
    if(isset($_GET['1'])){
        $week = "Week 1";
        $q1 = $db_connect->query("SELECT course_id, week_label, course_caption, course_material FROM course WHERE week_label = '$week';");
        if($q1->num_rows > 0){
            while($row = $q1->fetch_assoc()){
                $id = $row['course_id'];   
                $week_label = $row['week_label'];
                $caption = $row['course_caption'];
                $course = $row['course_material'];
                ?>
                <center>

                    <table class="table table-responsive p-0 table-hover table-bordered w-75">
                        <thead>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        
                            <tbody>
                                
                                <td>
                     <?php
                     $file_ext = pathinfo($course, PATHINFO_EXTENSION);
                     if (in_array($file_ext, ['mp4', 'mov', 'avi', 'webm', 'mkv'])) {
                         echo "
                         <a href='tutorials/$course' target='_blank'>
                             <img src='images/v_icon.jpeg' width='130px' alt='Video Document'>
                         </a>
                         ";
                     } else if ($file_ext == 'pdf') {
                         echo "
                         <a href='tutorials/$course' target='_blank'>
                             <img src='images/pdf.png' width='130px' alt='PDF Document'>
                         </a>
                         ";
                     }
                    
                    ?>
                                </td>
                                <td class="text-center">
                                    <br>
                                                                        
                                    <?php
                                echo $caption; 
                                    ?>
                                    

                                </td>
                                <td class="text-center">  
                                    <br>
                                    <a href="#" class="bi bi-star fs-3" id='star1' onclick="star1()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star2' onclick="star2()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star3' onclick="star3()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star4' onclick="star4()"></a> 
                                </td>
                                
                                <td>
                                    <br>
                                    
                                    <a href="#" class="bi bi-hand-thumbs-up fs-3 text-dark" id='like' onclick="hide()"></a>
                                    
                                </td>
                                
                            </tbody>
                        </thead>
                        
                    </table>
                </center>

                <?php
            }

        }else{
           ?>
           <center>

               <div class='lead alert alert-warning w-75 p-5 offset-0 text-center'>Opps! We have no tutorials yet for <?php echo $week ?>. Please kindly check back later.
               
            </div>
        </center>
           <?php 
        }
        
       }elseif(isset($_GET['2'])){
        $week = "Week 2";
        $q1 = $db_connect->query("SELECT course_id, week_label, course_caption, course_material FROM course WHERE week_label = '$week';");
        if($q1->num_rows > 0){
            while($row = $q1->fetch_assoc()){
                $id = $row['course_id'];   
                $week_label = $row['week_label'];
                $caption = $row['course_caption'];
                $course = $row['course_material'];
                ?>
                <center>

                    <table class="table table-responsive p-0 table-hover table-bordered w-75">
                        <thead>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            
                            <tbody>
                                
                                <td>
                    <?php
                    $file_ext = pathinfo($course, PATHINFO_EXTENSION);
                    if (in_array($file_ext, ['mp4', 'mov', 'avi', 'webm', 'mkv'])) {
                        echo "
                        <a href='tutorials/$course' target='_blank'>
                            <img src='images/v_icon.jpeg' width='130px' alt='Video Document'>
                        </a>
                        ";
                    } else if ($file_ext == 'pdf') {
                        echo "
                        <a href='tutorials/$course' target='_blank'>
                            <img src='images/pdf.png' width='130px' alt='PDF Document'>
                        </a>
                        ";
                    }
                    ?>
                                </td>
                                <td class="text-center">
                                    <br>
                                                                        
                                    <?php
                                echo $caption; 
                                    ?>
                                    

                                </td>
                                <td class="text-center">  
                                    <br>
                                    <a href="#" class="bi bi-star fs-3" id='star1' onclick="star1()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star2' onclick="star2()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star3' onclick="star3()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star4' onclick="star4()"></a> 
                                </td>
                                
                                <td>
                                    <br>
                                   
                                    <a href="#" class="bi bi-hand-thumbs-up fs-3 text-dark" id='like' onclick="hide()"></a>
                                </td>
                                
                            </tbody>
                        </thead>
                        
                    </table>
                </center>

                <?php
            }

        }else{
           ?>
           <center>

               <div class='lead alert alert-warning w-75 p-5 offset-0 text-center'>Opps! We have no tutorials yet for <?php echo $week ?>. Please kindly check back later.
               
            </div>
        </center>
           <?php 
        }
        
    }elseif(isset($_GET['3'])){
        $week = "Week 3";
        $q1 = $db_connect->query("SELECT course_id, week_label, course_caption, course_material FROM course WHERE week_label = '$week';");
        if($q1->num_rows > 0){
            while($row = $q1->fetch_assoc()){
                $id = $row['course_id'];   
                $week_label = $row['week_label'];
                $caption = $row['course_caption'];
                $course = $row['course_material'];
                ?>
                <center>

                    <table class="table table-responsive p-0 table-hover table-bordered w-75">
                        <thead>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            
                            <tbody>
                                
                                <td>
                    <?php
                    $file_ext = pathinfo($course, PATHINFO_EXTENSION);
                    if (in_array($file_ext, ['mp4', 'mov', 'avi', 'webm', 'mkv'])) {
                        echo "
                        <a href='tutorials/$course' target='_blank'>
                            <img src='images/v_icon.jpeg' width='130px' alt='Video Document'>
                        </a>
                        ";
                    } else if ($file_ext == 'pdf') {
                        echo "
                        <a href='tutorials/$course' target='_blank'>
                            <img src='images/pdf.png' width='130px' alt='PDF Document'>
                        </a>
                        ";
                    }
                    ?>
                                </td>
                                <td class="text-center">
                                    <br>
                                                                        
                                    <?php
                                echo $caption; 
                                    ?>
                                    

                                </td>
                                <td class="text-center">  
                                    <br>
                                    <a href="#" class="bi bi-star fs-3" id='star1' onclick="star1()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star2' onclick="star2()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star3' onclick="star3()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star4' onclick="star4()"></a> 
                                </td>

                                <td>
                                    <br>
                                    
                                    <a href="#" class="bi bi-hand-thumbs-up fs-3 text-dark" id='like' onclick="hide()"></a>
                                </td>
                                
                            </tbody>
                        </thead>
                        
                    </table>
                </center>

                <?php
            }

        }else{
           ?>
           <center>

               <div class='lead alert alert-warning w-75 p-5 offset-0 text-center'>Opps! We have no tutorials yet for <?php echo $week ?>. Please kindly check back later.
               
            </div>
        </center>
           <?php 
        }
        
    }elseif(isset($_GET['4'])){
        $week = "Week 4";
        $q1 = $db_connect->query("SELECT course_id, week_label, course_caption, course_material FROM course WHERE week_label = '$week';");
        if($q1->num_rows > 0){
            while($row = $q1->fetch_assoc()){
                $id = $row['course_id'];   
                $week_label = $row['week_label'];
                $caption = $row['course_caption'];
                $course = $row['course_material'];
                ?>
                <center>

                    <table class="table table-responsive p-0 table-hover table-bordered w-75">
                        <thead>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                    
                            <tbody>
                                
                                <td>
                        <?php
                        $file_ext = pathinfo($course, PATHINFO_EXTENSION);
                        if(in_array($file_ext, ['mp4', 'mov', 'avi', 'webm', 'mkv'])) {
                            echo "
                            <a href='tutorials/$course' target='_blank'>
                                <img src='images/v_icon.jpeg' width='130px' alt='Video Document'>
                            </a>
                            ";
                        } else if ($file_ext == 'pdf') {
                            echo "
                            <a href='tutorials/$course' target='_blank'>
                                <img src='images/pdf.png' width='130px' alt='PDF Document'>
                            </a>
                            ";
                        }

                                     ?>
                                </td>
                                <td class="text-center">
                                    <br>
                                                                        
                                    <?php
                                echo $caption; 
                                    ?>
                                    

                                </td>
                                <td class="text-center">  
                                    <br>
                                    <a href="#" class="bi bi-star fs-3" id='star1' onclick="star1()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star2' onclick="star2()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star3' onclick="star3()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star4' onclick="star4()"></a> 
                                </td>
                                
                                <td>
                                    <br>
                                    
                                    <a href="#" class="bi bi-hand-thumbs-up fs-3 text-dark" id='like' onclick="hide()"></a>
                                </td>
                                
                            </tbody>
                        </thead>
                        
                    </table>
                </center>

                <?php
            }

        }else{
           ?>
           <center>

               <div class='lead alert alert-warning w-75 p-5 offset-0 text-center'>Opps! We have no tutorials yet for <?php echo $week ?>. Please kindly check back later.
               
            </div>
        </center>
           <?php 
        }
        
    }elseif(isset($_GET['5'])){
        $week = "Week 5";
        $q1 = $db_connect->query("SELECT course_id, week_label, course_caption, course_material FROM course WHERE week_label = '$week';");
        if($q1->num_rows > 0){
            while($row = $q1->fetch_assoc()){
                $id = $row['course_id'];   
                $week_label = $row['week_label'];
                $caption = $row['course_caption'];
                $course = $row['course_material'];
                ?>
                <center>

                    <table class="table table-responsive p-0 table-hover table-bordered w-75">
                        <thead>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                    
                            <tbody>
                                
                                <td>
                     <?php
                    $file_ext = pathinfo($course, PATHINFO_EXTENSION);
                    if (in_array($file_ext, ['mp4', 'mov', 'avi', 'webm', 'mkv'])) {
                        echo "
                        <a href='tutorials/$course' target='_blank'>
                            <img src='images/v_icon.jpeg' width='130px' alt='Video Document'>
                        </a>
                        ";
                    } else if ($file_ext == 'pdf') {
                        echo "
                        <a href='tutorials/$course' target='_blank'>
                            <img src='images/pdf.png' width='130px' alt='PDF Document'>
                        </a>
                        ";
                    }
                    ?>
                                </td>
                                <td class="text-center">
                                    <br>
                                                                        
                                    <?php
                                echo $caption; 
                                    ?>
                                    

                                </td>
                                <td class="text-center">  
                                    <br>
                                    <a href="#" class="bi bi-star fs-3" id='star1' onclick="star1()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star2' onclick="star2()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star3' onclick="star3()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star4' onclick="star4()"></a> 
                                </td>
                                
                                <td>
                                    <br>
                                    
                                    <a href="#" class="bi bi-hand-thumbs-up fs-3 text-dark" id='like' onclick="hide()"></a>
                                </td>
                                
                            </tbody>
                        </thead>
                        
                    </table>
                </center>

                <?php
            }

        }else{
           ?>
           <center>

               <div class='lead alert alert-warning w-75 p-5 offset-0 text-center'>Opps! We have no tutorials yet for <?php echo $week ?>. Please kindly check back later.
               
            </div>
        </center>
           <?php 
        }
        
    }elseif(isset($_GET['6'])){
        $week = "Week 6";
        $q1 = $db_connect->query("SELECT course_id, week_label, course_caption, course_material FROM course WHERE week_label = '$week';");
        if($q1->num_rows > 0){
            while($row = $q1->fetch_assoc()){
                $id = $row['course_id'];   
                $week_label = $row['week_label'];
                $caption = $row['course_caption'];
                $course = $row['course_material'];
                ?>
                <center>

                    <table class="table table-responsive p-0 table-hover table-bordered w-75">
                        <thead>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            
                            <tbody>
                                
                                <td>
                        <?php
                        $file_ext = pathinfo($course, PATHINFO_EXTENSION);
                        if (in_array($file_ext, ['mp4', 'mov', 'avi', 'webm', 'mkv'])) {
                            echo "
                            <a href='tutorials/$course' target='_blank'>
                                <img src='images/v_icon.jpeg' width='130px' alt='Video Document'>
                            </a>
                            ";
                        } else if ($file_ext == 'pdf') {
                            echo "
                            <a href='tutorials/$course' target='_blank'>
                                <img src='images/pdf.png' width='130px' alt='PDF Document'>
                            </a>
                            ";
                        }
                    ?>
                                </td>
                                <td class="text-center">
                                    <br>
                                                                        
                                    <?php
                                echo $caption; 
                                    ?>
                                    

                                </td>
                                <td class="text-center">  
                                    <br>
                                    <a href="#" class="bi bi-star fs-3" id='star1' onclick="star1()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star2' onclick="star2()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star3' onclick="star3()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star4' onclick="star4()"></a> 
                                </td>

                                <td>
                                    <br>
                                    
                                    <a href="#" class="bi bi-hand-thumbs-up fs-3 text-dark" id='like' onclick="hide()"></a>
                                </td>
                                
                            </tbody>
                        </thead>
                        
                    </table>
                </center>

                <?php
            }

        }else{
           ?>
           <center>

               <div class='lead alert alert-warning w-75 p-5 offset-0 text-center'>Opps! We have no tutorials yet for <?php echo $week ?>. Please kindly check back later.
               
            </div>
        </center>
           <?php 
        }
        
    }elseif(isset($_GET['7'])){
        $week = "Week 7";
        $q1 = $db_connect->query("SELECT course_id, week_label, course_caption, course_material FROM course WHERE week_label = '$week';");
        if($q1->num_rows > 0){
            while($row = $q1->fetch_assoc()){
                $id = $row['course_id'];   
                $week_label = $row['week_label'];
                $caption = $row['course_caption'];
                $course = $row['course_material'];
                ?>
                <center>

                    <table class="table table-responsive p-0 table-hover table-bordered w-75">
                        <thead>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                    
                            <tbody>
                                
                                <td>
                    <?php
                    $file_ext = pathinfo($course, PATHINFO_EXTENSION);
                    if (in_array($file_ext, ['mp4', 'mov', 'avi', 'webm', 'mkv'])) {
                        echo "
                        <a href='tutorials/$course' target='_blank'>
                            <img src='images/v_icon.jpeg' width='130px' alt='Video Document'>
                        </a>
                        ";
                    } else if ($file_ext == 'pdf') {
                        echo "
                        <a href='tutorials/$course' target='_blank'>
                            <img src='images/pdf.png' width='130px' alt='PDF Document'>
                        </a>
                        ";
                    }
                    ?>
                                </td>
                                <td class="text-center">
                                    <br>
                                                                        
                                    <?php
                                echo $caption; 
                                    ?>
                                    

                                </td>
                                <td class="text-center">  
                                    <br>
                                    <a href="#" class="bi bi-star fs-3" id='star1' onclick="star1()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star2' onclick="star2()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star3' onclick="star3()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star4' onclick="star4()"></a> 
                                </td>

                                <td>
                                    <br>
                                    
                                    <a href="#" class="bi bi-hand-thumbs-up fs-3 text-dark" id='like' onclick="hide()"></a>
                                </td>
                                
                            </tbody>
                        </thead>
                        
                    </table>
                </center>

                <?php
            }

        }else{
           ?>
           <center>

               <div class='lead alert alert-warning w-75 p-5 offset-0 text-center'>Opps! We have no tutorials yet for <?php echo $week ?>. Please kindly check back later.
               
            </div>
        </center>
           <?php 
        }
        
    }elseif(isset($_GET['8'])){
        $week = "Week 8";
        $q1 = $db_connect->query("SELECT course_id, week_label, course_caption, course_material FROM course WHERE week_label = '$week';");
        if($q1->num_rows > 0){
            while($row = $q1->fetch_assoc()){
                $id = $row['course_id'];   
                $week_label = $row['week_label'];
                $caption = $row['course_caption'];
                $course = $row['course_material'];
                ?>
                <center>

                    <table class="table table-responsive p-0 table-hover table-bordered w-75">
                        <thead>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        
                            <tbody>
                                
                                <td>
                                    <?php
                                $file_ext = pathinfo($course, PATHINFO_EXTENSION);
                                if (in_array($file_ext, ['mp4', 'mov', 'avi', 'webm', 'mkv'])) {
                                    echo "
                                    <a href='tutorials/$course' target='_blank'>
                                        <img src='images/v_icon.jpeg' width='130px' alt='Video Document'>
                                    </a>
                                    ";
                                } else if ($file_ext == 'pdf') {
                                    echo "
                                    <a href='tutorials/$course' target='_blank'>
                                        <img src='images/pdf.png' width='130px' alt='PDF Document'>
                                    </a>
                                    ";
                                }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <br>
                                                                        
                                    <?php
                                echo $caption; 
                                    ?>
                                    

                                </td>
                                <td class="text-center">  
                                    <br>
                                    <a href="#" class="bi bi-star fs-3" id='star1' onclick="star1()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star2' onclick="star2()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star3' onclick="star3()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star4' onclick="star4()"></a>  
                                </td>

                                <td>
                                    <br>
                                    
                                    <a href="#" class="bi bi-hand-thumbs-up fs-3 text-dark" id='like' onclick="hide()"></a>
                                </td>
                                
                            </tbody>
                        </thead>
                        
                    </table>
                </center>

                <?php
            }

        }else{
           ?>
           <center>

               <div class='lead alert alert-warning w-75 p-5 offset-0 text-center'>Opps! We have no tutorials yet for <?php echo $week ?>. Please kindly check back later.
               
            </div>
        </center>
           <?php 
        }
        
    }elseif(isset($_GET['9'])){
        $week = "Week 9";
        $q1 = $db_connect->query("SELECT course_id, week_label, course_caption, course_material FROM course WHERE week_label = '$week';");
        if($q1->num_rows > 0){
            while($row = $q1->fetch_assoc()){
                $id = $row['course_id'];   
                $week_label = $row['week_label'];
                $caption = $row['course_caption'];
                $course = $row['course_material'];
                ?>
                <center>

                    <table class="table table-responsive p-0 table-hover table-bordered w-75">
                        <thead>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        
                            <tbody>
                                
                                <td>
                    <?php
                    $file_ext = pathinfo($course, PATHINFO_EXTENSION);
                    if (in_array($file_ext, ['mp4', 'mov', 'avi', 'webm', 'mkv'])) {
                        echo "
                        <a href='tutorials/$course' target='_blank'>
                            <img src='images/v_icon.jpeg' width='130px' alt='Video Document'>
                        </a>
                        ";
                    } else if ($file_ext == 'pdf') {
                        echo "
                        <a href='tutorials/$course' target='_blank'>
                            <img src='images/pdf.png' width='130px' alt='PDF Document'>
                        </a>
                        ";
                    }
                    ?>
                                </td>
                                <td class="text-center">
                                    <br>
                                                                        
                                    <?php
                                echo $caption; 
                                    ?>
                                    

                                </td>
                                <td class="text-center">  
                                    <br>
                                    <a href="#" class="bi bi-star fs-3" id='star1' onclick="star1()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star2' onclick="star2()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star3' onclick="star3()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star4' onclick="star4()"></a>  
                                </td>

                                <td>
                                    <br>
                                    
                                    <a href="#" class="bi bi-hand-thumbs-up fs-3 text-dark" id='like' onclick="hide()"></a>
                                </td>
                                
                            </tbody>
                        </thead>
                        
                    </table>
                </center>

                <?php
            }

        }else{
           ?>
           <center>

               <div class='lead alert alert-warning w-75 p-5 offset-0 text-center'>Opps! We have no tutorials yet for <?php echo $week ?>. Please kindly check back later.
               
            </div>
        </center>
           <?php 
        }
        
    }elseif(isset($_GET['10'])){
        $week = "Week 10";
        $q1 = $db_connect->query("SELECT course_id, week_label, course_caption, course_material FROM course WHERE week_label = '$week';");
        if($q1->num_rows > 0){
            while($row = $q1->fetch_assoc()){
                $id = $row['course_id'];   
                $week_label = $row['week_label'];
                $caption = $row['course_caption'];
                $course = $row['course_material'];
                ?>
                <center>

                    <table class="table table-responsive p-0 table-hover table-bordered w-75">
                        <thead>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            
                            <tbody>
                                
                                <td>
                        <?php
                        $file_ext = pathinfo($course, PATHINFO_EXTENSION);
                        if (in_array($file_ext, ['mp4', 'mov', 'avi', 'webm', 'mkv'])) {
                            echo "
                            <a href='tutorials/$course' target='_blank'>
                                <img src='images/v_icon.jpeg' width='130px' alt='Video Document'>
                            </a>
                            ";
                        } else if ($file_ext == 'pdf') {
                            echo "
                            <a href='tutorials/$course' target='_blank'>
                                <img src='images/pdf.png' width='130px' alt='PDF Document'>
                            </a>
                            ";
                        }
                        ?>
                                </td>
                                <td class="text-center">
                                    <br>
                                                                        
                                    <?php
                                echo $caption; 
                                    ?>
                                    

                                </td>
                                <td class="text-center">  
                                    <br>
                                    <a href="#" class="bi bi-star fs-3" id='star1' onclick="star1()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star2' onclick="star2()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star3' onclick="star3()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star4' onclick="star4()"></a> 
                                </td>

                                <td>
                                    <br>
                                    
                                    <a href="#" class="bi bi-hand-thumbs-up fs-3 text-dark" id='like' onclick="hide()"></a>
                                </td>
                                
                            </tbody>
                        </thead>
                        
                    </table>
                </center>

                <?php
            }

        }else{
           ?>
           <center>

               <div class='lead alert alert-warning w-75 p-5 offset-0 text-center'>Opps! We have no tutorials yet for <?php echo $week ?>. Please kindly check back later.
               
            </div>
        </center>
           <?php 
        }
        
    }elseif(isset($_GET['11'])){
        $week = "Week 11";
        $q1 = $db_connect->query("SELECT course_id, week_label, course_caption, course_material FROM course WHERE week_label = '$week';");
        if($q1->num_rows > 0){
            while($row = $q1->fetch_assoc()){
                $id = $row['course_id'];   
                $week_label = $row['week_label'];
                $caption = $row['course_caption'];
                $course = $row['course_material'];
                ?>
                <center>

                    <table class="table table-responsive p-0 table-hover table-bordered w-75">
                        <thead>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            
                            <tbody>
                                
                                <td>
                                <?php
                                $file_ext = pathinfo($course, PATHINFO_EXTENSION);
                                if (in_array($file_ext, ['mp4', 'mov', 'avi', 'webm', 'mkv'])) {
                                    echo "
                                    <a href='tutorials/$course' target='_blank'>
                                        <img src='images/v_icon.jpeg' width='130px' alt='Video Document'>
                                    </a>
                                    ";
                                } else if ($file_ext == 'pdf') {
                                    echo "
                                    <a href='tutorials/$course' target='_blank'>
                                        <img src='images/pdf.png' width='130px' alt='PDF Document'>
                                    </a>
                                    ";
                                }
                    
                                ?>
                                </td>
                                <td class="text-center">
                                    <br>
                                                                        
                                    <?php
                                echo $caption; 
                                    ?>
                                    

                                </td>
                                <td class="text-center">  
                                    <br>
                                    <a href="#" class="bi bi-star fs-3" id='star1' onclick="star1()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star2' onclick="star2()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star3' onclick="star3()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star4' onclick="star4()"></a> 
                                </td>
                               
                                <td>
                                    <br>
                                    
                                    <a href="#" class="bi bi-hand-thumbs-up fs-3 text-dark" id='like' onclick="hide()"></a>
                                </td>
                                
                            </tbody>
                        </thead>
                        
                    </table>
                </center>

                <?php
            }

        }else{
           ?>
           <center>

               <div class='lead alert alert-warning w-75 p-5 offset-0 text-center'>Opps! We have no tutorials yet for <?php echo $week ?>. Please kindly check back later.
               
            </div>
        </center>
           <?php 
        }
        
    }else{
        $week = "Week 12";
        $q1 = $db_connect->query("SELECT course_id, week_label, course_caption, course_material FROM course WHERE week_label = '$week';");
        if($q1->num_rows > 0){
            while($row = $q1->fetch_assoc()){
                $id = $row['course_id'];   
                $week_label = $row['week_label'];
                $caption = $row['course_caption'];
                $course = $row['course_material'];
                ?>
                <center>

                    <table class="table table-responsive p-0 table-hover table-bordered w-75">
                        <thead>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            
                            <tbody>
                                
                                <td>
                        <?php
                            $file_ext = pathinfo($course, PATHINFO_EXTENSION);
                            if (in_array($file_ext, ['mp4', 'mov', 'avi', 'webm', 'mkv'])) {
                                echo "
                                <a href='tutorials/$course' target='_blank'>
                                    <img src='images/v_icon.jpeg' width='130px' alt='Video Document'>
                                </a>
                                ";
                            } else if ($file_ext == 'pdf') {
                                echo "
                                <a href='tutorials/$course' target='_blank'>
                                    <img src='images/pdf.png' width='130px' alt='PDF Document'>
                                </a>
                                ";
                            }
                         ?>
                                </td>
                                <td class="text-center">
                                    <br>
                                                                        
                                    <?php
                                echo $caption; 
                                    ?>
                                    

                                </td>
                                <td class="text-center">  
                                    <br>
                                    <a href="#" class="bi bi-star fs-3" id='star1' onclick="star1()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star2' onclick="star2()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star3' onclick="star3()"></a>
                                    <a href="#" class="bi bi-star fs-3" id='star4' onclick="star4()"></a> 
                                </td>

                                <td>
                                    <br>
                                    
                                    <a href="#" class="bi bi-hand-thumbs-up fs-3 text-dark" id='like' onclick="hide()"></a>
                                </td>
                                
                            </tbody>
                        </thead>
                        
                    </table>
                </center>

                <?php
            }

        }else{
           ?>
           <center>

               <div class='lead alert alert-warning w-75 p-5 offset-0 text-center'>Opps! We have no tutorials yet for <?php echo $week ?>. Please kindly check back later.
               
            </div>
        </center>
           <?php 
        }
        
    }

    ?>
   <script>
   function hide(){
    var x = document.getElementById('like');
    if(x.className == "bi bi-hand-thumbs-up fs-3 text-dark"){
        x.className = "bi bi-hand-thumbs-up-fill fs-3 text-primary";
    }else{
        x.className = "bi bi-hand-thumbs-up fs-3 text-dark";

    }
   }
   function star1(){
    var a = document.getElementById('star1');
    if(a.className == "bi bi-star fs-3"){
        a.className = "bi bi-star-fill fs-3 text-success";
    }else{
        a.className = "bi bi-star fs-3";

    }
}
function star2(){
    var b = document.getElementById('star2');
    if(b.className == "bi bi-star fs-3"){
        b.className = "bi bi-star-fill fs-3 text-success";
    }else{
        b.className = "bi bi-star fs-3";

    }
}
function star3(){
    var c = document.getElementById('star3');
    if(c.className == "bi bi-star fs-3"){
        c.className = "bi bi-star-fill fs-3 text-success";
    }else{
        c.className = "bi bi-star fs-3";

    }
}
function star4(){
    var d = document.getElementById('star4');
    if(d.className == "bi bi-star fs-3"){
        d.className = "bi bi-star-fill fs-3 text-success";
    }else{
        d.className = "bi bi-star fs-3";

    }
   }
</script> 
</body>
</html>