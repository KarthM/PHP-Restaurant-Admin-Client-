<?php  include('partials/nav.php')?>

<div class="main-content">
        
        <div class="wrapper">
        <h3>Add category</h3>
        <?php 
 if(isset($_SESSION['add']))
         {
           echo $_SESSION['add'];
           unset ($_SESSION['add']);
          }

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
             <tr>   <td> Select Image</td>
                     <td> <input type="file" name="image" value=""></td>
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
   $title=$_POST['title'];

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
    $destination_path="../images/category/".$imagename;
    $upload_file=move_uploaded_file($source_path, $destination_path);
    if($upload_file==false){
        $_SESSION['upload']="<div class='error'> failed to add image</div>";
        header('location:http://localhost/food_order/admin/add_category.php');
        die();
    }
}else{
    $imagename="";
}
}
       //print_r($_FILES['image']);
       //die();

       $sql= "insert into category set
       title='$title',
       image='$imagename',
      featured='$featured',
      active='$active' ";

      $res=mysqli_query($conn,$sql);
      if($res==true){
        $_SESSION['add']="<div class='success'> category added successfully</div>";
        header('location:http://localhost/food_order/admin/manage_category.php');
         
      }else{
        $_SESSION['add']="<div class='error'> category not added</div>";
        header('location:http://localhost/food_order/admin/add_category.php');
         
      }

}

?>
<?php  include('partials/footer.php')?>