
<?php
    // Include config file
    include_once('config.php');
    $category_id=$_GET['category_id'];
  // Attempt select query execution
  $sql = "SELECT * FROM category WHERE category_id=$category_id";
  $result = $pdo->query($sql);
  if($result){
  if($result->rowCount() > 0){
    while($row = $result->fetch()){
    
      $category_id = $row['category_id'];
      $name = $row['name'];
      $icon = $row['icon'];
     
       
    }
  }
}    
                 
     ?>
     <form action="category/edit.php" method="post">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
        <span class="help-block"></span>
    </div>

    <div class="form-group">
        <label for="icon">Icon:</label>
        <input type="text" class="form-control" id="icon" name="icon" value="<?php echo $icon; ?>">
        <span class="help-block"></span>
    </div>

    <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
    <button type="submit" class="btn btn-primary" value=>Update</button>
    <a href="categories.php" class="btn btn-danger">Cancel</a>
    </form>
    <?php

if(isset($_POST['btnsave'])){

   $category_id = $_POST['category_id'];
   $name = $_POST['name'];
   $icon = $_POST['icon'];

 // Check input errors before inserting in database
//if(empty($name_err) && empty($address_err) && empty($salary_err)){
   // Prepare an update statement
   $sql = "UPDATE category SET name=:name,icon=:icon WHERE category_id=:$category_id";

   if($stmt = $pdo->prepare($sql)){
       // Bind variables to the prepared statement as parameters
       $stmt->bindParam(":category_id", $param_category_id);
       $stmt->bindParam(":name", $param_name);
       $stmt->bindParam(":icon", $param_icon);
      
       
       // Set parameters
       $param_name = $name;
       $param_icon = $icon;
       $param_category_id = $category_id;
       
       // Attempt to execute the prepared statement
       if($stmt->execute()){
           // Records updated successfully. Redirect to landing page
           header("location: ../home.php?page=category&frm=index");
           exit();
       } else{
           echo "Something went wrong. Please try again later.";
       }
   }
}

?>