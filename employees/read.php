

<?php
// Attempt select query execution
$sql = "SELECT * FROM employees where id=".$_GET['id'];
$result = $pdo->query($sql);
if($result){
if($result->rowCount() > 0){   
  while($row = $result->fetch()){
    ?>
        <div class="row">
               <div class="col-md-6">
                <h3>Read Record</h3>
                  <h4><?php echo $row['name']; ?></h4>
                    <img style="width:100%;" src="employees/upload/<?php echo $row['photo']; ?>" alt="">
                </div>

                 <div class="col-md-6">
                 <h3><a href="home.php?page=employees&frm=create" class="btn btn-success" role="button">Create New Employees</a></h3>
                    <div class="form-group">
                      <label style="margin-top:25px;">ID:</label>
                      <p class="form-control-static"><strong style="color:red;"><?php echo $row['id'];?></strong></p>
                    </div>

                  <div class="form-group">
                    <label>Name:</label>
                    <p class="form-control-static"><strong style="color:red;"><?php echo $row['name'];?></strong></p>
                  </div>

                  <div class="form-group">
                    <label>Address:</label>
                    <p class="form-control-static"><strong style="color:red;"><?php echo $row['address'];?></strong></p>
                   </div>

                  <div class="form-group">
                    <label>Salary:</label>
                    <p class="form-control-static"><strong style="color:red;"><?php echo $row['address'];?></p>
                  </div>
                  <a href="home.php?page=employees&frm=index" class="btn btn-primary">cancel</a>
              </div>
           </div>
         
         <?php
        }
    }
}
// Close connection
        // unset($pdo);
?>
 
      