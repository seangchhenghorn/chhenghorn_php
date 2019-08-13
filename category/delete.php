<?php
$category_id=$_GET["category_id"];
// Process delete operation after confirmation
if(isset($_POST["category_id"]) && !empty($_POST["category_id"])){
    // Include config file
    require_once "config.php";
    
    // Prepare a delete statement
    $sql = "DELETE FROM category WHERE category_id = :category_id";
    
    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":category_id", $param_category_id);
        
        // Set parameters
        $param_category_id = trim($_POST["category_id"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            // Records deleted successfully. Redirect to landing page
            // header("location: index.php");
            header("location: ../home.php?page=category&frm=index");
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
    if(empty(trim($_GET["category_id"]))){
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
                    <form action="category/delete.php" method="post">
                        <div>
                            <input type="hidden" name="category_id" value="<?php echo trim($_GET["category_id"]); ?>"/>
                            <p>Are you sure you want to delete this record?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="home.php?page=category&frm=index" class="btn btn-primary">No</a>
                            </p>
                        </div>                        
                    </form>
                </div>
            </div>        
        </div>
    </div>