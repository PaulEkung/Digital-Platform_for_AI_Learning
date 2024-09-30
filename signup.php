<!DOCTYPE html>
<html lang="en">
<head>
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
<body class="signup-body"> 
<section>
        <header>
            <nav class="navbar navbar-expand p-1 bg-secondary-subtle">
                <h2 class="fw-bold text-dark m-3">
                   <img src="images/robot.jpg" width="70px" class="rounded-5" alt=".."> Learn AI 
                
                </h2>

    <ul class="nav ms-auto">
    <a href="index.php" class="bi bi-house-fill fs-3 m-4 text-dark"></a>

</ul>


</nav>
</header>
</section>  
    <br>
    <br>
    
    <div class="container position-absolute">
        <div class="row">
            <div class="col-md-2"></div>

            <div class="col-md-10">
                <form action="signup.php" method="post" class="bg-white p-5 shadow-lg rounded-4">
                <div class="container w-50 float-end">

                    <?php 
                    require 'dbConnect.php';
                    require 'views.php';
                    require 'signupController.php';

                    ?>
                    </div>
                    <h2>
                        Sign Up

                        
                    </h2>
                    <span><p>Already have an account? <a href="signin.php">Sign In</a></p>
                </span>
                
                   <br>

                   <div class="row">
                    <div class="col-md-6">
                    <div>
                        <label for="exampleInputEmail1" class="form-label">Full name</label>
                        <input type="text" class="form-control form-control-lg p-3 border border-2" id="customInputName" placeholder="xxxxxxxxxx" aria-describedby="nameHelp" name="fullname">
                        <div id="nameHelp" class="form-text text-danger">Please note that your first and last name are mandatory.</div>
                    </div>
                        <br>
                    <div>
                        <label for="customInputEmail" class="form-label">Registration Number</label>
                        <input type="text" class="form-control form-control-lg p-3 border border-2" id="customInputEmail" placeholder="xxxxxxxxxx" aria-describedby="emailHelp" name="regnumber">
                        <div id="emailHelp" class="form-text text-secondary">

                            We'll never share your email with anyone esle
                        </div>
                    </div>  
                    <br>

                    <div>
                        <label for="customInputPhone" class="form-label">Level</label>

                        <select type="text" maxlength="11" class="form-control form-control-lg p-3 border border-2 form-select" id="customInputPhone" aria-describedby="phoneHelp" name="level" placeholder="xxxxxxxxxxx">

                        <option value="ND1">ND1</option>
                        <option value="ND2">ND2</option>
                        <option value="HND1">HND1</option>
                        <option value="HND2">HND2</option>

                        </select>
                        
                        
                    </div>     
                        <br>
                    <div>
                        <label for="customInputPhone" class="form-label">Email Address</label>
                        <input type="email" class="form-control form-control-lg p-3 border border-2" id="customInputPhone" aria-describedby="phoneHelp" name="email" placeholder="example@gmail.com">
                        
                        
                    </div>   
                    </div>
                    <div class="col-md-6">
                    <div>
                        <label for="customInputPhone" class="form-label">Phone number</label>
                        <input type="tel" maxlength="11" class="form-control form-control-lg p-3 border border-2" id="customInputPhone" aria-describedby="phoneHelp" name="phone" placeholder="xxxxxxxxxxx">
                        
                        
                    </div>     
                        <br>
                    <div>
                        <label for="customInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control form-control-lg p-3 border border-2" id="customInputPassword1" aria-describedby="passwordHelp" name="password1" placeholder="xxxxxx">
                        <div id="passwordHelp" class="form-text text-danger">Password must be at least 6 digits long. We recommend using passwords that are easy to remember</div>
                        
                    </div>   
                        <br>
                    <div>
                        <label for="customInputEmail" class="form-label">Confirm password</label>
                        <input type="password" class="form-control form-control-lg p-3 border border-2" id="customInputPassword2" aria-describedby="passwordHelp" name="password2" placeholder="xxxxxx">
                        
                        
                    </div>     
                        <br>
                        <br>
                            <input type="submit" name="submit" id="submit" class="btn btn-outline-dark w-100 btn-lg rounded-2 border border-dark border-3 p-3">
                            <br>
                            <br>

                    </div>
                   </div>
                    
                      
                        


                </form>
                <br>
                <br>
            </div> 
            <div class="col-md-2"></div>
            </div>
        </div>
    
</body>
</html>