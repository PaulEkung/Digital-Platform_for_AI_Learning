<?php
session_start();
function emptyInputs($fullname, $regno, $level, $email, $phone, $pwd_1, $pwd_2)
{
    $result = null;

    if(empty($fullname) || empty($regno) || 
    empty($level) || empty($email) || empty($phone) || empty($pwd_1) || empty($pwd_2))
    {
        $result = true;

    }else{
        $result = false;
    }
    return $result;
   
}

function check_Valid_Username($fullname)
{
    $result = null;
    if(!preg_match("/^[a-zA-Z0-9 ]*$/", $fullname))
    {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function checkEmail($email)
{
    $result = null;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function _pwd_match($pwd_1, $pwd_2)
{
    $result = null;
    if($pwd_1 !== $pwd_2)
    {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function checkUserExists($db_connect, $email)
{
    $result = null;
    $sql = "SELECT email FROM students WHERE email = ?;";
    $stmt = mysqli_stmt_init($db_connect);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        echo "<div class=\"alert alert-danger text-center\">Failed to connect!.</div>";
    }else{
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $rowCount = mysqli_stmt_num_rows($stmt);
        if($rowCount > 0)
        {
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }
     } 
function checkRegNumberExists($db_connect, $regno)
{
    $result = null;
    $sql = "SELECT reg_number FROM students WHERE reg_number = ?;";
    $stmt = mysqli_stmt_init($db_connect);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        echo "<div class=\"alert alert-danger text-center\">Failed to connect!.</div>";
    }else{
        mysqli_stmt_bind_param($stmt, "s", $regno);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $rowCount = mysqli_stmt_num_rows($stmt);
        if($rowCount > 0)
        {
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }
     } 

      function check_mobile_length($phone)
   {
    $result = null;
    if(strlen($phone) !== 11)
    {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
 }

      function check_password_length($pwd_1)
   {
    $result = null;
    if(strlen($pwd_1) < 6)
    {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
 }

  function insertData($db_connect, $fullname, $regno, $level, $email, $phone, $pwd_1)
 {
    $sql = "INSERT INTO `students`(student_name, reg_number, level, email, phone, password) VALUE(?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($db_connect);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        echo "<div class=\"alert alert-danger text-center\">Failed to connect</div>";
    }else{
        $hash_pass = password_hash($pwd_1, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssssss", $fullname, $regno, $level, $email, $phone, $hash_pass);
        mysqli_stmt_execute($stmt);
        header("Location: signin.php?signupSuccess");
    }
    
}

//Code to retrieve user's data from the database

function checkEmptyInput($regno, $password)
{
    $result = null;
    if(empty($regno) || empty($password))
    {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function fetchAdminLoginData($db_connect){
    if(isset($_POST["submit"])){
        $admin_id = $_POST["admin_id"];
        $pwd = $_POST["password"];
        if(empty($admin_id) || empty($pwd)){
            echo "<div class=' alert alert-danger offset-0 text-center'>Please provide admin Id and password</div>";

        }else{
            $query = "SELECT * FROM vlearning.administrator WHERE admin_id = ?";
            $stmt = mysqli_stmt_init($db_connect);
            if(!mysqli_stmt_prepare($stmt, $query)){
                die("Failed to connnect");
            }else{
                mysqli_stmt_bind_param($stmt, "s", $admin_id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if($result && mysqli_stmt_num_rows($stmt) === 0){

                    if($row = mysqli_fetch_assoc($result)){
                        $db_pwd = $row["password"];
                        $password_verify = password_verify($pwd, $db_pwd);
                        if($password_verify !== true){
                            echo "<div class='alert alert-danger offset-0 text-center'>Incorrect admin id or password provided</div>";
                        }else{
                            $_SESSION['sessionAdmin'] = $row['password'];
                            header("Location: admin.php");
                        }

        }else{
            echo "<div class='alert alert-danger offset-0 text-center'>Incorrect admin id or password provided</div>";
        }
    }
    }

        }
    }
}

function uploadTutorial($db_connect){
    if(isset($_POST["submit"]) && isset($_FILES["file"]["name"])){
        $week = $_POST["week"];
        $caption = $_POST["caption"];
        $material = $_FILES["file"]["name"];     
        $tmp_name = $_FILES["file"]["tmp_name"];  
        if(empty($week) || empty($caption) || empty($material)){

            echo "<div class=' alert alert-danger offset-0 text-center'>In valid form submission! All input fields are required.</div>";
        }else{
        $file_ex = pathinfo($material, PATHINFO_EXTENSION);
        $file_ex_to_lc = strtolower($file_ex);
        $allowed_exs = array('pdf','mp4', 'mov', 'mkv', 'avi', 'webm');
        if(!in_array($file_ex_to_lc, $allowed_exs)){
            echo "<div class=' alert alert-danger offset-0 text-center'>Invalid file type</div>";
        
        }else{
        $new_file_name = uniqid("$caption", true).'.'.$file_ex_to_lc;
        $file_upload_path = './tutorials/'.$new_file_name;

                $sql = $db_connect -> query("INSERT into `course`(week_label, course_caption, course_material) VALUES('$week', '$caption', '$new_file_name');");
                if($sql == true){
                    move_uploaded_file($tmp_name, $file_upload_path); 
                    // echo "<script>window.alert('Profile image updated successfully')<script>";
                    echo "<div class=' alert alert-success offset-0 text-center'>Tutorial uploaded succeefully</div>";

                }else{
                    echo "<div class=' alert alert-danger offset-0 text-center'>Failed to upload tutorial! Something went wrong. Please try again.</div>";
                  

                }
            }
        }
            }
        }

function updateTutorial($db_connect){
    if(isset($_POST["submit"]) && isset($_FILES["file"]["name"])){
        $id = $_POST['id'];
        $material = $_POST['material'];
        $update_week = $_POST["week"];
        $update_caption = $_POST["caption"];
        $update_material = $_FILES["file"]["name"];     
        $tmp_name = $_FILES["file"]["tmp_name"];  
        if(empty($update_week) || empty($update_caption) || empty($update_material)){

            header("Location:admin.php?invalidFormSubmission");
            
        }else{
        $file_ex = pathinfo($update_material, PATHINFO_EXTENSION);
        $file_ex_to_lc = strtolower($file_ex);
        $allowed_exs = array('pdf','mp4', 'mov', 'mkv', 'avi', 'webm');
        if(!in_array($file_ex_to_lc, $allowed_exs)){
            header("Location:admin.php?invalidFileType");
            
        
        }else{
        $new_file_name = uniqid("$update_caption", true).'.'.$file_ex_to_lc;
        $file_upload_path = './tutorials/'.$new_file_name;

        // Prepare the SQL statement to prevent SQL injection
        $stmt = $db_connect->prepare("UPDATE `course` SET week_label = ?, course_caption = ?, course_material = ? WHERE course_id = ?");
        $stmt->bind_param("ssss", $update_week, $update_caption, $new_file_name, $id);

        if ($stmt->execute()) {
            $path = "./tutorials/".$material;

            // Check if the old file exists before deleting
            if(file_exists($path)) {
                unlink($path);
            }else{
                header("Location:admin.php?updateFileErr");
            }
                
            move_uploaded_file($tmp_name, $file_upload_path); 
            header("Location:admin.php?updateSuccess");
            
            
        }else{
            
            header("Location:admin.php?updateFailure");
                  

                }
            }
        }
            }
        }

function resetPassword($db_connect){
    if(isset($_POST['confirm'])){
        $regNo = $_POST["registration_number"];
        if(empty($regNo)){
            echo "<div class=' alert alert-danger offset-0 text-center'>Invalid form submission!</div>";
        }else{
        $query = $db_connect->query("SELECT reg_number FROM students WHERE reg_number = '$regNo';");
        if($query->num_rows > 0){
            $row = $query->fetch_assoc();
            $_SESSION['reg'] = $row['reg_number'];
            header("Location: new_password.php");   

        }else{
            echo "<div class=' alert alert-danger offset-0'>The registration number you provided is unrecognized.</div>";
        }
    }
}
}      

function setPwd($db_connect){
    if(isset($_POST['setPwd'])){
        $r_reg = $_POST["reg_number"];
        $pwd1 = $_POST["pwd1"];
        $pwd2 = $_POST["pwd2"];
        if(empty($pwd1) || empty($pwd2)){
            echo "<div class=' alert alert-danger offset-0 text-center'>Invalid form submission!</div>";
        }elseif($pwd1 !== $pwd2){
            echo "<div class=' alert alert-danger offset-0 text-center'>The two passwords did not match</div>";
        }else{
            $hash_new_pwd = password_hash($pwd1, PASSWORD_DEFAULT);
            $stmt = $db_connect->prepare("UPDATE `students` SET password = ? WHERE reg_number = ?");
            $stmt->bind_param("ss", $hash_new_pwd, $r_reg);
    
            if ($stmt->execute()) {
                header("Location: signin.php?recoverySuccess");
            }else{
                echo "<div class='alert alert-danger offset-0 text-center'>Failed to handle your request! Please contact system administrator</div>";
            }

        }
    }
}

function updateAdminUsername($db_connect){
    if(isset($_POST["update_username"])){
        $current_username = $_POST["current_username"];
        $new_username = $_POST["new_username"];
        
        if(empty($current_username) || empty($new_username)){
            echo "<script>window.alert('Error handling request. Please click the drop down to see and fix any errors.')</script>";
            
            echo "<div class=' alert alert-danger offset-0 text-center'>Invalid form submission. Please fill all inputs</div>";

        }else{
            $q1 = $db_connect->query("SELECT * FROM vlearning.administrator;");
            if($q1 -> num_rows > 0){
            $row = $q1->fetch_assoc();
            $db_data = $row["admin_id"];
            }
            if($current_username !== $db_data){
            echo "<script>window.alert('Error handling request. Please click the drop down to see and fix any errors.')</script>";
            
            echo "<div class=' alert alert-danger offset-0 text-center'>The current username provided is incorrect.</div>";
        }else{
        // Prepare the SQL statement to prevent SQL injection
        $stmt = $db_connect->prepare("UPDATE `administrator` SET admin_id = ? WHERE admin_id = ?");
        $stmt->bind_param("ss", $new_username, $current_username);
        if ($stmt->execute()) {
            echo "<script>window.alert('Username updated successfully')</script>";
            
            echo "<div class=' alert alert-success offset-0 text-center'>Username updated successfully</div>";
        }else{
            echo "<script>window.alert('Error handling request. Please click the drop down to see and fix any errors.')</script>";
            
            echo "<div class=' alert alert-danger offset-0 text-center'>Failed to update username!Something went wrong. Please try again later</div>";
        }
        }
    }
}
}

function updateAdminPassword($db_connect){
    if(isset($_POST["update_password"])){
        $current_pwd = $_POST["current_password"];
        $new_pwd = $_POST["new_password"];
        $confirm_new_pwd = $_POST["confirmNewPassword"];
        
        if(empty($current_pwd) || empty($new_pwd) || empty($confirm_new_pwd)){
            echo "<script>window.alert('Error handling request. Please click the drop down to see and fix any errors.')</script>";
            
            echo "<div class=' alert alert-danger offset-0 text-center'>Invalid form submission. Please fill all inputs</div>";

        }else{
            $q1 = $db_connect->query("SELECT password FROM vlearning.administrator;");
            if($q1 == true){
            $row = $q1->fetch_assoc();
            $db_data = $row["password"];
            $password_verify = password_verify($current_pwd, $db_data);
            }
            if($password_verify !== true){
            echo "<script>window.alert('Error handling request. Please click the drop down to see and fix any errors.')</script>";
            
            echo "<div class=' alert alert-danger offset-0 text-center'>The current password provided is incorrect.</div>";
        }elseif($new_pwd !== $confirm_new_pwd){
            echo "<script>window.alert('Error handling request. Please click the drop down to see and fix any errors.')</script>";
            
            echo "<div class=' alert alert-danger offset-0 text-center'>The new password did not match the confirm password.</div>";

        }else{
        // Prepare the SQL statement to prevent SQL injection
        $hash_pwd = password_hash($new_pwd, PASSWORD_DEFAULT);
        $stmt = $db_connect->prepare("UPDATE `administrator` SET password = ?");
        $stmt->bind_param("s", $hash_pwd);
        if ($stmt->execute()) {
            echo "<script>window.alert('password updated successfully')</script>";
            
            echo "<div class=' alert alert-success offset-0 text-center'>Password updated successfully</div>";
        }else{
            echo "<script>window.alert('Error handling request. Please click the drop down to see and fix any errors.')</script>";
            
            echo "<div class=' alert alert-danger offset-0 text-center'>Failed to update password!Something went wrong. Please try again later</div>";
        }
        }
    }
}
}

function updateStudentPassword($db_connect){
    if(isset($_POST["update_password"])){
        $regForPwd = $_POST['regForPwd'];
        $current_pwd = $_POST["current_password"];
        $new_pwd = $_POST["new_password"];
        $confirm_new_pwd = $_POST["confirmNewPassword"];
        
        if(empty($current_pwd) || empty($new_pwd) || empty($confirm_new_pwd)){
            echo "<script>window.alert('Error handling request. Please click the drop down to see and fix any errors.')</script>";
            
            echo "<div class=' alert alert-danger offset-0 text-center'>Invalid form submission. Please fill all inputs</div>";

        }else{
            $q1 = $db_connect->query("SELECT password FROM vlearning.students;");
            if($q1 == true){
            $row = $q1->fetch_assoc();
            $db_data = $row["password"];
            $password_verify = password_verify($current_pwd, $db_data);
            }
            if($password_verify !== true){
            echo "<script>window.alert('Error handling request. Please click the drop down to see and fix any errors.')</script>";
            
            echo "<div class=' alert alert-danger offset-0 text-center'>The current password provided is incorrect.</div>";
        }elseif($new_pwd !== $confirm_new_pwd){
            echo "<script>window.alert('Error handling request. Please click the drop down to see and fix any errors.')</script>";
            
            echo "<div class=' alert alert-danger offset-0 text-center'>The new password did not match the confirm password.</div>";

        }else{
        // Prepare the SQL statement to prevent SQL injection
        $hash_pwd = password_hash($new_pwd, PASSWORD_DEFAULT);
        $stmt = $db_connect->prepare("UPDATE `students` SET password = ? WHERE reg_number = ?");
        $stmt->bind_param("ss", $hash_pwd, $regForPwd);
        if ($stmt->execute()) {
            echo "<script>window.alert('password updated successfully')</script>";
            
            echo "<div class=' alert alert-success offset-0 text-center'>Password updated successfully</div>";
        }else{
            echo "<script>window.alert('Error handling request. Please click the drop down to see and fix any errors.')</script>";
            
            echo "<div class=' alert alert-danger offset-0 text-center'>Failed to update password!Something went wrong. Please try again later</div>";
        }
        }
    }
}
}

function updateStudentProfile($db_connect){
    if(isset($_POST["update_profile"])){
        $reg_num = $_POST['reg'];
        $name = $_POST['name'];
        $std_level = $_POST['level'];
        $std_email = $_POST['email'];
        $tel = $_POST['phone'];
        if(empty($name) || empty($std_level) || empty($std_email) || empty($tel)){
            echo "<script>window.alert('Error handling request. Please click the drop down to see and fix any errors.')</script>";
            
            echo "<div class=' alert alert-danger offset-0 text-center'>Invalid form submission! No field can be left empty</div>";
        }else{
            $stmt = $db_connect->prepare("UPDATE `students` SET reg_number = ?, student_name = ?, level = ?, email = ?, phone = ? WHERE students.reg_number = ?");
            $stmt->bind_param("ssssss", $reg_num, $name, $std_level, $std_email, $tel, $reg_num);
        if ($stmt->execute()){

            echo "<script>window.alert('profile updated successfully. You will need to re-login to activate new profile data')</script>";
            
            echo "<div class=' alert alert-success offset-0 text-center'>Profile updated successfully! You will need to re-login to activate new profile data</div>";
        }else{
            echo "<script>window.alert('Error handling request.  Please click the drop down to see and fix any errors. ')</script>";
            
            echo "<div class=' alert alert-danger offset-0 text-center'>Failed to update profile!. Something went wrong. If this continues, please contact system administrator</div>";
        }


        }
    }
}

function studentPostRequest($db_connect){
    if(isset($_POST['send'])){
        $post_id = $_POST['student_id'];
        $message = $_POST['message'];
        if(empty($message) || empty($post_id)){
            echo "<script>window.alert('Invalid form submission. Please type something')</script>";
        }else{
            $stmt = $db_connect->prepare("INSERT INTO chat(request, student_id) VALUE(?,?)");
            $stmt->bind_param("ss", $message, $post_id);
            if($stmt->execute()){
                $getChat = $db_connect->query("SELECT request, chat_id FROM chat WHERE student_id = '$post_id' and request = '$message';");
                if($getChat == true){
                    while($row = $getChat->fetch_assoc()){
                        $request = $row['request'];
                        $chat_id = $row['chat_id'];
                        echo "
                                <div class='container alert alert-light border border-0'>
                                <span class='fw-bold lead'>You</span>
                                <abbr title='Delete message'>
                                <a href='delete.php?message=$chat_id' class='float-end bi bi-trash-fill text-danger fs-5' onclick='return confirm(\"Are you sure you want to delete this chat?\")'></a>
                                </abbr>
                                <br>

                                    $request
                                </div>
                                ";
                    }
                }
            }else{
                echo "<script>window.alert('Error handling request. Something went wrong. If this continues, please contact system administrator ')</script>";
            }

        }
    }
}

function uploadProfileImg($db_connect){
    if(isset($_POST["uploadProfileImg"]) && isset($_FILES["img"]["name"])){
        $reg = $_POST['reg'];
        $student = $_POST['student'];
        $old_img = $_POST['oldImg'];
        $img = $_FILES["img"]["name"];     
        $tmp_name = $_FILES["img"]["tmp_name"];  
        if(empty($img)){

            echo "<script>window.alert('Error handling request. Please click the image icon to see and fix any errors.')</script>";
            
            echo "<div class=' alert alert-danger offset-0'>Invalid form submission. Please choose an image to upload.</div>";
            
        }else{
        $file_ex = pathinfo($img, PATHINFO_EXTENSION);
        $file_ex_to_lc = strtolower($file_ex);
        $allowed_exs = array('jpeg','jpg', 'png', 'jfif');
        if(!in_array($file_ex_to_lc, $allowed_exs)){
            echo "<script>window.alert('Error handling request. Please click the image icon to see and fix any errors.')</script>";
            
            echo "<div class=' alert alert-danger offset-0'>Invalid file type. Only images with jpeg, png, jpj and jfif extensions are allowed.</div>";
            
        }else{
            
        $new_image_name = uniqid("$student", true).'.'.$file_ex_to_lc;
        $file_upload_path = './uploads/'.$new_image_name;
        // Prepare the SQL statement to prevent SQL injection
        $stmt = $db_connect->prepare("UPDATE `students` SET profile_img = ? WHERE reg_number = ?");
        $stmt->bind_param("ss", $new_image_name, $reg);

        if($stmt->execute()){

            $path = "./uploads/".$old_img;
            
            // Check if the old file exists before deleting
            if(!file_exists($path)){
                
                move_uploaded_file($tmp_name, $file_upload_path); 

                }else{
                    
               unlink($path);
               move_uploaded_file($tmp_name, $file_upload_path); 
                }
                
            echo "<script>window.alert('Request handled successfully! A login may be required to reflect changes.')</script>";
            
            echo "<div class=' alert alert-success offset-0'>Request handled successfully! A login may be required to reflect changes.</div>";
            
            
        }else{
            
            echo "<script>window.alert('Failed to handle request. if this continues,please contact system administrator.')</script>";
            
            echo "<div class=' alert alert-danger offset-0'>Failed to handle request. if this continues,please contact system administrator.</div>";;
                  

                }
            }
        }
     }
}

function fetchData($db_connect, $regno, $password)
{
    $sql = "SELECT * FROM students where reg_number = ?";
    $stmt = mysqli_stmt_init($db_connect);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        die("Failed to connect to database");
    }else{

        mysqli_stmt_bind_param($stmt, "s", $regno);
        mysqli_stmt_execute($stmt);
       $result = mysqli_stmt_get_result($stmt);
       if($result && mysqli_stmt_num_rows($stmt) === 0){
        if($row = mysqli_fetch_assoc($result)){
        $pwd = $row["password"];
        $r_reg_number = $row["reg_number"];
        $password_verify = password_verify($password, $pwd);
            if($password_verify !== true or $regno !== $r_reg_number){
            echo "<div class=' alert alert-danger offset-0 text-center'>Incorrect password or registration number provided</div>";

        }else{

            $_SESSION['id'] = $row["id"];

            $_SESSION['sessionRegNumber'] = $row["reg_number"];
            $_SESSION['sessionName'] = $row["student_name"];
            header("Location: dashboard.php");
        }
    }else{
        echo "<div class=' alert alert-danger offset-0 text-center shadow'>Incorrect password or registration number provided</div>";
    
    }

    
    
}

}
mysqli_stmt_close($stmt);
mysqli_close($db_connect);
    
} 
    