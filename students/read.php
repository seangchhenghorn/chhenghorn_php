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
        //connect database
            include_once('config.php');
            $stu_id = $_GET['stu_id'];

            $sql ="SELECT * FROM students WHERE stu_id=$stu_id";
            $result= $pdo->query($sql);
            if($result){
                if($result->rowCount() > 0){
                    while($row = $result->fetch()){
            
                         $stu_id = $row['stu_id'];
                         $name = $row['name'];
                         $gender = $row['gender'];
                         $bod = $row['bod'];
                         $pob = $row['pob'];
                    }
                }
            }
            // Close connection
            // unset($pdo);
    ?>
    <!-- start form -->
            <div class=row>
                <div class=col-md-6>
                    </div>
                <div class=col-md-6>
           
                    <div class="form-group">
                        <label style="color:black; margin-top:20px;">ID:</label>
                        <p class="form-control-static"><strong style="color:red;"><?php echo $stu_id; ?></strong></p>
                    </div>

                    <div class="form-group">
                        <label style="color:black;">Name:</label>
                        <p class="form-control-static"><strong style="color:red;"><?php echo $name; ?></strong></p>
                    </div>

                    <div class="form-group">
                        <label style="color:black;">Gender:</label>
                        <p class="form-control-static"><strong style="color:red;"><?php echo $gender; ?></strong></p>
                    </div>

                    <div class="form-group">
                        <label style="color:black;">BOD:</label>
                        <p class="form-control-static"><strong style="color:red;"><?php echo $bod; ?></p>
                    </div>
                    <div class="form-group">
                        <label style="color:black;">POB:</label>
                        <p class="form-control-static"><strong style="color:red;"><?php echo $pob; ?></p>
                    </div>
                   
                   
                    <p><a href="home.php?page=students&frm=index" class="btn btn-primary">Back</a></p>
               </div>
         </div>
        <!-- End form -->