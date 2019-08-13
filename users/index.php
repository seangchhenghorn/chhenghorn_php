<style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 10px;
        }
    </style>
<div>
<h4 class="m-0 font-weight-bold text-primary float-left">Users List</h4>
<!-- <a  class="float-right"href="">Add New</a> -->
<a href="home.php?page=users&frm=create" class="btn btn-success btn-sm btn-icon-split float-right">
    <span class="icon text-white-50">
    <i class="fas fa-plus"></i>
    </span>
    <span class="text">Add New Users</span>
</a>
</div>
<div class="table-responsive" style="margin-top: 50px;">  
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
    <!-- <table class="table table-bordered" style="margin-top: 50px;"> -->
    <?php
        // Attempt select query execution
        $sql = "SELECT * FROM users";
        $result = $pdo->query($sql);
        if($result){
        if($result->rowCount() > 0){
        ?>

        <thead style="font-size: 15px;">
            <tr>
            <th>ID</th>
            <th>Uname</th>
            <th>Full Name</td>
            <th>Create At</th>
            <th>Group</td>
            <th>Action</th>
            </tr>
        </thead>

        <tfoot style="font-size: 15px;">
            <tr>
            <th>ID</th>
            <th>Uname</th>
            <th>Full Name</td>
            <th>Create At</th>
            <th>Group Id</td>
            <th>Action</th>
            </tr>
        </tfoot>

        <tbody>
            <?php
            while($row = $result->fetch()){
            ?>    
                <tr class="success" style="font-size: 15px;">
                    <td><?php echo $row['id']?></td>
                    <td><a href="home.php?page=users&frm=read&id=<?php echo $row['id']; ?>" title='Detail <?php echo $row['username']?>' data-toggle='tooltip' ><?php echo $row['username']?></a></td>
                    <td><?php echo $row['full_name']?></td>
                    <td><?php echo $row['created_at']?></td>
                    <td><?php echo $row['group_id']?></td>
                                
                    <td>
                        <a href="home.php?page=users&frm=read&id=<?php echo $row['id']; ?>" >
                            <i class="fas fa-eye"></i> 
                        </a>
                        
                        <a href="update.php?id=<?php echo $row['id']; ?>">
                            <i class="fas fa-check"></i>
                        </a>
                        <a href="home.php?page=users&frm=delete&id=<?php echo $row['id']; ?>" title='Delete Record' data-toggle='tooltip'><i class="fas fa-trash"></i></a>
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