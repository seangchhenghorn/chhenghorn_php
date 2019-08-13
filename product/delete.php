<?php
$product_code=$_GET["product_code"];
// Process delete operation after confirmation
if(isset($_POST["product_code"]) && !empty($_POST["product_code"])){
    // Include config file
    require_once "config.php";
    
    // Prepare a delete statement
    $sql = "DELETE FROM product WHERE product_code = :product_code";
    
    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":product_code", $param_product_code);
        
        // Set parameters
        $param_product_code = trim($_POST["product_code"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            // Records deleted successfully. Redirect to landing page
            // header("location: index.php");
            header("location: ../home.php?page=product&frm=index");
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
    if(empty(trim($_GET["product_code"]))){
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
                    <form action="product/delete.php" method="post">
                        <div>
                            <input type="hidden" name="product_code" value="<?php echo trim($_GET["product_code"]); ?>"/>
                            <p>Are you sure you want to delete this record?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="home.php?page=product&frm=index" class="btn btn-primary">No</a>
                            </p>
                        </div>                        
                    </form>
                </div>
            </div>        
        </div>
    </div>