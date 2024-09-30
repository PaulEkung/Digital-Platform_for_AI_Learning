<?php
include "dbConnect.php";
include "views.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Account</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light-subtle">
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-5">
                <div class="container bg-light">


                        <i class="fs-3 text-light offset-3 fw-bold lead bg-secondary p-3 rounded-5">
                            1
                            
                    </i>
                    <i class="fs-3 offset-3 fw-bold lead bg-light p-3 rounded-5">
                        2
                        
                    </i>
                <br>
                <br>
                    </div>
                    <form action="account_verify.php" method="post" class="p-5 bg-white shadow-lg">
                        <?php
                        $getRoot = resetPassword($db_connect);
                        ?>
                    
                    <input type="text" name="registration_number" id="reg" class="form-control form-control-lg p-3" placeholder="Enter your registration number">
                    <br>
                    <input type="submit" name="confirm" class="btn btn-outline-primary border border-2 border-primary p-3 btn-lg w-100">
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>