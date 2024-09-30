<?php 
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
    <title>Student</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <br>
    <br>
    <div class="container shadow p-3" id="showFullDetails">
                    <div class="row">
                        <div class="col-md-3 bg-light">
                            <br>
                            
                            <a href="admin.php" class="bi bi-arrow-left-circle m-2 fs-1 p-2 text-dark"></a>
                        </div>
                        <div class="col-md-6 bg-light-subtle p-3">
                        <?php 
                        include 'dbConnect.php';
                        if(isset($_GET["student_id"])){
                            $std_id = $_GET["student_id"];
                            $query = $db_connect->query("SELECT student_id, student_name, reg_number, level, email, phone, profile_img, date_registered FROM vlearning.students WHERE vlearning.students.student_id = '$std_id';");

                            if($query == true){
                                if($row = $query-> fetch_assoc()){
                                $student_id = $row['student_id'];
                                $image = $row['profile_img'];
                                $std_name = $row['student_name'];
                                $std_reg = $row['reg_number'];
                                $std_level = $row['level'];
                                $email = $row['email'];
                                $phone = $row['phone'];
                                $date = $row['date_registered'];

                                ?>
                                <div class="container">
                                    

                                        <?php
                                    if($image == ""){
                                        echo "                                    <img src='images/person.jpg' class='rounded-circle image'  alt='' style='width:90px'>";
                                    }else{
                                        echo null;
                                    }
                                
                                    ?>
                                <a href='delete.php?student_id=<?php echo $student_id ?>' class='lead bi bi-trash-fill float-end fs-2 text-danger bg-white p-5 rounded-5' onclick='return confirm("You are about to delete this student! Are you sure you want to delete student?")'></a>
                                    <hr>
                                    <h4 class="fw-bold">
                                       Student Name:
                                    </h4>      
                                         <span class="lead"><?php echo $std_name ?></span>
                                    
                                    <h4 class="fw-bold">
                                        Registration Number:
                                    </h4>
                                    <span class="lead"><?php echo $std_reg ?></span>
                                    
                                    <h4 class="fw-bold">
                                        Level: 
                                    </h4>
                                        <span class="lead"><?php echo $std_level ?></span>
                                    <h4 class="fw-bold">
                                        Email Address: 
                                    </h4>
                                        <span class="lead"><?php echo $email ?></span>
                                    <h4 class="fw-bold">
                                        Phone Number: 
                                    </h4>
                                        <span class="lead"><?php echo $phone ?></span>
                                    <h4 class="fw-bold">
                                        Date Registered: 
                                    </h4>
                                        <span class="lead"><?php echo $date ?></span>
                                </div>
                            
                                
                                <?php
                                }
                            }
                            
                            }else{
                                echo "Error handling request";
                            
                            }
                            ?>
                            
                            
                        </div>
                        <div class="col-md-3 bg-light"></div>
                    </div>
                    <br>
                    <br>
                </div>
                <br>
<script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>  
</body>
</html>