<?php 
 include('../config/constant.php');

session_destroy();

header('location:http://localhost/food_order/admin/login.php');
?>