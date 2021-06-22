<?php  
include('../config/constant.php');
echo $id=$_GET['id'];

$sql= "delete from admin where id=$id";

$res=mysqli_query($conn,$sql);
if($res==true){
    $_SESSION['delete']="<div class='success'> admin deleted successfully</div>";
    header('location:http://localhost/food_order/admin/manage_admin.php');
}else{
    $_SESSION['delete']="<div class='fail'>error...</div>";
       header('location:http://localhost/food_order/admin/delete_admin.php');
}
?>
