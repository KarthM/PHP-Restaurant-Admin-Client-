<?php  include('partials/nav.php')?>
<div class="main-content">
        
        <div class="wrapper">

          <h3>Update password</h3><br/>

          <?php 
          
          $id=$_GET['id'];
          
?>
          
          
         

          <form action="" method="post">
              <table class="tbl-40">
                  <tr>
                      <td> Current password</td>
                      <td> <input type="password" name="oldpassword" placeholder="old password" value="" >
                  </tr>
                  <tr>
                      <td> New password</td>
                      <td> <input type="password" name="newpassword" placeholder="new password" value="" >
                  </tr>
                  <tr>
                      <td> Confrim password</td>
                      <td> <input type="password" name="confirmpassword" placeholder="Confirm password" value="" >
                    </tr>

                  <tr>
                    <td><input type="hidden" name="id" value="<?php echo $id; ?>">
                      <td> <input type="submit" name="submit" class="btn-primary" value="submit"></input></td>
                  </tr>
              </table>
          </form>
        </div>
</div>
<?php
if(isset($_POST['submit'])){
    $id=$_POST['id'];
$currentpassword=md5($_POST['oldpassword']);
$newpassword=md5($_POST['newpassword']);
$confirmpassword=md5($_POST['confirmpassword']);

$sql="select * from admin where id=$id and password='$currentpassword'";
$res=mysqli_query($conn,$sql);
if($res==true){
    $count=mysqli_num_rows($res);
    if($count==1)
    {
       if($newpassword==$confirmpassword)
       {
        $sql1="UPDATE admin set password='$newpassword' where id='$id'" ;
        $res=mysqli_query($conn,$sql);
        if($res==true){
            $_SESSION['password_match']="password updated successfully";
            header('location:http://localhost/food_order/admin/manage_admin.php');
        }
        
       }else
       {
        $_SESSION['password_notmatch']="password not match";
        header('location:http://localhost/food_order/admin/manage_admin.php');
       }

    }else{
        $_SESSION['password']="user not found";
        header('location:http://localhost/food_order/admin/manage_admin.php');
    }
}
}
    ?>

<?php  include('partials/footer.php') ?>