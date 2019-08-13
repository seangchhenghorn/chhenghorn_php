
<div>
<h4 class="m-0 font-weight-bold text-primary float-left">Product List</h4>
<!-- <a  class="float-right"href="">Add New</a> -->
<a href="home.php?page=product&frm=create" class="btn btn-success btn-sm btn-icon-split float-right">
    <span class="icon text-white-50">
    <i class="fas fa-plus"></i>
    </span>
    <span class="text">Add New Product</span>
</a>
</div>
<div class="table-responsive" style="margin-top: 50px;">  
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
    <!-- <table class="table table-bordered" style="margin-top: 50px;"> -->
    <?php
        // Attempt select query execution
        $sql = "SELECT * FROM product";
        $result = $pdo->query($sql);
        if($result){
        if($result->rowCount() > 0){
        ?>

        <thead style="font-size: 20px;">
            <tr>
            <th>Product Code</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Action</th>
            </tr>
        </thead>

        <tfoot style="font-size: 20px;">
            <tr>
            <th>Product Code</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Action</th>
            </tr>
        </tfoot>

        <tbody>
            <?php
            while($row = $result->fetch()){
            ?>    
               <tr class="success" style="font-size: 17px;">
                          <td><?php echo $row['product_code']?></td>
                          <td><a href="home.php?page=product&frm=read&product_code=<?php echo $row['product_code']; ?>" title='Detail <?php echo $row['product_name']?>' data-toggle='tooltip' ><?php echo $row['product_name']?></a></td>
                          <td><?php echo $row['product_price']?></td>
                       
                          <td>
                          <a href="home.php?page=product&frm=read&product_code=<?php echo $row['product_code']; ?>" class="btn btn-primary btn-sm" ><i class="fas fa-eye"></i></a>    
                          <a href="home.php?page=product&frm=edit&product_code=<?php echo $row['product_code']; ?>"class="btn btn-success btn-sm" ><i class="fas fa-check"></i></a>
                          <a href="home.php?page=product&frm=delete&product_code=<?php echo $row['product_code']; ?>" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i></a>
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