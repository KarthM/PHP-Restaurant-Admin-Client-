<?php  include('partials/nav.php')?>

<div class="main-content">
        

        <div class="wrapper">

          <h3>Manage Food</h3><br/>
          <?php
          if(isset($_SESSION['add']))
         {
           echo $_SESSION['add'];
           unset ($_SESSION['add']);
          }

          if(isset($_SESSION['delete'])){
           echo $_SESSION['delete'];
           unset($_SESSION['delete']);
          }

          if(isset($_SESSION['unauth'])){
            echo $_SESSION['unauth'];
            unset($_SESSION['unauth']);
           }


           if(isset($_SESSION['update'])){
            echo $_SESSION['update'];
            unset($_SESSION['update']);
           }
           ?>
         
          <a href="add_food.php" class="btn-first">Add Food</a> <br/>
<br/><br/>



          <table class="full">
             
                  <tr>
                  <th>id</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Image</th>
                  <th>Featured</th>
                  <th>Active</th>         
                  <th>Actions</th>
</tr>


<?php 

$sql="SELECT * from fooditem";
$res=mysqli_query($conn,$sql);
$count=mysqli_num_rows($res);
if($count>0){
  while($row=mysqli_fetch_assoc($res)){
$id=$row['id'];
$title=$row['title'];
$description=$row['description'];
$price=$row['price'];
$image=$row['image'];
$featured=$row['featured'];
$active=$row['active'];
$site="http://localhost/food_order/";


    ?>
    <tr>
                  <td><?php echo $id;?></td>
                  <td><?php echo $title;?></td>
                  <td><?php echo $description;?></td>
                  <td><?php echo $price;?></td>
                  <td>
                    <?php 
                    if($image==""){
                      echo "<div class='error'>image not found</div>";
                    }else{
                      ?>
<img src="<?php echo $site;?>images/food/<?php echo $image; ?>" width="100px"/>
                      <?php
                    }
                    
                    
                    ?></td>
                  <td><?php echo $featured;?></td>
                  <td><?php echo $active;?></td>
                  <td>
                  
                      <a href="update_food.php?id=<?php echo $id; ?>" class="btn-primary"> update</a>
                      <a href="delete_food.php?id=<?php echo $id; ?>&image=<?php echo $image ;?>" class="btn-sec">delete</a>
                     
                  </td>

</tr>
    <?php
  }
}else{
  echo "<div class='success'>food not yet added</div>";
}


?>

      
                   
          </table>              
            
            

</div>
</div>
<?php  include('partials/footer.php')?>