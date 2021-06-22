<?php  include('partials/nav.php')?>
<!---main-->
    <div class="main-content">
    <?php
    if(isset($_SESSION['login']))
          {
            echo $_SESSION['login'];
            unset ($_SESSION['login']);
           } ?>
        <?php 
        $sql="SELECT * from category";
        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
        
        ?>
          <div class="wrapper">
            <h3>Dashboard</h3>
              <div class="col-4 text-center">
                  <h1> <?php echo $count;?></h1><br/>
                  categories
           </div>
           <?php 
        $sql1="SELECT * from fooditem";
        $res1=mysqli_query($conn,$sql1);
        $count1=mysqli_num_rows($res1);
        
        ?>

           <div class="col-4 text-center">
                  <h1> <?php echo $count1;?></h1><br/>
                  Food
           </div>

           <?php 
        $sql2="SELECT * from tbl_order";
        $res2=mysqli_query($conn,$sql2);
        $count2=mysqli_num_rows($res2);
        
        ?>

           <div class="col-4 text-center">
                  <h1> <?php echo $count2;?></h1><br/>
                  Total order
           </div>
           <?php 
        $sql3="SELECT sum(total) as T from tbl_order where status='deliverd'";
        $res3=mysqli_query($conn,$sql3);
        $row3=mysqli_fetch_assoc($res3);
        $to_revenue=$row3['T'];
        
        ?>


           <div class="col-4 text-center">
                  <h1>£ <?php echo $to_revenue; ?></h1><br/>
                  Revenue
           </div>
           <div class="clearfix"></div>
         </div>
    </div>
    <?php  include('partials/footer.php')?>