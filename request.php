<?php
include 'dbConnect.php';
include 'views.php';
if(isset($_SESSION['sessionRegNumber'])){
    $reg = $_SESSION['sessionRegNumber'];
    $q = $db_connect->query("SELECT * FROM students WHERE reg_number = '$reg';");
    if($q->num_rows > 0){
        $row = $q->fetch_assoc();
       $id = $row['student_id'];

}
}else{

        header("Location: signin.php");
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Assistance</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand p-4 bg-light-subtle sticky-top">
        <h2 class="fw-bolder ">
            Get Assistance
            
            <p class="fw-normal fs-6">Need any help? Ask a question and get response immediately</p>
        </h2>

        <ul class="nav ms-auto">

            <a href="dashboard.php" class="m-3 text-dark">Back to home</a>
        </ul>
      </nav>
    <br>
    <section>

        <div class="container">
            <div class="row">
                
                    <div class="col-md-6 bg-light p-3">
                        <header class="fw-bold text-center">
                            Your messages appear here
                        </header>
                        <br>
                        <?php
                        $q1 = $db_connect->query("SELECT request, chat_id FROM chat WHERE student_id = '$id' ORDER BY chat_id ASC;");
                        if($q1->num_rows > 0){
                            while($row = $q1->fetch_assoc()){
                                $request = $row['request'];
                                $chat_id = $row['chat_id'];
                                ?>
                                <div class='container alert alert-light border border-0'>
                                <span class='fw-bold lead'>You</span>
                                <abbr title='Delete message'>
                                <a href='delete.php?message=<?php echo $chat_id ?>' class='float-end bi bi-trash-fill text-danger fs-5' onclick="return confirm('Are you sure you want yo delete this chat?')"></a>
                                </abbr>
                                <br>
                                
                                
                                <?php echo $request ?>
                                </div>
                                <?php
                            
                                
                                
                            }
                            
                        }
                        
                        $send = studentPostRequest($db_connect);
                    ?>
                        
                    </div>
                    <div class="col-md-6 bg-light-subtle p-3">
                        <header class="fw-bold text-center">

                            Replies to your messages appear here
                        </header>
                        <br>
                        <?php
                        $q1 = $db_connect->query("SELECT response, chat_id FROM chat WHERE student_id = '$id' ORDER BY chat_id ASC;");
                        if($q1->num_rows > 0){
                            while($row = $q1->fetch_assoc()){
                                $response = $row['response'];
                                $chat_id = $row['chat_id'];
                                ?>
                                <div class='container bg-white p-3 border border-0'>
                                <?php
                                 if($response != ""){
                                echo "
                                <span class='fw-bold lead'>Tutor</span>
                                
                                <br>
                                
                                $response
                                
                        
                                ";
                                 }else{
                                    echo null;
                                    }
                                  ?>
                                </div>
                                <br>
                                <?php
                            
                                
                                
                            }
                            
                        }
                        
                
                    ?>
                    </div>
                    <br>
                    <br>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
    
            <div class="container sticky-bottom w-50">
                <br>
                <br>
                <br>
                <br>
                <?php
                    $query = $db_connect->query("SELECT student_id FROM students WHERE reg_number = '$reg';");
                    if($query->num_rows > 0){
                        $row = $query->fetch_assoc();
                        $id = $row['student_id'];
                    }
                    ?>
                            
                            <form action="request.php" method="post">
                        
                                
                                <input type="hidden" name="student_id" value="<?php echo $id ?>">
                                <textarea name="message" id="" class="form-control form-control-lg border border-3" rows="4" cols="10" placeholder="What do have in mind?..."></textarea>
                                <br>
                                <button type="submit" name="send" id="#" class="btn btn-outline-dark border border-0 bi bi-send fs-2 position-absolute bg-secondary text-light" style="margin-top:-28%;margin-left:92%"></button>
                            </form>
                        </div>
                    </section>
                    <?php
                    if(isset($_GET["deleted"])){
                        echo "<script>window.alert('Chat deleted successfully!')</script>";

                    }
                    ?>
                    </body>
                    </html>