<?php  include('partials/nav.php')?>

<div class="main-content">
        
        <div class="wrapper">
        <h3>Update order</h3>
<?php
if(isset($_GET['id'])){
$id=$_GET['id'];
$sql="SELECT * from tbl_order where id=$id";
$res=mysqli_query($conn,$sql);
if($res==true){
while($row=mysqli_fetch_assoc($res)){
    $oid=$row['id'];

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
                

}
}else{
    echo "No food item available";
}
}else{
    header('location'.SITE);
}


?>



<form action="" method="POST">
        <table class="tbl-40">
            <div class="text-center">
            <tr>   <td> Food</td>
                     <td><?php echo $food;?></td>
             </tr>
            <tr>
                <td> price</td>
                <td><h4><?php echo 'GBP '. $price;?></h4>
                    
                </td>      
            </tr>
            <tr>
                <td> Quantity</td>
                <td><input type="number" name="qty" value="<?php echo $qty;?>">
                    
                </td>      
            </tr>
            <tr>
                <td> Total</td>
                <td><input type="number" name="total" value="<?php echo $total;?>">
                    
                </td>      
            </tr>
        <tr> 
            <td> Status </td>
            <td><select name="status">
                <option <?php if($status=="ordered"){echo 'selected';} ?>>ordered</option>
                <option <?php if($status=="On delivery"){echo 'selected';} ?>>On delivery</option>
                <option <?php if($status=="Deliverd"){echo 'selected';} ?>>Deliverd</option>
                <option <?php if($status=="Cancelled"){echo 'selected';} ?>>Cancelled</option>
            </select>
        </td>
    </tr>
    <tr>
                <td> Customer_name</td>
                <td><input type="text" name="c_name" value="<?php echo $c_name;?>">
                    
                </td>      
            </tr>
            <tr>
                <td> Customer_email</td>
                <td><input type="text" name="c_email" value="<?php echo $c_email;?>">
                    
                </td>      
            </tr>

            <tr>
                <td> Customer_address</td>
                <td><input type="text" name="c_address" value="<?php echo $c_address;?>">
                    
                </td>      
            </tr>
            <tr>
                <td> Customer_contact</td>
                <td><input type="text" name="c_contact" value="<?php echo $c_contact;?>">
                    
                </td>      
            </tr>
<tr> 
<td>
    <input type="hidden" name="id" value="<?php echo $oid; ?>">
    <input type="hidden" name="price" value="<?php echo $price; ?>">
    <input type="submit" name="submit" class="btn-primary text-center" value="Update Order"> 
</td>
</tr>
            </div>
        </table>
         <div class="clearfix"></div>
</form>
       </div>
</div>

<?php 
if(isset($_POST['submit'])){

    $id=$_POST['id'];
    
    $price=$_POST['price'];
     $qty=$_POST['qty'];
    $total=$price*$qty;
    
    $status=$_POST['status'];
    $customer_name=$_POST['c_name'];
   $customer_email=$_POST['c_email'];
   $customer_address=$_POST['c_address'];
    $customer_contact=$_POST['c_contact'];

    $sql2="UPDATE tbl_order SET
    
    price=$price,
    qty=$qty,
    total=$total,
   
    status='$status',
    c_name='$customer_name',
    c_email='$customer_email',
    c_address='$customer_address',
    c_contact='$customer_contact'
    where id=$id";
 
$res2=mysqli_query($conn,$sql2);


if($res2==true){
    $_SESSION['update1']="<div class='success'> order updated successfully</div>";
    header('location:http://localhost/food_order/admin/manage_order.php');
     
  }else{
    $_SESSION['update1']="<div class='error'> order not updated</div>";
    header('location:http://localhost/food_order/admin/manage_order.php');
     
  }

}else{
    header('location'.SITE);
}
?>
<?php  include('partials/footer.php')?>






