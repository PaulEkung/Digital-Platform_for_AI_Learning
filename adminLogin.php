<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/bootstrap-icons.css">


</head>
<body class="bg-light">
<section>
        <header>
            <nav class="navbar navbar-expand p-4 bg-light-subtle">
            <h2 class="fw-bolder">Hello! Admin</h2>
                
<menu class="collapse navbar-collapse" style="float: left;">
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
                <form action="adminLogin.php" method="POST" class="bg-white p-5 shadow-lg rounded-4">
                    <h2>
                        Tutor Login
                    </h2> 
                    <hr class="fw-bold text-primary">
                    
                    <!-- paste php code here -->
                    <?php
                    require 'dbConnect.php';
                    require 'views.php';

                    $call = fetchAdminLoginData($db_connect)
                    ?>

                    
                    <div class="mb-3">
                        <label for="exampleInputId" class="form-label">Enter Tutor Id</label>
                        <input type="text" class="form-control form-control-lg p-3 border border-2" placeholder="xxxxxxxx" id="customInputId" aria-describedby="idHelp" name="admin_id">
                    </div>
                    <div class="mb-3">
                        <label for="customInputPassword" class="form-label">Password</label>
                        <input type="password" class="form-control form-control-lg p-3 border border-2" placeholder="xxxxxxxx" id="exampleInputPassword" aria-describedby="passwordHelp" name="password">
                        
                    </div>     
                        <br>
                            <input type="submit" name="submit" id="submit" class="btn btn-outline-dark w-100 btn-lg rounded-2 border border-dark border-3 p-3">
                            

                </form>
                <br>
                <br>
            </div> 
            <div class="col-md-4"></div>
            </div>
        </div>

</body>
</html>