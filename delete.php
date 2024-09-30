<?php 
include 'dbConnect.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql1 = $db_connect-> query("SELECT course_material FROM vlearning.course WHERE course_id = '$id';");
    if($sql1->num_rows > 0){
        $row = $sql1->fetch_assoc();
        $material = $row['course_material'];
        $path = "./tutorials/".$material;

        $sql2 = $db_connect-> query("DELETE FROM vlearning.course WHERE course_id = '$id';");
        if($sql2 == true){
            if(file_exists($path)){
                unlink($path);
            }
            header("Location: admin.php?deleted");
        }
    }
}elseif(isset($_GET['student_id'])){
        $student_id = $_GET["student_id"];
        $retrieve_query = $db_connect -> query("SELECT * FROM `students` WHERE student_id = '$student_id';" );
        if($retrieve_query -> num_rows > 0){
            $r = $retrieve_query -> fetch_assoc();
            $del_img = $r["profile_img"];
            if($del_img == ""){
                $sql = $db_connect->query("DELETE FROM `students` WHERE `students`.`student_id` = '$student_id'; ");
                if($sql){
                    header("Location: admin.php?studentDeleted");
                }
    
                
            }else{
                $path = "./uploads/$del_img";
                $sql = $db_connect->query("DELETE FROM `students` WHERE `student_id` = '$student_id'; ");
                if($sql){
                    unlink($path);
                    header("Location: admin.php?studentDeleted");
    
                }
                    
                }
            }
            
    

}elseif(isset($_GET['message'])){
$chat_id = $_GET['message'];
    $sq3 = $db_connect-> query("DELETE FROM vlearning.chat WHERE chat_id = '$chat_id';");
    if($sq3 == true){
        header("Location: request.php?deleted");
    }

}