<div>
<h4 class="m-0 font-weight-bold text-primary float-left">Employees List</h4>
<!-- <a  class="float-right"href="">Add New</a> -->
<a href="home.php?page=employees&frm=create" class="btn btn-success btn-sm btn-icon-split float-right">
    <span class="icon text-white-50">
    <i class="fas fa-plus"></i>
    </span>
    <span class="text">Add New Employees</span>
</a>
</div>
<div class="table-responsive" style="margin-top: 50px;">  
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
    <!-- <table class="table table-bordered" style="margin-top: 50px;"> -->
    <?php
        // Attempt select query execution
        $sql = "SELECT * FROM employees";
        $result = $pdo->query($sql);
        if($result){
        if($result->rowCount() > 0){
        ?>

        <thead style="font-size: 15px;>
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th>address</th>
            <th>salary</th>     
            <th>Action</th>
            </tr>
        </thead>

        <tfoot style="font-size: 15px;>
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Salary</th>
             <th>Action</th>
            </tr>
        </tfoot>

        <tbody style="font-size: 15px;>
            <?php
            while($row = $result->fetch()){
            ?>    
                <tr class="success">
                    <td><?php echo $row['id']?></td>
                    <td><a href="home.php?page=employees&frm=read&id=<?php echo $row['id']; ?>" title='Detail <?php echo $row['name']?>' data-toggle='tooltip' ><?php echo $row['name']?></a></td>
                    <td><?php echo $row['address']?></td>
                    <td><?php echo $row['salary']?></td>
                                
                    <td>
                        <a href="home.php?page=employees&frm=read&id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye"></i> 
                        </a>
                        
                        <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">
                            <i class="fas fa-check"></i>
                        </a>
                        <a href="home.php?page=employees&frm=delete&id=<?php echo $row['id']; ?>" class='btn btn-danger btn-sm' title='Delete Record' data-toggle='tooltip'><i class="fas fa-trash"></i></a>
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