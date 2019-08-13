<?php
// Attempt select query execution
$sql = "SELECT * FROM article where id=".$_GET['id'];
$result = $pdo->query($sql);
if($result){
if($result->rowCount() > 0){   
    while($row = $result->fetch()){
?> 
     <div>
        <h4 class="m-0 font-weight-bold text-primary float-left">Article List</h4>
         <!-- <a  class="float-right"href="">Add New</a> -->
           <a href="home.php?page=article&frm=create" class="btn btn-success btn-sm btn-icon-split float-right">
            <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
            </span>
            <span class="text">Add New Article</span>
          </a>
       </div>

       <div  style="margin-top: 50px;">  
           <h4><?php echo $row['title']; ?></h4>
            
            <div class="row">
                    <img style="width:100%;" src="article/upload/<?php echo $row['photo']; ?>" alt="">

                  <h6 style="margin-top:15px;"><?php echo $row['detail']; ?></h6>  
                 
            </div>
            <a href="home.php?page=article&frm=index" class="btn btn-primary">cancel</a>
       </div>

    <?php 
        }
    }
}
// Close connection
        // unset($pdo);
?>