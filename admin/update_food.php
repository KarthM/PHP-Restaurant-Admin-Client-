<?php  include('partials/nav.php')?>

<div class="main-content">
        
        <div class="wrapper">
        <h3>Update Food</h3>
<?php 
if(isset($_GET['id'])){
     $id=$_GET['id'];
$sql1="SELECT * from fooditem where id=$id";
$res1=mysqli_query($conn,$sql1);
$count=mysqli_num_rows($res1);
if($count==1){
while($row=mysqli_fetch_assoc($res1)){
    $id=$row['id'];
    $title=$row['title'];
    $description=$row['description'];
    $price=$row['price'];
    $currentimage=$row['image'];
    $currentcategory=$row['category_id'];
    $featured=$row['featured'];
    $active=$row['active'];
}
}else{
    $_SESSION['nofood']="<div class='success'> no food found</div>";
        header('location:http://localhost/food_order/admin/manage_category.php');
         
}

}

?>




<form method="POST"action="" enctype="multipart/form-data">
        <table class="tbl-40">
            <div class="text-center">
            <tr>   <td> Title</td>
                     <td> <input type="text" name="title" value="<?php echo $title ;?>" placeholder="title"></td>
             </tr>

             <tr>
                <td> Description</td>
                <td> <textarea name="description" cols="20" rows="5"><?php echo $description;?></textarea>
                </td>      
            </tr>

             <tr>   <td> Price</td>
                     <td> <input type="number" name="price" value="<?php echo $price;?>" placeholder="price"></td>
             </tr>

             <tr>   <td> current image</td>
                     <td> 

                     <?php
                  if($currentimage!=""){
                  $site="http://localhost/food_order/";
                  ?>
                      <img src="<?php echo $site ;?>images/food/<?php echo $currentimage; ?>" width="100px"/>
                     <?php
                  }else{
                    echo "<div>image not added </div>";
                  }
                  
                  
                  ?>

                     </td>
             </tr>

             <tr>   <td> New image</td>
                     <td> <input type="file" name="image" value="" ></td>
             </tr>
             <tr>
                    <td>Category</td>
                     <td>
                    
                     <select name="category">


<?php 
                   $sql="SELECT * from category Where active='yes'";
                     $res=mysqli_query($conn,$sql);
                      $count=mysqli_num_rows($res);
                    if($count>0){
                       while ($rows=mysqli_fetch_assoc($res)){
                    $cat_id=$rows['id'];
                   $cat_title=$rows['title'];
                    ?>
                   <option <?php if($currentcategory===$cat_id){echo "selected"; } ?>value="<?php echo $cat_id;?>" > <?php echo $cat_title; ?></option>
       <?php
   }

}else{
    ?>
    <option value="0" >No category found</option>
    <?php
}

?>
                         
                     </select>
                   </td>
             </tr>


             <tr>
                <td> Featured</td>
                <td> yes<input <?php if($featured=="yes"){echo "checked" ;} ?> type="radio" name="featured" value="yes">
                     No <input <?php if($featured=="no"){echo "checked";}?> type="radio" name="featured" value="no">
                </td>      
            </tr>
        <tr> 
            <td> Active </td>
            <td>Yes <input <?php if($active=="yes"){echo "checked"; }?> type="radio" name="active" value="yes">
               No <input <?php if($active=="no"){echo "checked" ;} ?> type="radio" name="active" value="no">
        </td>
    </tr>

<tr> 
<td>
       <input type="hidden" value="<?php echo $currentimage;?>" name="currentimage">
       <input type="hidden" value="<?php echo $id;?>" name="id">

    <input type="submit" name="submit" class="btn-primary" value="Update food"> 
</td>
</tr>
            </div>
        </table>
         <div class="clearfix"></div>
</form>
       </div>
</div>

<?php 
if(isset($_POST['submit'])){
  echo  $id=$_POST['id'];
  echo  $title=$_POST['title'];
  echo$description=$_POST['description'];
  echo $price=$_POST['price'];
  echo $currentimage=$_POST['currentimage'];
  echo  $category_id=$_POST['category'];
  echo $featured=$_POST['featured'];
  echo $active=$_POST['active'];
               
   

               if(isset($_FILES['image']['name'])){
                $imagename=$_FILES['image']['name'];
            if($imagename!=""){
                $ext=end(explode('.',$imagename));
                $imagename="foodcategory".rand(00,99).'.'.$ext;
                $source_path=$_FILES['image']['tmp_name'];
                $destination_path="../images/food/".$imagename;
                $upload_file=move_uploaded_file($source_path, $destination_path);
                if($upload_file==false){
                    $_SESSION['upload']="<div class='error'> failed to add image</div>";
                    header('location:http://localhost/food_order/admin/add_food.php');
                    die();
                }
            }else{
                $imagename=$currentimage;
            }
            }else{
                $imagename=$currentimage;
            }
            
        
    


    $sql3="UPDATE fooditem SET
    
    title='$title',
    description='$description',
    image='$imagename',
    category_id='$category_id',
    price='$price',
    featured='$featured',
    active='$active'
     where id=$id";

    $res2=mysqli_query($conn,$sql3);
    if($res2==true){
        $_SESSION['update']="<div class='success'> food updated successfully</div>";
        header('location:http://localhost/food_order/admin/manage_food.php');
         
      }else{
        $_SESSION['update']="<div class='error'> food not updated</div>";
        header('location:http://localhost/food_order/admin/manage_food.php');
         
      }

}


?>
<?php  include('partials/footer.php')?>
 