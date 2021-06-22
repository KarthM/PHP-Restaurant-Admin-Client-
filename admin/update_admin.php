<?php  include('partials/nav.php')?>
<div class="main-content">
        
        <div class="wrapper">

          <h3>Update Admin</h3><br/>

          <?php 
          
          $id=$_GET['id'];

          $sql="select * from admin where id=$id";

          $res=mysqli_query($conn,$sql);
          if($res==true){
              $count=mysqli_num_rows($res);
              if($count==1){
$row=mysqli_fetch_assoc($res);
$fullname=$row['fullname'];
$username=$row['username'];




              }else{
                  header('location.https://localhost/food_order/admin/manage_admin.php');
              }
          }

          
          
          ?>

          <form action="" method="post">
              <table class="tbl-40">
                  <tr>
                      <td> Fullname</td>
                      <td> <input type="text" name="fullname" value="<?php echo $fullname;?>" >
                  </tr>
                  <tr>
                      <td> Username</td>
                      <td> <input type="text" name="username" value="<?php echo $username;?>" >
                  </tr>

                  <tr>
                    <td><input type="hidden" name="id" value="<?php echo $id; ?>">
                      <td> <input type="submit" name="submit" class="btn-primary" value="update"></input></td>
                  </tr>
              </table>
          </form>
        </div>
</div>
<?php
if(isset($_POST['submit'])){
    $id=$_POST['id'];
     $fullname=$_POST['fullname'];
    $username=$_POST['username'];

    $sql1="UPDATE admin SET
    fullname='$fullname',
    username='$username'
    where id='$id'
    ";

    $res=mysqli_query($conn,$sql1);
    if($res=true)
    {
$_SESSION['update']="admin updated successfully";
header('location:http://localhost/food_order/admin/manage_admin.php');
    }else{
        $_SESSION['update']="admin not updated";
        header('location:http://localhost/food_order/admin/manage_admin.php');
    }
}
?>


<?php  include('partials/footer.php')?>