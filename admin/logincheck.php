<?php

if(!isset($_SESSION['user']))
          {
             $_SESSION['nologin']="please login before you start adding items";
             header('location:http://localhost/food_order/admin/login.php');
           }

?>