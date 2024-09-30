<?php
if(isset($_GET['user'])){
    session_start();
    session_unset();
    session_destroy();
    header("Location: signin.php");

}else{
    session_start();
    session_unset();
    session_destroy();
    header("Location: adminLogin.php");
}