<?php  include('partials/nav.php')?>

<div class="main-content">
        
        <div class="wrapper">
        <h3>Add Food</h3>
        <?php 
 if(isset($_SESSION['upload']))
         {
           echo $_SESSION['upload'];
           unset ($_SESSION['upload']);
          }

          ?>



<form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-40">
            <div class="text-center">

              <tr>   <td> Title</td>
                     <td> <input type="text" name="title" value="" placeholder="title"></td>
             </tr>

            <tr>
                <td> Description</td>
                <td> <textarea name="description" cols="20" rows="5" placeholder="description of food"></textarea>
                </td>      
            </tr>
             
            <tr> 
            <td> Price </td>
            <td><input type="number" name="price" value="">
               
            </td>
            </tr>

            <tr>   <td> Select Image</td>
                     <td> <input type="file" name="image" value=""></td>
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
                    $id=$rows['id'];
                   $title=$rows['title'];
                    ?>
                   <option value="<?php echo $id;?>" > <?php echo $title; ?></option>
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
                   <td> yes<input type="radio" name="featured" value="yes">
                     No <input type="radio" name="featured" value="no">
                    </td>      
            </tr>
        <tr> 
            <td> Active </td>
            <td>Yes<input type="radio" name="active" value="yes">
               No <input type="radio" name="active" value="no">
        </td>
    </tr>

               <tr> 
               <td>
                      <input type="submit" name="submit" class="btn-primary" value="Add food"> 
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
    $description=$_POST['description'];
    $price=$_POST['price'];
    $category_id=$_POST['category'];


    if(isset($_POST['featured'])){
        $featured=$_POST['featured'];
           }else{
        $featured='no';
           }

           if(isset($_POST['active'])){
            $active=$_POST['active'];
               }else{
            $active='no';
               }

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
                $imagename="";
            }
            }
            
        
    


    $sql="INSERT into fooditem set
    id='$id',
    title='$title',
    description='$description',
    image='$imagename',
    category_id='$category_id',
    price='$price',
    featured='$featured',
    active='$active'";

    $res=mysqli_query($conn,$sql);
    if($res==true){
        $_SESSION['add']="<div class='success'> food added successfully</div>";
        header('location:http://localhost/food_order/admin/manage_food.php');
         
      }else{
        $_SESSION['add']="<div class='error'> food not added</div>";
        header('location:http://localhost/food_order/admin/add_food.php');
         
      }

}


?>
<?php  include('partials/footer.php')?>