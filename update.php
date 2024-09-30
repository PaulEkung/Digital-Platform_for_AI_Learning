<?php require 'dbConnect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Tutorial</title>
    
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">


</head>
<body>

    <br>
    
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="admin.php" class="bi bi-arrow-left-circle fs-1 p-2 sticky-top text-secondary"></a>
            </div>
  

            <div class="col-md-5">
            <div class="display">
                
                </div>  
                <form action="update.php" method="POST" enctype="multipart/form-data" class="bg-white p-5 shadow-lg rounded-4">
                    <?php
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $sql = $db_connect-> query("SELECT course_id, week_label, course_caption, course_material FROM course WHERE course_id = '$id'");
                        if($sql-> num_rows > 0){
                            $row = $sql-> fetch_assoc();
                            $id = $row['course_id'];
                            $week_label = $row['week_label'];
                            $week_caption = $row['course_caption'];
                            $material = $row['course_material'];
                        
                        }
                    }
                    ?>
                            <h2>
                        Update <?php echo $week_label ?>  Tutorial
                    </h2> 
                    <br>
                    <?php 
                    
                        
                        require 'views.php';
                        $call = updateTutorial($db_connect);

                        
                        ?>
                    
                    <div class="mb-3">
                        <input type="hidden" name='id' value="<?php echo $id ?>">
                        <input type="hidden" name='material' value="<?php echo $material ?>">
                        <label for="week" class="form-label">Week Label</label>
                        <input type="text" class="form-control form-control-lg p-3 border border-2" id="customInputWeek" aria-describedby="weekHelp" name="week" value="<?php echo $week_label ?>">
                        
                    </div>
                    <div class="mb-3">
                        <label for="customInputCaption" class="form-label">Week Caption</label>
                        <input type="text" class="form-control form-control-lg p-3 border border-2" placeholder="Caption for week..." id="exampleInputCaption" aria-describedby="captionHelp" name="caption" value="<?php echo $week_caption ?>">
                        
                    </div>     
                    <div class="mb-3">
                        <label for="customInputFile" class="form-label">Update material</label>
                        <input type="file" class="form-control form-control-lg p-3 border border-2" placeholder="Caption fore week..." id="exampleInputFile" aria-describedby="fileHelp" name="file">
                        
                    </div>     
    
                        <br>
                            <input type="submit" name="submit" id="submit" class="btn btn-outline-primary w-100 btn-lg rounded-2 border border-primary border-3 p-3" value="Update Tutorial">

                </form>
                <br>
                <br>
                    
                    
            </div> 
            <div class="col-md-4"></div>
            </div>
        </div>

</body>
</html>