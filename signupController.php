<?php

if(isset($_POST["submit"]))
{
    $fullname = $_POST["fullname"];
    $regno = $_POST["regnumber"];
    $level = $_POST["level"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $pwd_1 = $_POST["password1"];
    $pwd_2 = $_POST["password2"];

    if(emptyInputs($fullname, $regno, $level, $email , $phone, $pwd_1, $pwd_2) !== false)
    {
        echo "<div class=\"alert alert-danger text-center\">Please fill all inputs with valid information</div>";
        
    }
    elseif(check_Valid_Username($fullname) !== false)
    {
        echo "<div class=\"alert alert-danger text-center\">Invalid username format.</div>";
        
    }elseif(checkEmail($email) !== false)
    {
        echo "<div class=\"alert alert-danger text-center\">Invalid email address format.</div>";
        
    }elseif(check_mobile_length($phone) !== false)
    {
        echo "<div class=\"alert alert-danger text-center\">Invalid mobile number.</div>";
        
    }
    elseif(checkUserExists($db_connect, $email) !== false)
    {
        echo "<div class=\"alert alert-danger text-center\">Email address '$email' already exist!</div>";
        
    }elseif(checkRegNumberExists($db_connect, $regno) !== false){

        echo "<div class=\"alert alert-danger text-center\">The registration number '$regno' already exists</div>";

    }elseif(_pwd_match($pwd_1, $pwd_2) !== false){
        echo "<div class=\"alert alert-danger text-center\">The two passwords did not match</div>";

    }elseif(check_password_length($pwd_1) !== false){
        echo "<div class=\"alert alert-danger text-center\">Password is too short! Password character length must be at least 6 digits or longer</div>";

    }else{

        // if($phone[4] == "0")
        // {
        //     $phone = $phone - $phone[4];
        // }

        insertData($db_connect, $fullname, $regno, $level, $email, $phone, $pwd_1);
        
    }
}