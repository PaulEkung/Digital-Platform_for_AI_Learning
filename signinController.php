<?php
if(isset($_POST["submit"]))
{
    $regno = $_POST["reg_number"];
    $password = $_POST["password"];
    if(checkEmptyInput($regno, $password) !== false)
    {
        echo "<div class=\"alert alert-danger text-center\">Please fill in all inputs.</div>";

    }else{
        fetchData($db_connect, $regno, $password);
    }
}