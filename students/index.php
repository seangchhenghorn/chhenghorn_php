<style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 3px;
        }
    </style>
<div>
<h4 class="m-0 font-weight-bold text-primary float-left">Category List</h4>
<!-- <a  class="float-right"href="">Add New</a> -->
<a href="home.php?page=students&frm=create" class="btn btn-success btn-sm btn-icon-split float-right">
    <span class="icon text-white-50">
    <i class="fas fa-plus"></i>
    </span>
    <span class="text">Add New Category</span>
</a>
</div>
<div class="table-responsive" style="margin-top: 50px;">  
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
    <!-- <table class="table table-bordered" style="margin-top: 50px;"> -->
    <?php
        // Attempt select query execution
        $sql = "SELECT * FROM students";
        $result = $pdo->query($sql);
        if($result){
        if($result->rowCount() > 0){
        ?>

        <thead style="font-size: 15px;">
            <tr>
            <th>Students ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>BOD</th>
            <th>POB</th>
            <th>Action</th>
            </tr>
        </thead>

        <tfoot style="font-size: 15px;">
            <tr>
            <th>Students ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>BOD</th>
            <th>POB</th>
            <th>Action</th>
            </tr>
        </tfoot>

        <tbody>
            <?php
            while($row = $result->fetch()){
            ?>    
               <tr class="success" style="font-size: 15px;">
                          <td><?php echo $row['stu_id']?></td>
                          <td><a href="home.php?page=students&frm=read&stu_id=<?php echo $row['stu_id']; ?>" title='Detail <?php echo $row['name']?>' data-toggle='tooltip' ><?php echo $row['name']?></a></td>
                          <td><?php echo $row['gender']?></td>
                          <td><?php echo $row['bod']?></td>
                          <td><?php echo $row['pob']?></td>
                          <td>
                          <a href="home.php?page=students&frm=read&stu_id=<?php echo $row['stu_id']; ?>"><i class="fas fa-info-circle"></i></a>    
                          <a href="home.php?page=students&frm=edit&stu_id=<?php echo $row['stu_id']; ?>" ><i class="fas fa-check"></i></a>
                          <a href="home.php?page=students&frm=delete&stu_id=<?php echo $row['stu_id']; ?>"><i class="fas fa-trash"></i></a>
                          </td>

                        </tr>
        
                <?php
            }
            }
        }
        
                            // Close connection
                            unset($pdo);
            ?>
            </tbody>
    </table>
</div>