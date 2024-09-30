<?php 
include 'dbConnect.php';
include 'views.php';
if(!isset($_SESSION['sessionAdmin'])){

    header("Location: adminLogin.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
   
</head>
<body class="admin-body-view">
<nav class="navbar navbar-expand p-4 bg-light-subtle sticky-top">
        <h2 class="fw-bolder">Welcome! Mr. George E.</h2>
        <ul class="ms-auto">
            <a href="logout.php?admin" onclick="return confirm('Are you sure you want to logout?')">
                <abbr title="Logout">

                    <span class="float-end bi bi-box-arrow-right text-dark fs-2" id="drop"></span>
                </abbr>
            </a>
        </ul>
 </nav> 
 <br>
 <br>
 <section class="actions">

    <div class="container w-75">
        <div class="accordion accordion-flush shadow-lg p-5 bg-white rounded-4" id="accordionFlushExample">

                            
                            <center>

                                <span> 
                                    <img src="images/user.png" class="rounded-circle image"  alt="" style="width:80px">
                                </span>
                            </center> 
                                <br>
                <br>
                
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        &nbsp;
                            <i class="bi bi-file-fill mb-4 fs-2"></i>
                            &nbsp;&nbsp; &nbsp;
                            <span class="text-secondart fs-3">
                                All Tutorials
                                <p class="fs-6 text-secondary">
                                   You can add or delete tutorials

                                </p>
                            </span> 
                            </span> 

                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                    <ul class="list-group list-group-flush p-4 tuts-list">
                        <li class="list-group-item">
                        <i class="bi bi-file-earmark-pdf-fill fs-2"></i> <a href="tuorials.php?pdf" class="lead">All PDF tutorials</a>
                <span class="float-end">
                    <?php
                $sql = "SELECT COUNT(CASE WHEN SUBSTRING(course_material, LOCATE('.pdf', course_material)) = '.pdf' THEN 1 END) AS pdf_count FROM course";
                
                $count1 = mysqli_fetch_array(mysqli_query($db_connect, $sql)); 
                echo "<b>".$count1[0]."</b>";
                    
                    ?>
                    
                </span>
                        </li>
                        <br>
                        <li class="list-group-item">
                          <i class="bi bi-file-earmark-play-fill fs-2"></i>  <a href="tuorials.php?mp4" class="lead">All Video Tutorials</a>
                        <span class="float-end">

                    <?php
                    $sql = "SELECT COUNT(CASE WHEN SUBSTRING(course_material, LOCATE('.mp4', course_material)) = '.mp4' THEN 1 END) AS mp4_count FROM course;";
                    
                    $count2 = mysqli_fetch_array(mysqli_query($db_connect, $sql)); 
                    echo "<b>".$count2[0]."</b>";
                
                    
                    ?>
                        </span>
                            
                        </li>
                    </ul>

                        </div>

                    </div>
                    </div>
                    
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        <i class="bi bi-person-fill mb-4 fs-1"></i> &nbsp;
                        &nbsp;&nbsp;
                        <span class="text-secondart fs-3">
                            Students
                        <p class="fs-6 text-secondary"> See all registered students</p>
                        </span> 
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                        <table class="table table-bordered table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th>Profile Image</th>
                                    <th>Student's Name</th>
                                    <th>Registration Number</th>
                                    <th>Level</th>
                                    <th> <span class="bi bi-eye fs-5"></span></th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
                            
                            $sql = $db_connect->query("SELECT student_id, student_name, reg_number, level, profile_img FROM vlearning.students");
                            if($sql-> num_rows > 0){
                                while($row = $sql-> fetch_assoc()){
                                    $student_id = $row["student_id"];
                                    $img = $row['profile_img'];
                                    $name = $row['student_name'];
                                    $reg = $row['reg_number'];
                                    $level = $row['level'];
                                    ?>
                                <tr>
                                    <td>
                                        <center>

                                            <?php
                                    if($img == ""){
                                        echo "                                    <img src='images/person.jpg' class='rounded-circle image'  alt='' style='width:60px'>";
                                    }else{
                                        echo "                                    <img src='uploads/$img' class='rounded-circle image'  alt='' style='width:60px'>";
                                    }
                                    ?>
                                    </center>
                                    </td>
                                    <td><?php echo $name ?></td>
                                    <td><?php echo $reg ?></td>
                                    <td><?php echo $level ?></td>
                                    <td>
                                        
                                        <a href="student.php?student_id=<?php echo $student_id ?>" class="btn btn-primary btn-sm fw-bold bi bi-arrow-right"></a>
                                        
                                    </td>
                                </tr>

                                </div>
                                <?php
                            }

                            }else{
                                echo "<span class='text-danger'>You do not have any registered student</span>";
                                echo "<br>";
                            }
                            ?>
                                
                                
                            </tbody>
                            
                        </table>       
                    </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            <i class="bi bi-chat-fill mb-4 fs-2 rounded-5"></i> &nbsp; &nbsp;&nbsp;
                        <span class="text-secondart fs-3">
                            Communications
                            <p class="fs-6 text-secondary">Assist your students to learn better</p>
                        </span> 
                        </span> 
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <?php
                            $chatRQ = $db_connect->query("SELECT std.*, cht.* FROM `students` std, `chat` cht WHERE std.student_id = cht.student_id ORDER BY cht.chat_id DESC");
                            if($chatRQ->num_rows > 0){
                                while($row = $chatRQ->fetch_assoc()){
                                $p_image = $row['profile_img'];
                                $reg_number = $row['reg_number'];
                                $student_name = $row['student_name'];
                                $chat = $row['request'];
                                $reply = $row['response'];
                                $chat_id = $row['chat_id'];
                                ?>
                                <div class="container bg-light p-3">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <br>
                                            
                                        <?php
                                    if($p_image == ""){
                                        echo "                                    <img src='images/person.jpg' class='rounded-circle image'  alt='' style='width:60px'>";
                                    }else{
                                        echo "                                    <img src='uploads/$p_image' class='rounded-circle image'  alt='' style='width:60px'>";

                                    }
                                    ?>
                                    <i class="lead fw-bold">
                                        <?php
                                    
                                     $first_name = explode(" ", $student_name);
                                     $first = $first_name[0];
                                     $second = $first_name[1];
                                     
                                     echo $first." ";
                                     echo $second;
                                     
                                     ?>
                                     </i>
                                    </div>
                                    <div class="col-md-8 bg-light-subtle p-2">
                                        
                                        <?php
                                        if($reply == ""){
                                            ?>
                                            <a href="response.php?id=<?php echo $chat_id ?>" class="bi bi-chat-fill text-secondary float-end fs-3"></a>
                                            <?php
                                        }else{

                                        ?>
                                        <i class="bi bi-check-all text-secondary float-end fs-2"></i>

                                        <?php
                                            }
                                            ?>
                                            <hr>
                                        <p class="">
                                     <?php
                                     echo $chat
                                     ?>
                                     </p>
                                        </div>
                                    </div>
                                    
                                     
                                </div>
                                <br>
                                
                                <?php

                                }
                                
                            }else{
                                echo "<span class='text-danger'>No communications yet!</span>";
                                echo "<br>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingLast">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseLast" aria-expanded="false" aria-controls="flush-collapseLast">
                            <i class="bi bi-gear-fill mb-4 fs-2 rounded-5"></i> &nbsp; &nbsp;&nbsp;
                        <span class="text-secondart fs-3">
                            Login Credentials
                            <p class="fs-6 text-secondary">Update username and password</p>
                        </span> 
                        </span> 
                        </button>
                    </h2>
                    <div id="flush-collapseLast" class="accordion-collapse collapse" aria-labelledby="flush-headingLast" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">

                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="admin.php" method="post" class="bg-light-subtle shadow p-4">
                                <h3>Update Tutor Id</h3>
                                <?php
                                $funcCall = updateAdminUsername($db_connect);
                                ?>
                            <label for="username" class="m-2">Provide current Id</label>
                            <input type="text" class="form-control form-control-lg p-3" placeholder="xxxxxxxxxx" name='current_username'>
                            <br>
                            <label for="newId" class="m-2">Provide new Id</label>

                            <input type="text" class="form-control form-control-lg p-3" placeholder="xxxxxxxxxx" name="new_username">
                            <br>
                            <input type="submit" class="btn btn-primary btn-lg" value="Update" name="update_username">
                            </form>
                            </div>

                            <div class="col-md-6">
                            <form action="admin.php" method="post" class="bg-light-subtle shadow p-4">
                            <h3>Update Tutor Password</h3>
                                    <?php
                                $func = updateAdminPassword($db_connect);
                                ?>       
                            <label for="password" class="m-2">Provide current password</label>
                            <input type="text" class="form-control form-control-lg p-3" placeholder="xxxxxxxxxx" name="current_password">
                            <br>
                            <label for="newPassword" class="m-2">Provide new password</label>

                            <input type="password" class="form-control form-control-lg p-3" placeholder="xxxxxxxxxx" name="new_password">
                            <br>
                            <label for="confirmNewPassword" class="m-2">Confirm new password</label>

                            <input type="password" class="form-control form-control-lg p-3" placeholder="xxxxxxxxxx" name="confirmNewPassword">
                            <br>
                            <input type="submit" class="btn btn-primary btn-lg" value="Update" name="update_password">
                                </form>
                                </div>
                            </div>
                        </div>


                        </div>
                    </div>
                </div>
            </div>
            

        </div>
        </div>
        <br>

</section> 

<?php 

if(isset($_GET["invalidFormSubmission"])){
    echo "<script>window.alert('Invalid form submission. Please go back to the update page and provide all inputs')</script>";

}elseif(isset($_GET["invalidFileType"])){
    echo "<script>window.alert('Invalid file type choosen')</script>";

}elseif(isset($_GET["updateFileErr"])){
    echo "<script>window.alert('Failed to update the file. Something went wrong. Please try again')</script>";
    
}elseif(isset($_GET["updateFailure"])){
    echo "<script>window.alert('Failed to update tutorial. This might be unusual. Please go back and retry')</script>";
    
}elseif(isset($_GET["updateSuccess"])){
    
    echo "<script>window.alert('Tutorial updated successfully!')</script>";

}elseif(isset($_GET["deleted"])){
    echo "<script>window.alert('Tutorial deleted successfully!')</script>";

}elseif(isset($_GET["studentDeleted"])){
    echo "<script>window.alert('Student deleted successfully')</script>";
    
}elseif(isset($_GET["invalidSubmission"])){
    echo "<script>window.alert('Invalid form submission. Please try again')</script>";
    
}elseif(isset($_GET["responseErr"])){
    echo "<script>window.alert('Error handling request! Something went wrong. If this continues, please contact system development team')</script>";

}elseif(isset($_GET["responseEgg"])){
    echo "<script>window.alert('Response sent successfully!')</script>";

}else{
    echo null;
}
?>
<script type="text/javascript">
    function displayBlockFrame(){
        var x = document.getElementById('showFullDetails').style.display = "block";
        
    }

</script>
<script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script> 
</body>
</html>