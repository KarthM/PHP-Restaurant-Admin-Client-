<?php  include('partials/nav.php')?>

<div class="main-content">
        
        <div class="wrapper">
<div>
          <h3>Manage Admin</h3><br/>
          <?php 
 if(isset($_SESSION['add']))
         {
           echo $_SESSION['add'];
           unset ($_SESSION['add']);
          }
          ?>

<?php 
 if(isset($_SESSION['delete']))
         {
           echo $_SESSION['delete'];
           unset ($_SESSION['delete']);
          }
          if(isset($_SESSION['update']))
          {
            echo $_SESSION['update'];
            unset ($_SESSION['update']);
           }

           if(isset($_SESSION['password']))
          {
            echo $_SESSION['password'];
            unset ($_SESSION['password']);
           }
           if(isset($_SESSION['password_notmatch']))
           {
             echo $_SESSION['password_notmatch'];
             unset ($_SESSION['password_notmatch']);
            }
 
            if(isset($_SESSION['password_match']))
            {
              echo $_SESSION['password_match'];
              unset ($_SESSION['password_match']);
             }
  
          ?>
          
         
          <a href="add_admin.php" class="btn-first">Add Admin</a> <br/>
</div><br/><br/>
          <table class="full">
             
                  <tr>
                  <th>id</th>
                  <th>Fullname</th>
                  <th>username</th>
                  <th>Actions</th>
</tr>

<?php  
$n=1;
          $sql="select * from admin";
          $res=mysqli_query($conn,$sql);
          if($res==true){
              $count=mysqli_num_rows($res);
              if($count>0){
                  while($row=mysqli_fetch_assoc($res)){
                      $id=$row['id'];
                      $fullname=$row['fullname'];
                      $username=$row['username'];
                    

                      ?>
                      <tr>
              <td><?php echo $n++ ?></td>
                  <td><?php echo $fullname?></td>
                  <td><?php echo $username ?></td>
                  <td> 
                  
                      <a href="update_admin.php?id=<?php echo $id; ?>" class="btn-primary"> update</a>
                      <a href="delete_admin.php?id=<?php echo $id; ?>" class="btn-sec">delete</a>
                      <a href="update_password.php?id=<?php echo $id; ?>" class="btn-first">change-password</a>
                  </td>
<?php
                
            }
              }
              else{

              }

          }
          ?> 

            
              

                  
             
          </table>
         <div class="clearfix"></div>
       </div>
</div>


<?php  include('partials/footer.php')?>