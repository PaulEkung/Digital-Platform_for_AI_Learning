<?php
 include 'dbConnect.php';
 session_start();
if(!isset($_SESSION['sessionAdmin'])){

    header("Location: adminLogin.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorials</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="tutorial-body">
<nav class="navbar navbar-expand p-2 bg-light-subtle">
        <a href="admin.php" class="fw-bolder bi bi-arrow-left-circle p-2 fs-1 text-secondary"></a>
        <ul class="ms-auto">
            <a href="#">

                <span class="float-end bi bi-three-dots text-dark fs-2" id="drop"></span>
            </a>
        </ul>
 </nav> 

 <?php
        if(isset($_GET['pdf'])){
            $sql = "SELECT COUNT(CASE WHEN SUBSTRING(course_material, LOCATE('.pdf', course_material)) = '.pdf' THEN 1 END) AS pdf_count FROM course";
            
            $count1 = mysqli_fetch_array(mysqli_query($db_connect, $sql)); 
            echo "
            <p class='m-2 p-2 bg-primary-subtle w-25 text-center'>Total PDF Tutorials:  <b>$count1[0]</b></p>
            
            ";
        }else{
            $sql = "SELECT COUNT(CASE WHEN
            SUBSTRING(course_material, LOCATE('.mp4', course_material)) = '.mp4' OR
            SUBSTRING(course_material, LOCATE('.mov', course_material)) = '.mov' OR
            SUBSTRING(course_material, LOCATE('.avi', course_material)) = '.avi' OR
            SUBSTRING(course_material, LOCATE('.webm', course_material)) = '.webm' OR
            SUBSTRING(course_material, LOCATE('.mkv', course_material)) = '.mkv'
                THEN 1 END) AS video_count
                FROM course;";
            
            $count2 = mysqli_fetch_array(mysqli_query($db_connect, $sql)); 
            echo "
            <p class='m-2 p-2 bg-primary-subtle w-25 text-center'>Total Video Tutorials:  <b>$count2[0]</b></p>
            ";
        }
        
        ?>

<abbr title="Add new tutorial" class="sticky-top position-sticky">
    <a href="upload.php" class="bi bi-plus-circle-fill fs-1 offset-11 text-secondary p-3"></a>
</abbr>
 
<div class="container">
    
    <table class="table table-responsive table-hover table-bordered">
        <thead>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>

            </thead>
    <?php 
        if(isset($_GET['pdf'])){
            $sql = $db_connect-> query("SELECT course_id, week_label, course_caption, course_material FROM course WHERE SUBSTRING(course_material, LOCATE('.pdf', course_material)) = '.pdf';");
            if($sql->num_rows > 0){
                while($row = $sql-> fetch_assoc()){
                $id = $row['course_id'];   
                $week = $row['week_label'];
                $caption = $row['course_caption'];
                $course = $row['course_material'];

                    ?>
                        <tbody>
                            
                            <td>
                                <?php
                    echo "
                    <a href='tutorials/$course' target='_blank'>
                     <img src='images/pdf.png' width='120px' alt='PDF Document'>

                        </a>
                        ";
                        ?>
                                </td>
                                <td class="text-center">
                                    <br>
                                    
                                    <?php
                                echo $week; 
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
                                    
                                <a href="update.php?id=<?php echo $id ?>" class="btn btn-warning">Update</a>
                                </td>
                                <td>
                                    <br>
                                    
                                    <a href="delete.php?id=<?php echo $id?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this tutorial?')">Delete</a>
                                </td>

                            
                            </tbody>
                            <?php
                }
            }else{
                echo "
                
                <center>
                <br>
                <br>
                <br>
                
                <div class='lead alert alert-warning w-75 p-5 offset-0 text-center'>Opps! You do not have any tutorials added yet. Please click the plus(+) button above to add new tutorials.
                
                </div>
                </center>
                ";
            }
        }else{
            $sql = $db_connect-> query("SELECT course_id, week_label, course_caption, course_material FROM course WHERE
            SUBSTRING(course_material, LOCATE('.mp4', course_material)) = '.mp4' OR
            SUBSTRING(course_material, LOCATE('.webm', course_material)) = '.webm' OR
            SUBSTRING(course_material, LOCATE('.mkv', course_material)) = '.mkv' OR
            SUBSTRING(course_material, LOCATE('.avi', course_material)) = '.avi' OR
            SUBSTRING(course_material, LOCATE('.mov', course_material)) = '.mov'
            
            ;");

            if($sql->num_rows > 0){
                while($row = $sql-> fetch_assoc()){
                 $course_id = $row['course_id'];   
                $week = $row['week_label'];
                $caption = $row['course_caption'];
                $course = $row['course_material'];

                    ?>
                        <tbody>
                            
                            <td>
                                <?php
                    echo "
                    <a href='tutorials/$course' target='_blank'>
                    <img src='images/v_icon.jpeg' width='120px' alt='PDF Document'>

                        </a>
                        ";
                        ?>
                                </td>
                                <td class="text-center">
                                    <br>
                                    
                                    <?php
                                echo $week; 
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
                                    
                                <a href="update.php?id=<?php echo $course_id ?>" class="btn btn-warning">Update</a>
                                </td>
                                <td class="text-center">
                                    <br>
                                    
                               <a href="delete.php?id=<?php echo $course_id ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this tutorial?')">Delete</a>
                                </td>
                                
                            </tbody>
                            <?php
                }
            }else{
                echo "
                
                <center>
                <br>
                <br>
                <br>
                
                <div class='lead alert alert-warning w-75 p-5 offset-0 text-center'>Opps! You do not have any tutorials added yet. Please click the plus(+) button above to add new tutorials.
                
                </div>
                </center>
                ";
            }
            
        }
        
        ?>
    
</table>
</div>

<script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script> 
</body>
</html>