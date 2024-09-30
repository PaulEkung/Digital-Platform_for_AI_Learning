<?php 
require 'dbConnect.php';
require 'views.php';
if(!isset($_SESSION['sessionAdmin'])){

    header("Location: adminLogin.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    
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
                <a href="admin.php" class="bi bi-arrow-left text-light fs-3 bg-secondary p-2 sticky-top"></a>
            </div>
  

            <div class="col-md-5">
            <div class="display">
                
                </div>  
                <form action="upload.php" method="POST" enctype="multipart/form-data" class="bg-white p-5 shadow-lg rounded-4">
                    
                    
                    <h2>
                        Upload A New Tutorial
                    </h2> 
                    <br>
                    <?php 
                    
                        
                        $call = uploadTutorial($db_connect);

                        
                        ?>
                    
                    <div class="mb-3">
                        <label for="week" class="form-label">Week Label</label>
                        <select type="text" class="form-control form-control-lg form-select p-3 border border-2" id="customInputWeek" aria-describedby="weekHelp" name="week">
                        <option value="Week 1">Week 1</option>
                        <option value="Week 2">Week 2</option>
                        <option value="Week 3">Week 3</option>
                        <option value="Week 4">Week 4</option>
                        <option value="Week 5">Week 5</option>
                        <option value="Week 6">Week 6</option>
                        <option value="Week 7">week 7</option>
                        <option value="Week 8">Week 8</option>
                        <option value="Week 9">Week 9</option>
                        <option value="Week 10">Week 10</option>
                        <option value="Week 11">Week 11</option>
                        <option value="Week 12">Week 12</option>
                        
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="customInputCaption" class="form-label">Week Caption</label>
                        <input type="text" class="form-control form-control-lg p-3 border border-2" placeholder="Caption for week..." id="exampleInputCaption" aria-describedby="captionHelp" name="caption">
                        
                    </div>     
                    <div class="mb-3">
                        <label for="customInputFile" class="form-label">Upload material</label>
                        <input type="file" class="form-control form-control-lg p-3 border border-2" placeholder="Caption fore week..." id="exampleInputFile" aria-describedby="fileHelp" name="file">
                        
                    </div>     
    
                        <br>
                            <input type="submit" name="submit" id="submit" class="btn btn-outline-dark w-100 btn-lg rounded-2 border border-dark border-3 p-3" value="Upload Tutorial">

                </form>
                <br>
                <br>
            </div> 
            <div class="col-md-4"></div>
            </div>
        </div>

</body>
</html>