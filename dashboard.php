<?php 
include "dbConnect.php";
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
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    
</head>
<body class="dashboard-body">
    <nav class="navbar navbar-expand p-4 bg-primary-subtle">
        <h2 class="fw-bolder">Learn AI</h2>


      </nav>

      <!-- Modal --> 
    <br>

        <div class="row" style="width:96%">
            <div class="col-md-3">
            <h3 class="m-3 text-secondary fw-bold"> 

                            <?php
                                $q1 = $db_connect->query("SELECT profile_img FROM students WHERE reg_number = '$reg';");
                                if($q1->num_rows > 0){
                                    $row = $q1->fetch_assoc();
                                    $profileImage = $row['profile_img'];

                                    if($profileImage == ""){

                                    ?>
                                <span> 
                                    <img src="images/user.png" class="rounded-circle image"  alt="" style="width:70px;margin-left:35px" onclick="openNav()">
                                </span>
                                        <?php
                                    }else{

                                        ?>
                                <span> 
                                    <img src="uploads/<?php echo $profileImage ?>" class="rounded-circle image"  alt="" style="width:70px; margin-left:35px" onclick="openNav()">
                                </span>
                                                <?php

                                    }
                                    
                                }
                                    ?>

          
          <?php 
        if(isset($_SESSION['sessionName'])){
            $user = $_SESSION['sessionName'];
            $firstname = explode(" ", $user);
            $first = $firstname[1];
            echo "Hi, ".$first;
        }else{
            echo "You're logged In!";
        }
        ?>
    </h3>
            </div>
        
            <div class="col-md-9 bg-white float-end" id="write-up">
            <p class="lead m-3">

                Learn the fundamentals of Artificial Intelligence, Machine Learning, Computer Vissions, Deep Learning and Image Processing.
            </p>
            </div>
        </div>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Log Out</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="lead">
                            
                            Are you sure you want to sign out?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="logout.php?user" class="btn btn-outline-warning text-dark">Yes! Sign me out</a>
                    </div>
                </div>
            </div>
        </div>
        
        
        <section class="rounded-5 p-3 body-container" id="main">
        <div class="row g-1">
    <!-- <div class="col-md-6 col-lg-6">
        <div class="card border border-0 m-3 bg-white">
            <div class="card-body">
               <video controls loop muted autoplay class="dashv1">
               <source src="images/vid1.mp4" type="video/mp4">

               </video>
                
            </div>
        </div>
        
    </div>
    
    <div class="col-md-6 col-lg-6 scroll rounded-3">
        <div class="card m-2 border border-0 bg-white">
            <div class="card-body">
                
               <video controls loop muted autoplay repeat class="dashv2">
                <source src="images/vid2.mp4">
               </video>
                

            </div>
        </div>
         -->
    <!-- </div> -->
    
    <div class="col-md-4 col-lg-4">
        <div class="card m-3 border border-0 shadow-sm">
            <div class="card-body bg-light-subtle">
                <a href="learn.php?1" class="text-decoration-none">
                <center>
                    <h3 class="card-title text-center fw-bold text-secondary">Week 1</h3>
                    <img src="images/man.jpg" class="w-75" alt="">
                    
                    <p class="w-75 lead">
                        Introduction to Artificial Intelligence
                    </p>
                    
                </center>
                
            </a>
            </div>
        </div>
        
    </div>
    
    <div class="col-md-4 col-lg-4">
        <div class="card m-3 border border-0 shadow-sm">
            <div class="card-body bg-light-subtle">
                
                <a href="learn.php?2" class="text-decoration-none">
                    <center>
                        <h3 class="card-title text-center fw-bold text-secondary">Week 2</h3>
                        <img src="images/hero-img.png" width="60%" alt="">
                        
                        
                        <p class="w-75 lead">
                            Introduction to Machine Learning
                        </p>
                        
                    </center>
                    
                </a>
                </div>
        </div>
        
    </div>
    
    <div class="col-md-4 col-lg-4">
        <div class="card m-3 border border-0 shadow-sm">
            <div class="card-body bg-light-subtle">
                <a href="learn.php?3" class="text-decoration-none">

                    <center>
                        <h3 class="card-title text-center fw-bold text-secondary">Week 3</h3>
                    <img src="images/ml1.jpeg" class="w-50" alt="">

                    
                    <p class="w-75 lead">
                        machine Learning Algorithm I
                    </p>
                   
                </center>
                
            </a>
            </div>
        </div>
        
    </div>
    
    <div class="col-md-4 col-lg-4">
        <div class="card m-3 border border-0 shadow-sm">
            <div class="card-body bg-light-subtle">
                <a href="learn.php?4" class="text-decoration-none">

                    <center>
                        <h3 class="card-title text-center fw-bold text-secondary">Week 4</h3>
                        <img src="images/ml2.jpeg" class="w-50" alt="">
                        
                        
                        <p class="w-75 lead">
                            machine Learning Algorithm II
                        </p>
                        
                    </center>
                </a>
                    
            </div>
        </div>
        
    </div>
    
    <div class="col-md-4 col-lg-4">
        <div class="card m-3 border border-0 shadow-sm">
            <div class="card-body bg-light-subtle">
            <a href="learn.php?5" class="text-decoration-none">

                <center>
                    <h3 class="card-title text-center fw-bold text-secondary">Week 5</h3>
                    <img src="images/dl1.jpeg" width="45%" alt="">
                    
                    
                    <p class="w-75 lead">
                        machine Learning Algorithm III
                    </p>
                    
                </center>
            </a>
                
            </div>
        </div>
        
    </div>
    
    <div class="col-md-4 col-lg-4">
        <div class="card m-3 border border-0 shadow-sm">
            <div class="card-body bg-light-subtle">
                <a href="learn.php?6" class="text-decoration-none">

                    <center>
                        <h3 class="card-title text-center fw-bold text-secondary">Week 6</h3>
                        <img src="images/dl3.jpeg" class="w-50" alt="">
                        
                        
                        <p class="w-75 lead">
                            Introduction to Deep Learning
                        </p>
                        
                    </center>
                </a>
                
            </div>
        </div>
        
    </div>
    
    <div class="col-md-4 col-lg-4">
        <div class="card m-3 border border-0 shadow-sm">
            <div class="card-body bg-light-subtle">
                <a href="learn.php?7" class="text-decoration-none">

                    <center>
                        <h3 class="card-title text-center fw-bold text-secondary">Week 7</h3>
                        <img src="images/dl4.jpeg" class="w-50" alt="">
                        
                        
                        <p class="w-75 lead">
                            Deep Learning Architecture and Intro. to Computer Vision
                        </p>
                        
                    </center>
                </a>
                
            </div>
        </div>
        
    </div>
    
    <div class="col-md-4 col-lg-4">
        <div class="card m-3 border border-0 shadow-sm">
            <div class="card-body bg-light-subtle">
                <a href="learn.php?8" class="text-decoration-none">

                    <center>
                        <h3 class="card-title text-center fw-bold text-secondary">Week 8</h3>
                        <img src="images/dl3.jpeg" width="60%" alt="">
                        
                        
                        <p class="w-75 lead">
                            Image Processing I
                        </p>
                        
                    </center>
                </a>
                
            </div>
        </div>
        
    </div>
    
    <div class="col-md-4 col-lg-4">
        <div class="card m-3 border border-0 shadow-sm">
            <div class="card-body bg-light-subtle">
                <a href="learn.php?9" class="text-decoration-none">

                    <center>
                        <h3 class="card-title text-center fw-bold text-secondary">Week 9</h3>
                        <img src="images/cl1.jpeg" class="w-50" alt="">
                        
                        
                        <p class="w-75 lead">
                            Image Processing II
                        </p>
                        
                    </center>
                </a>
                
            </div>
        </div>
        
    </div>
    
    <div class="col-md-4 col-lg-4">
        <div class="card m-3 border border-0 shadow-sm">
            <div class="card-body bg-light-subtle">
                <a href="learn.php?10" class="text-decoration-none">

                    <center>
                        <h3 class="card-title text-center fw-bold text-secondary">Week 10</h3>
                        <img src="images/mlalgo1.jpeg" class="w-75" alt="">
                        
                        
                        <p class="w-75 lead">
                            Machine Learning for Image Classification
                        </p>
                        
                    </center>
                </a>
                
            </div>
        </div>
        
    </div>
    
    <div class="col-md-4 col-lg-4">
        <div class="card m-3 border border-0 shadow-sm">
            <div class="card-body bg-light-subtle">
                <a href="learn.php?11" class="text-decoration-none">

                    <center>
                        <h3 class="card-title text-center fw-bold text-secondary">Week 11</h3>
                        <img src="images/ai2.jpeg" class="w-50" alt="">
                        
                        
                        <p class="w-75 lead">
                            Issues and Future of Artificial Intelligence
                        </p>
                        
                    </center>
                </a>
                
            </div>
        </div>
        
    </div>
    
    <div class="col-md-4 col-lg-4">
        <div class="card m-3 border border-0 shadow-sm">
            <div class="card-body bg-light-subtle">
                <a href="learn.php?12" class="text-decoration-none">

                    <center>
                        <h3 class="card-title text-center fw-bold text-secondary">Week 12</h3>
                        <img src="images/dl2.jpeg" class="w-50" alt="">
                        
                        
                        <p class="w-75 lead">
                            Deep Learning for Image Classification
                        </p>
                        
                    </center>
                </a>
                
            </div>
        </div>
        
    </div>
    
</section>

    <div id="mySidenav" class="sidenav bg-light">

    <div class="container p-4 bg-light-subtle">
        
    <?php
                                $q1 = $db_connect->query("SELECT profile_img FROM students WHERE reg_number = '$reg';");
                                if($q1->num_rows > 0){
                                    $row = $q1->fetch_assoc();
                                    $profileImage = $row['profile_img'];

                                    if($profileImage == ""){

                                    ?>
                                <span> 
                                    <img src="images/user.png" class="rounded-circle image"  alt="" style="width:50px;margin-left:35px">
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
    <br>
    <ul>
    <li>
    <a href="manageAccount.php">
    <span class="bi bi-person-fill rounded-5 btn btn-primary fs-4 "></span> &nbsp; Manage your account</a>
    </li>
    <hr>
    <li>
    <a href="request.php">
    <span class="bi bi-patch-question-fill rounded-5 btn btn-success fs-4"></span> &nbsp; Get assistance
    <!-- <span class="badge position-absolute mb-5"> -->
</span>
    </a>
    </li>
    <hr>
    <li>
    <a href="#exampleModal" data-bs-toggle="modal">
    <span  class="bi bi-box-arrow-right fs-4 rounded-5 btn btn-danger"></span>&nbsp; Sign out
  
   </a>
    </li>
    </ul>
    </div>



    <div id="mySidenav2" class="sidenav sidenav2 bg-light">

    <div class="container p-4 bg-light-subtle">
        
        <span class="bi bi-card-heading fs-2 text-success bg-dark-subtle p-2 rounded-circle m-2"></span>
        <button type="button" class="btn-close float-end fs-4 p-2"  aria-label="Close" onclick="closeNav2()"></button>
                          
    </div>
    <br>
        

    </div>


<script type="text/javascript">

function openNav(){
        document.getElementById("mySidenav").style.height ="100%";
        // document.getElementById("mySidenav").style.background = "rgba(0,0,0,0.5)";
        document.getElementById("main").style.marginTop ="-150px";
        document.getElementById("write-up").style.display ="none";
    
    }
function closeNav(){
        document.getElementById("mySidenav").style.height ="0";
        document.getElementById("main").style.marginTop ="15px";
        document.getElementById("write-up").style.display ="block";
    }

</script>

<script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>