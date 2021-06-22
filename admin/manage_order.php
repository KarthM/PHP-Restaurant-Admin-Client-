<?php  include('partials/nav.php')?>

<div class="main-content">
        
        <div class="wrapper">
        <h3>Manage-Order</h3>
        <?php 
 if(isset($_SESSION['update1']))
         {
           echo $_SESSION['update1'];
           unset ($_SESSION['update1']);
          }
          ?> 


        <table class="tbl-full">
          <tr>
            <th>Id</th>
          <th>Food </th>
          <th>price </th>
          <th>Qty </th>
          <th>Total </th>
          <th>Orderdate </th>
          <th>Status </th>
          <th>customer-name </th>
          <th>customer-email </th>
          <th>customer-address </th>
          <th>customer-contact </th>
          <th>Actions</th>          
          </tr>
          <?php 
          $sql="SELECT * from tbl_order order by id DESC";
          $res=mysqli_query($conn,$sql);
          $count=mysqli_num_rows($res);
            if($count>0){
              while($row=mysqli_fetch_assoc($res)){
                $id=$row['id'];
                $food=$row['food'];
                $price=$row['price'];
                $qty=$row['qty'];
                $total=$row['total'];
                $orderdate=$row['orderdate'];
                $status=$row['status'];
                $c_name=$row['c_name'];
                $c_email=$row['c_email'];
                $c_address=$row['c_address'];
                $c_contact=$row['c_contact'];
                ?>
<tr>
           <td> <?php echo $id;?></td>
            <td><?php echo $food; ?></td>
            <td><?php echo $price; ?></td>

            <td><?php echo $qty; ?></td>

            <td><?php echo $total; ?></td>

            <td><?php echo $orderdate; ?></td>

            <td><?php echo $status;
            /* if($status=='Ordered'){
             echo" <label style='color:black'>$status</label>";
            }elseif($status=="On Delivery"){
              echo "<label style='color:orange'>$status</label>";
            }elseif($status=="Deliverd"){
              echo "<label style='color:green'>$status</label>";
            
            }elseif($status=="Cancelled"){
              echo "<label style='color:blue'>$status</label>";
            } */
            
            ?>
          
          </td>

            <td><?php echo $c_name; ?></td>

            <td><?php echo $c_email; ?></td>
            <td><?php echo $c_address; ?></td>

            <td><?php echo $c_contact; ?></td>
            <td><a href="<?php echo SITE;?>admin/update_order.php?id=<?php echo $id?>" class="btn-first"  name="submit">Update order</a>
           
            
                <?php
              }

            }else{
              echo "No orders found";
            }
          
          
          
          ?>

          



          </tr>
        </table>
         <div class="clearfix"></div>
       </div>
</div>
<?php  include('partials/footer.php')?>