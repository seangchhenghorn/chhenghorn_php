<div>
        
         <!-- <a  class="float-right"href="">Add New</a> -->
           <a href="home.php?page=category&frm=create" class="btn btn-success btn-sm btn-icon-split float-right">
            <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
            </span>
            <span class="text">Add New Category</span>
          </a>
     
       </div>
       <h4 style="color:blue;">Category List</h4>
<?php
// Attempt select query execution
$category_id = $_GET['category_id'];
$sql = "SELECT * FROM category where category_id=$category_id";
$result = $pdo->query($sql);
if($result){
if($result->rowCount() > 0){   
    while($row = $result->fetch()){
?> 
     <br>
      <h3 >ID: <strong style="color:red; "><?php echo $row['category_id'];?></strong></h3>
      <h3>Name: <strong style="color:red;"><?php echo $row['name'];?></strong></h3>
      <h3>Icon: <strong style="color:red;"><?php echo $row['icon'];?></strong></h3>

      <a href="home.php?page=category&frm=index" class="btn btn-primary">Back</a>
   
    <?php 
        }
    }
}
// Close connection
        // unset($pdo);
?>