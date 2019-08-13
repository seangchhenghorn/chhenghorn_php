<div>    
         <!-- <a  class="float-right"href="">Add New</a> -->
           <a href="home.php?page=product&frm=create" class="btn btn-success btn-sm btn-icon-split float-right">
            <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
            </span>
            <span class="text">Add New Product</span>
          </a>
     
       </div>
       <h4 style="color:blue;">Product List</h4>
   <?php
        //connect database
            include_once('config.php');
            $product_code = $_GET['product_code'];

            $sql ="SELECT * FROM product WHERE product_code=$product_code";
            $result= $pdo->query($sql);
            if($result){
                if($result->rowCount() > 0){
                    while($row = $result->fetch()){
            
                         $product_code = $row['product_code'];
                         $product_name = $row['product_name'];
                         $product_price = $row['product_price'];
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
                        <label style="color:black; margin-top:20px; font-size: 22px;">Product Code:</label>
                        <p class="form-control-static"><strong style="color:red;"><?php echo $product_code; ?></strong></p>
                    </div>

                    <div class="form-group">
                        <label style="color:black; font-size: 22px;">Product Name:</label>
                        <p class="form-control-static"><strong style="color:red;"><?php echo $product_name; ?></strong></p>
                    </div>

                    <div class="form-group">
                        <label style="color:black;font-size: 22px; ">Product Price:</label>
                        <p class="form-control-static"><strong style="color:red;"><?php echo $product_price; ?></strong></p>
                    </div>
                   
                    <p><a href="home.php?page=product&frm=index" class="btn btn-primary">Back</a></p>
               </div>
         </div>
        <!-- End form -->