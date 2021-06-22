<?php  include('partials/nav.php')?>

<div class="main-content">
        
        <div class="wrapper">
        <h3>Update category</h3>



        <?php 
          if(isset($_GET['id'])){
          $id=$_GET['id'];

          $sql="select * from category where id=$id";

          $res=mysqli_query($conn,$sql);
          if($res==true){
              $count=mysqli_num_rows($res);
              if($count==1){

          $row=mysqli_fetch_assoc($res);



$title=$row['title'];
$currentimage=$row['image'];
$featured=$row['featured'];
$active=$row['active'];




              }else{
                $_SESSION['no category']="no category found";
                header('location:http://localhost/food_order/admin/manage_category.php');
              }
          }
                  
        }else{
            
                header('location.https://localhost/food_order/admin/manage_category.php');
        
        }
          
          
          ?>





        <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-40">
            <div class="text-center">
            <tr>   <td> Title</td>
                     <td> <input type="text" name="title" value="<?php echo $title ;?>" placeholder="title"></td>
             </tr>

             <tr>   <td> current Image</td>
            <td>
                  <?php
                  if($currentimage!=""){
                  $site="http://localhost/food_order/";
                  ?>
                      <img src="<?php echo $site ;?>images/category/<?php echo $currentimage; ?>" width="100px"/>
                     <?php
                  }else{
                    echo "<div>image not added </div>";
                  }
                  
                  
                  ?>
             </tr>

             <tr>   <td> new Image</td>
                     <td> <input type="file" name="image" value=""></td>
             </tr>

            <tr>
                
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

    <input type="submit" name="submit" class="btn-primary" value="submit"> 
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
    $id=$_POST['id'];
    $title=$_POST['title'];
   $currentimage=$_POST['currentimage'];
   $featured=$_POST['featured'];
    $active=$_POST['active'];

    $site="http://localhost/food_order/";

    if(isset($_FILES['image']['name']))
    {
          $imagename=$_FILES['image']['name'];
        if($imagename!="")
        {
            $ext=end(explode('.',$imagename));
            $imagename="foodcategory".rand(00,99).'.'.$ext;
            $source_path=$_FILES['image']['tmp_name'];
            $destination_path="../images/category/".$imagename;
            $upload_file=move_uploaded_file($source_path, $destination_path);
            if($upload_file==false)
            {
                $_SESSION['upload']="<div class='error'> failed to add image</div>";
                header('location:http://localhost/food_order/admin/add_category.php');
                die();
             }
             if($currentimage!="")
                   {
                      $path="../images/category/".$currentimage;
                        $remove=unlink($path);
                        if($remove==false)
                        {
                            $_SESSION['failedremove']="<div class='error'> failed to add image</div>";
                            header('location:http://localhost/food_order/admin/manage_category.php');
                               die();
                        }
                    }
        }
        else{
            $imagename=$currentimage;  
        }
    }
    else
    {
        $imagename=$currentimage;
    }



     $sql1="UPDATE category SET
    title='$title',
      image='$imagename',
     featured='$featured',
    active='$active'
       where id='$id'
    ";

    $res1=mysqli_query($conn,$sql1);
    if($res1==true)
    {
$_SESSION['update']="category updated successfully";
header('location:http://localhost/food_order/admin/manage_category.php');
    }else{
        $_SESSION['update']="category not updated";
        header('location'.$site.'admin/update_category.php');
    } 
}
?>


<?php  include('partials/footer.php')?>