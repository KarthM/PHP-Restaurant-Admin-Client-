<?php include('../config/constant.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/admin.css">

</head>
<body >
<div class="login">
    <h1 class="text-center">login</h1>

<?php
    if(isset($_SESSION['login']))
          {
            echo $_SESSION['login'];
            unset ($_SESSION['login']);
           } ?>

<?php
          
          if(isset($_SESSION['nologin']))
         {
           echo $_SESSION['nologin'];
           unset ($_SESSION['nologin']);
          }
          ?>

    <form action="" method="POST">
    <div class="text-center">
    <tr >
        <td> Username :<input type="text" name="username" placeholder="username"value=""></td> </tr>
</div></br>
      <div class="text-center">
          <tr> <td> password :<input type="password" name="password" placeholder="password"value="">
        </td></tr>
      
      </div></br>
      <div class="text-center">
      <tr> <td > <input type="submit"  class=" btn-primary" name="submit" value=" submit"></td>
    </tr> </div>
    </form>
</div>
</body>
</html>

<?php

if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=md5($_POST['password']);

    $sql="SELECT * from admin where username='$username' and password='$password'";
    $res=mysqli_query($conn,$sql);
    if($res==true){
       
        $count=mysqli_num_rows($res);
        if($count==1){
            $_SESSION['login']="login successfully";
            $_SESSION['user']=$username;
            header('location:http://localhost/food_order/admin/index.php');
        }else{
            $_SESSION['login']="username or password not match";
        header('location:http://localhost/food_order/admin/login.php');
        }
    }
    

}
?>