<?php
include "dbConnect.php";
include "views.php";
if(isset($_SESSION['reg'])){
    $reg = $_SESSION['reg'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set password</title>
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


                        <i class="fs-3 offset-3 fw-bold lead bg-light p-3 rounded-5">
                            1
                            
                    </i>
                    <i class="fs-3 offset-3 fw-bold text-light lead bg-secondary p-3 rounded-5">
                        2
                        
                    </i>
                <br>
                <br>
                    </div>
                    <form action="new_password.php" method="post" class="p-5 bg-white shadow-lg">
                        <p class="bg-warning-subtle p-2">
                            We recommend using passwords that are easy to remember.
                            <b>You can only be allowed to request a recovery password twice.</b>
                        </p>
                        <?php 
                        $getRoot = setPwd($db_connect);
                        ?>

                    <input type="hidden" name="reg_number" id="" class="form-control form-control-lg p-3" value='<?php echo $reg?>'>
                    <input type="password" name="pwd1" id="" class="form-control form-control-lg p-3" placeholder="Enter new password">
                    <br>

                    <input type="password" name="pwd2" id="" class="form-control form-control-lg p-3" placeholder="Confirm password">
                    <br>
                    <input type="submit" name="setPwd" class="btn btn-outline-primary border border-2 border-primary p-3 btn-lg w-100">
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>