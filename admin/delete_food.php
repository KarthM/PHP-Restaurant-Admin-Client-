<?php

 
include('../config/constant.php');
$site="http://localhost/food_order/";
if (isset($_GET['id'])AND isset($_GET['image'])) {
    $id=$_GET['id'];
   $image=$_GET['image'];
    if($image!=""){
   
    $path="../images/food/".$image;
    $remove=unlink($path);

    if($remove==false){
        $_SESSION['remove']="<div class='success'> image not removed from food</div>";
        header('location'.$site."admin/manage_food.php");
        die();
    }
   }

$sql= "delete from fooditem where id=$id";

$res=mysqli_query($conn,$sql);
if($res==true){
    $_SESSION['delete']="<div class='success'> food deleted successfully</div>";
    header('location:http://localhost/food_order/admin/manage_food.php');
}else{
    $_SESSION['delete']="<div class='fail'>failed to delete food</div>";
       header('location:http://localhost/food_order/admin/delete_food.php');
} 


}else{
    $_SESSION['unauth']="<div class='error'>unauthorized access</div>";
    header('location'.$site."admin/manage_food.php");
}


?>


 
