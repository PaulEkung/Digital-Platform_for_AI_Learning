<?php 
session_start();
if(!isset($_SESSION['sessionAdmin'])){

    header("Location: adminLogin.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Response</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            <a href="admin.php" class="bi bi-arrow-left-circle fs-1 text-secondary m-4 position-sticky sticky-top"></a>
            </div>
            <div class="col-md-5">
                <form action="response.php" method="post" class="p-5 shadow-lg bg-white rounded-4">
                    <h3>Respond to this chat</h3>
                    <hr>
                    <?php
                    include 'dbConnect.php';
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];

                    }
                    if(isset($_POST['submit'])){
                        $chat_id = $_POST['id'];
                        $reply = $_POST['response'];
                        if(empty($reply)){
                            header("Location: admin.php?invalidSubmission");
                        }else{
                            $stmt = $db_connect->prepare("UPDATE `chat` SET response = ? WHERE chat.chat_id = ?");
                            $stmt->bind_param("ss", $reply, $chat_id);
                            if ($stmt->execute()){
                            header("Location: admin.php?responseEgg");

                                }else{
                            header("Location: admin.php?responseErr");

                                }
                        }
                    }
                    ?>
                    <input type="hidden" name='id' value="<?php echo $id ?>">
                    <textarea name="response" id="" rows="5" cols="10" class="form-control form-control-lg" placeholder="Write your reply here..."></textarea>
                    <br>
                    <input type="submit" class="btn btn-outline-dark border border-3 border-dark btn-lg w-100 p-3" name="submit">
                    

                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>