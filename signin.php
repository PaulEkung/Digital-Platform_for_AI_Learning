<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">


</head>
<body class="signin-body">
<section>
        <header>
            <nav class="navbar navbar-expand p-1 bg-secondary-subtle">
                <h2 class="fw-bold m-3 text-primary">
                <img src="images/robot.jpg" width="70px" class="rounded-5" alt=".."> Learn AI 

                </h2>
                
<menu class="collapse navbar-collapse" style="float: left;">
<ul class="nav ms-auto">
    <a href="index.php" class="bi bi-house-fill fs-3 m-4 text-dark"></a>

</ul>
    
</menu>
</nav>
</header>
</section>  
    <br>
    
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
  

            <div class="col-md-5">
            <div class="display">
                
                </div>  
                <form action="signin.php" method="POST" class="bg-white p-5 shadow-lg rounded-4">
                    <?php
                    if(isset($_GET['signupSuccess'])){
                        echo "<div class=\"alert alert-success text-center\">Account created successfully!</div>";

                    }elseif(isset($_GET['recoverySuccess'])){
                        echo "<div class=\"alert alert-success text-center\">Password recovery successfull!</div>";

                    }
                    ?>
                    <h2>
                        Login
                    </h2> 
                    <?php 
                    
                        require 'dbConnect.php';
                        require 'views.php';
                        require 'signinController.php';
                        ?>
                    
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Registration Number</label>
                        <input type="text" class="form-control form-control-lg p-3 border border-2" placeholder="xxxxxxxx" id="customInputEmail" aria-describedby="emailHelp" name="reg_number">
                    </div>
                    <div class="mb-3">
                        <label for="customInputPassword" class="form-label">Password</label>
                        <input type="password" class="form-control form-control-lg p-3 border border-2" placeholder="xxxxxxxx" id="exampleInputPassword" aria-describedby="passwordHelp" name="password">
                        
                    </div>  
                    <p>

                        <a href="account_verify.php" class="text-decoration-none">Forgotten Password?</a>   
                    </p>
                        
                            <input type="submit" name="submit" id="submit" class="btn btn-outline-info w-100 btn-lg rounded-2 border border-info border-3 p-3">
                            <br>
                            <br>
                            <p>Don't have an account yet? <a href="signup.php">Sign Up</a></p>

                </form>
                <br>
                <br>
            </div> 
            <div class="col-md-4"></div>
            </div>
        </div>

</body>
</html>