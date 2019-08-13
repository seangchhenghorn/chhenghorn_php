<?php
$stu_id=$_GET["stu_id"];
// Process delete operation after confirmation
if(isset($_POST["stu_id"]) && !empty($_POST["stu_id"])){
    // Include config file
    require_once "config.php";
    
    // Prepare a delete statement
    $sql = "DELETE FROM students WHERE stu_id = :stu_id";
    
    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":stu_id", $param_stu_id);
        
        // Set parameters
        $param_stu_id = trim($_POST["stu_id"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            // Records deleted successfully. Redirect to landing page
            // header("location: index.php");
            header("location: ../home.php?page=students&frm=index");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    // unset($stmt);
    
    // Close connection
    // unset($pdo);
} else{
    // Check existence of id parameter
    if(empty(trim($_GET["stu_id"]))){
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Delete Record</h1>
                    </div>
                    <form action="students/delete.php" method="post">
                        <div>
                            <input type="hidden" name="stu_id" value="<?php echo trim($_GET["stu_id"]); ?>"/>
                            <p>Are you sure you want to delete this record?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="home.php?page=students&frm=index" class="btn btn-primary">No</a>
                            </p>
                        </div>                        
                    </form>
                </div>
            </div>        
        </div>
    </div>