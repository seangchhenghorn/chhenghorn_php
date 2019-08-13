<div>
        
         <!-- <a  class="float-right"href="">Add New</a> -->
           <a href="home.php?page=users&frm=create" class="btn btn-success btn-sm btn-icon-split float-right">
            <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
            </span>
            <span class="text">Add New Users</span>
          </a>
     
       </div>
       <h4 style="color:blue;">Users List</h4>
<?php
// Attempt select query execution
$id = $_GET['id'];
$sql = "SELECT * FROM users where id=$id";
$result = $pdo->query($sql);
if($result){
if($result->rowCount() > 0){   
    while($row = $result->fetch()){
      $id=$row['id'];
      $username=$row['username'];
      $full_name=$row['full_name'];
      $password=$row['password'];
      $created_at = $row['created_at'];
      $group_id = $row['group_id'];
        }
    }
}
// Close connection
        // unset($pdo);
?>
                    <div class="row">
                    <div class=col-md-6>
                        
                    </div>
                    <div class=col-md-6>
                   
                    <div class="form-group">
                        <label style="color:black; margin-top:20px;">ID:</label>
                        <p class="form-control-static"><strong style="color:red;"><?php echo $id; ?></strong></p>
                    </div>

                    <div class="form-group">
                        <label style="color:black;">User Name:</label>
                        <p class="form-control-static"><strong style="color:red;"><?php echo $username; ?></strong></p>
                    </div>
                    <div class="form-group">
                        <label style="color:black;">Full Name:</label>
                        <p class="form-control-static"><strong style="color:red;"><?php echo $full_name; ?></strong></p>
                    </div>

                    <div class="form-group">
                        <label style="color:black;">Created At:</label>
                        <p class="form-control-static"><strong style="color:red;"><?php echo $created_at; ?></p>
                    </div>
                    <div class="form-group">
                        <label style="color:black;">Group ID:</label>
                        <p class="form-control-static"><strong style="color:red;"><?php echo $group_id; ?></p>
                    </div>
                   
                   
                    <p><a href="home.php?page=users&frm=index" class="btn btn-primary">Back</a></p>
                    </div>
                    </div>