<?php  include('partials/nav.php')?>


<div class="main-content">
        
        <div class="wrapper">

          <h3>add Admin</h3><br/>
          <?php
          
          if(isset($_SESSION['add']))
         {
           echo $_SESSION['add'];
           unset ($_SESSION['add']);
          }
          ?>


         <form action="" method="post">
             <table class="tbl-40">
                 <tr>
                     <td>Fullname</td>
                     <td><input type="text" placeholder="enter fullname" name="fullname">
                 </tr>
                 <tr>
                     <td>Username</td>
                     <td><input type="text" placeholder="enter Username" name="username">
                 </tr>
                 <tr>
                     <td>Password</td>
                     <td><input type="password" placeholder="******" name="password">
                 </tr>
                 <tr>
                     
                     <td><input type="submit" class="btn-primary" value="Submit" name="submit">
                 </tr>
             </table>
         </form>
        </div>
         
         <div class="clearfix"></div>
      
</div>
<?php  include('partials/footer.php')?>

<?php 
if(isset($_POST['submit'])){
    
    $fullname=$_POST['fullname'];
    $username=$_POST['username'];
    $password=md5($_POST['password']);

    $sql="insert into admin set
    fullname='$fullname',
    username='$username',
    password='$password'";

    

    $res=mysqli_query($conn,$sql) ;
    if($res==True)
    {
       $_SESSION['add']="admin added successfully";
       header('location:http://localhost/food_order/admin/manage_admin.php');
        
    }

}else{
   
   /*  header('location:http://localhost/food_order/admin/add_admin.php'); */
        
    }


?>