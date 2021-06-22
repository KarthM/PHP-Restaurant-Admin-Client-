<?php  
include('../config/constant.php');
$site="http://localhost/food_order/";
if (isset($_GET['id'])AND isset($_GET['image'])) {
    $id=$_GET['id'];
    $image=$_GET['image'];
   if($image!=""){

    $path="../images/category/".$image;
    $remove=unlink($path);

    if($remove==false){
        $_SESSION['remove']="<div class='success'> image not removed from category</div>";
        header('location'.$site."admin/manage_category.php");
        die();
    }
   }

$sql= "delete from category where id=$id";

$res=mysqli_query($conn,$sql);
if($res==true){
    $_SESSION['delete']="<div class='success'> Catergory deleted successfully</div>";
    header('location:http://localhost/food_order/admin/manage_category.php');
}else{
    $_SESSION['delete']="<div class='fail'>error...</div>";
       header('location:http://localhost/food_order/admin/delete_category.php');
} 


}else{
    header('location'.$site."admin/manage_category.php");
}


?>
