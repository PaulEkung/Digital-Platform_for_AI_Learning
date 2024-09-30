<?php
include 'dbConnect.php';
include 'views.php';
if(isset($_SESSION['sessionRegNumber'])){
    $reg = $_SESSION['sessionRegNumber'];

}else{
        header("Location: signin.php");
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Account</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <style>
    .sidenav2{
    height: 100vh;
    width: 0;
    position: fixed;
    z-index: 1;
    top:0;
    right: 0;
    overflow-x: hidden;
    transition: 0.1s;

    }
    </style>
</head>
<body class="manageAccount-body">
<section class="actions">
    <a href="dashboard.php" class="bi bi-arrow-left-circle fs-1 text-secondary m-4 position-sticky sticky-top"></a>
    <div class="container w-75">
        <div class="accordion accordion-flush shadow-lg p-5 bg-white rounded-4" id="accordionFlushExample">

                            
                            <center>
                            <?php
                                $q1 = $db_connect->query("SELECT profile_img FROM students WHERE reg_number = '$reg';");
                                if($q1->num_rows > 0){
                                    $row = $q1->fetch_assoc();
                                    $profileImage = $row['profile_img'];

                                    if($profileImage == ""){

                                    ?>
                                <span> 
                                    <img src="images/user.png" class="rounded-circle image"  alt="" style="width:100px" onclick="openNav()">
                                </span>
                                        <?php
                                    }else{

                                        ?>
                                <span> 
                                    <img src="uploads/<?php echo $profileImage ?>" class="rounded-circle image border border-3 border-primary"  alt="" style="width:100px" onclick="openNav()">
                                </span>
                                                <?php

                                    }
                                    
                                }
                                    ?>

                            </center> 
                                <br>
                <br>
                
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        &nbsp;
                            <i class="bi bi-person-fill mb-4 fs-3 btn btn-dark rounded-5"></i>
                            &nbsp;&nbsp; &nbsp;
                            <span class="text-secondart fs-3">
                                User Profile
                                <p class="fs-6 text-secondary">
                                   Manage and easily make changes to your profile

                                </p>
                            </span> 
                            </span> 

                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="container w-75">

                            <form action="manageAccount.php" method="post" class="bg-light-subtle shadow p-4">
                                <h3>Update Your Profile Information</h3>
                                <p class="alert alert-warning">Please note that you are not allowed to make changes to your registration number. Your registration number is uniquely identified to you. Kindly contact system administrator to request a change on your registration number</p>
                                <?php
                                $q1 = $db_connect->query("SELECT student_id, student_name, reg_number, level, email, phone FROM students WHERE reg_number = '$reg';");
                                if($q1->num_rows > 0){
                                    $row = $q1->fetch_assoc();
                                    $std_id = $row['student_id'];
                                    $reg_number = $row['reg_number'];
                                    $student_name = $row['student_name'];
                                    $level = $row['level'];
                                    $email = $row['email'];
                                    $phone = $row['phone'];
                                }
                                $setProfile = updateStudentProfile($db_connect);
                            ?>
                                
                            <input type="hidden" class="form-control form-control-lg p-3" placeholder="xxxxxxxxxx" name='reg' value='<?php echo $reg_number ?>'>
                            <br>
                            <label for="newId" class="m-2">Student Name</label>
                            
                            <input type="text" class="form-control form-control-lg p-3" placeholder="xxxxxxxxxx" name="name" value='<?php echo $student_name ?>'>
                            <br>
                            <label for="username" class="m-2">Level</label>
                            <input type="text" class="form-control form-control-lg p-3" placeholder="xxxxxxxxxx" name='level' value='<?php echo $level ?>'>
                            <br>
                            <label for="newId" class="m-2">Email Address</label>
                            
                            <input type="text" class="form-control form-control-lg p-3" placeholder="xxxxxxxxxx" name="email" value='<?php echo $email ?>'>
                            <br>
                            <label for="username" class="m-2">Phone Number</label>
                            <input type="text" class="form-control form-control-lg p-3" placeholder="xxxxxxxxxx" name='phone' value='<?php echo $phone ?>'>
                            <br>

                            <input type="submit" class="btn btn-primary btn-lg" value="Update Profile" name="update_profile">
                        </form>
                    </div>

                        </div>

                    </div>
                    </div>
                    
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        <i class="bi bi-gear-fill fs-3 mb-4 rounded-5 btn btn-warning"></i> &nbsp;
                        &nbsp;&nbsp;
                        <span class="text-secondart fs-3">
                            Settings
                        <p class="fs-6 text-secondary">Update your account password</p>
                        </span> 
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            
                    
                        <div class="accordion accordion-flush p-3 bg-white rounded-4" id="accordionFlushExample2">

                        <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingSub">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSub" aria-expanded="false" aria-controls="flush-collapseSub">
                            <i class="bi bi-lock fs-3 mb-2"></i> &nbsp;
                        <span class="text-secondart fs-5">
                            Set new password
                            
                        </span> 
                        </span> 
                        </button>
                    </h2>
                    <div id="flush-collapseSub" class="accordion-collapse collapse" aria-labelledby="flush-headingSub" data-bs-parent="#accordionFlushExample2">
                        <div class="accordion-body">

                        <div class="container" style="width:60%">
                                <form action="manageAccount.php" method="post" class="bg-light-subtle shadow p-4">
                                    <h3>Update Your Password</h3>
                                    <?php
                                $func = updateStudentPassword($db_connect);
                                ?>   
                                <br>    
                                <input type="hidden" value="<?php echo $reg ?>" name='regForPwd'>
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
                </div>



            </div>
        </div>
        <br>
        <br>

</section>

<div id="ImgSidenav" class="sidenav2 bg-light">

<div class="container p-4">

            <?php
                $q1 = $db_connect->query("SELECT profile_img FROM students WHERE reg_number = '$reg';");
                if($q1->num_rows > 0){
                    $row = $q1->fetch_assoc();
                    $profileImage = $row['profile_img'];

                    if($profileImage == ""){

                    ?>
                <span> 
                    <img src="images/user.png" class="rounded-circle image"  alt="" style="width:50px">
                </span>
                        <?php
                    }else{

                        ?>
                <span> 
                    <img src="uploads/<?php echo $profileImage ?>" class="rounded-circle image"  alt="" style="width:50px">
                </span>
                                <?php

                    }
                    
                }
                    ?>

        
    <button type="button" class="btn-close float-end fs-4 p-2"  aria-label="Close" onclick="closeNav()"></button>
                      
</div>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-5">
            <h2>Update Your profile Image</h2>
            <br>
            <?php 
            $sql = $db_connect-> query("SELECT profile_img, reg_number, student_name FROM students WHERE reg_number = '$reg'");
            if($sql-> num_rows > 0){
                $row = $sql-> fetch_assoc();
                $dbImg = $row['profile_img'];
                $student = $row['student_name'];
                 
            }

            
            ?>

            <form action="manageAccount.php" method="post" class="bg-white p-5 shadow-lg rounded-4" enctype="multipart/form-data">
            <?php
             $profileUpdate = uploadProfileImg($db_connect);
            
            ?>
                <label for="image">Select your profile image</label>
                <br>
                <br>
                <input type="hidden" value="<?php echo $reg ?>" name="reg">
                <input type="hidden" value="<?php echo $student ?>" name="student">
                <input type="hidden" value="<?php echo $dbImg ?>" name="oldImg">
                <input type="file" name="img" id="img" class="form-control form-control-lg">
                
                <br>
                <input type="submit" value="Upload Now" name="uploadProfileImg" class="btn btn-primary btn-lg w-100">
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
    

</div>


<script type="text/javascript">
    
            
    function openNav(){
        document.getElementById("ImgSidenav").style.width ="90%";
        
    
    }
    function closeNav(){
        document.getElementById("ImgSidenav").style.width ="0";

    }

</script>
<script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>