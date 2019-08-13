<?php
// Initialize the session
// session_start();
date_default_timezone_set("Asia/Phnom_Penh");
include_once('config.php');
$title=$detail=$category_id=$create_id=$filename="";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Upload Image		
						
    // Check if file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
				
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
				
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
				
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("upload/" . $filename)){
                echo $filename . " is already exists.";
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $filename);
            // echo "Your file was uploaded successfully.";
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }
    $title=$_POST['title'];
    $detail=$_POST['detail'];
    $category_id=$_POST['category_id'];
    $photo=$filename;
    $today = date("Y-m-d h:i:s");
    $create_id= $_POST['create_id'];
    $status=1;
   
    // echo $title ." - ". $detail ." - ". $category_id;
    // Prepare an insert statement
    $sql = "INSERT INTO article (category_id, title,detail,photo,created_by,created_date,status) 
                        VALUES (:category_id, :title,:detail,:photo,:created_by,:created_date,:status)";
 
    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":category_id", $category_id);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":detail", $detail);
        $stmt->bindParam(":photo", $photo);
        $stmt->bindParam(":created_by", $create_id);
        $stmt->bindParam(":created_date", $today);
        $stmt->bindParam(":status", $status);
      
                 
            
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            // Records created successfully. Redirect to landing page
            header("location: ../home.php?page=article&frm=index");
            exit();
            // echo "Hello Success !";
        } else{
            echo "Something went wrong. Please try again later.";
        }
    }
         
    // Close statement
    // unset($stmt);
}
?>


<h3>Create Article</h3>

<form action="article/create.php" method="post" class="needs-validation" novalidate enctype="multipart/form-data">

    <input type="hidden" value="<?php echo $_SESSION["username"]; ?>" name="username">
    <div class="form-group">
        <label for="cname">Title:</label>
        <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
    </div>

    <div class="form-group">
    <label for="comment">Detail:</label>
    <textarea class="form-control" rows="5" id="detail" name="detail"></textarea>
    </div>

    <div class="form-group">
    <label for="sel1">Category:</label>
    <?php
        // Attempt select query execution
        $sql = "SELECT * FROM category";
        $result = $pdo->query($sql);
        if($result){
        if($result->rowCount() > 0){
    ?>
    <select class="form-control" id="sel1" name="category_id">
        <?php
            while($row = $result->fetch()){
            ?>    
                <option value="<?php echo $row['category_id']; ?>"><?php  echo $row['name']; ?></option>  

                <?php
                }
            }
        }
        
                            // Close connection
                            // unset($pdo);
        ?>

    </select>
    </div>

    <div class="form-group">
    <label for="salary">Feature Image:</label>
    <input type="file" name="photo" id="fileSelect">
    </div>	


   
    
    <button type="submit" class="btn btn-primary">Create</button>
</form>

<script>
// Disable form submissions if there are invalid fields
(function() {
'use strict';
window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
    form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
        }
        form.classList.add('was-validated');
    }, false);
    });
}, false);
})();
</script>