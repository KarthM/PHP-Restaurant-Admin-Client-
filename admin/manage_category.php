<?php  include('partials/nav.php')?>

<div class="main-content">
        

        <div class="wrapper">

          <h3>Manage Category</h3><br/>
          
          <?php 
 if(isset($_SESSION['add']))
         {
           echo $_SESSION['add'];
           unset ($_SESSION['add']);
          }

          if(isset($_SESSION['delete']))
         {
           echo $_SESSION['delete'];
           unset ($_SESSION['delete']);
          }

          if(isset($_SESSION['remove']))
         {
           echo $_SESSION['remove'];
           unset ($_SESSION['remove']);
          }

          if(isset($_SESSION['update']))
          {
            echo $_SESSION['update'];
            unset ($_SESSION['update']);
           }


           if(isset($_SESSION['upload']))
          {
            echo $_SESSION['upload'];
            unset ($_SESSION['upload']);
           }


           if(isset($_SESSION['failedremove']))
          {
            echo $_SESSION['failedremove'];
            unset ($_SESSION['failedremove']);
           }
          ?>
           
         
          <a href="add_category.php" class="btn-first">Add category </a> <br/>
<br/><br/>
          <table class="full">
             
                  <tr>
                  <th>id</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Featured</th>
                  <th>Active</th>
                  <th>Actions</th>
</tr>
<?php
$sql="SELECT * from category";
$res=mysqli_query($conn,$sql);
$count=mysqli_num_rows($res);

if($count>0){
  $sn=1;
  while($row=mysqli_fetch_assoc($res))
{
  $id=$row['id'];
  $title=$row['title'];
  $image=$row['image'];
  $featured=$row['featured'];
  $active=$row['active'];

  ?>
  
  <tr>
                  <td><?php echo $sn++;?></td>
                  <td><?php echo $title; ?></td>

                  <td><?php
                  if($image!=""){
                  $site="http://localhost/food_order/";
?>
<img src="<?php echo $site ;?>images/category/<?php echo $image; ?>" width="100px"/>
<?php
                  }else{
                    echo "<div>image not added </div>";
                  }
                  
                  
                  ?>
                
                
                </td>
                  <td><?php echo $featured; ?></td>
                  <td><?php echo $active; ?></td>
                  
      
                   <td>
                  
                      <a href="update_category.php?id=<?php echo $id; ?>" class="btn-primary"> update</a>
                      <a href="delete_category.php?id=<?php echo $id; ?>&image=<?php echo $image ;?>" class="btn-sec">delete</a>
                     
                  </td>

</tr>
  
  <?php


}
}else{
  ?>
  <tr><td><div class="error">no category added</div></td></tr>
  <?php
}


?>


          </table>              
            
            

</div>
</div>
<?php  include('partials/footer.php')?>