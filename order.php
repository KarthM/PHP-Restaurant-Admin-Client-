<?php include('./frontpartials/nav.php') ?> 

<?php 
if(isset($_GET['food_id'])){
$fid=$_GET['food_id'];
$sql="SELECT * from fooditem where id=$fid";
$res=mysqli_query($conn,$sql);
$count=mysqli_num_rows($res);
if($count>0){
    while($row=mysqli_fetch_assoc($res)){
        $id=$row['id'];
        $title=$row['title'];
        $description=$row['description'];
        $price=$row['price'];
        $fimage=$row['image'];
        ?>
        <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <?php
                        if($image=""){
                            echo "No image available";
                        }else{
                            ?>

                            <img src="<?php echo SITE;?>images/food/<?php echo $fimage;?>" alt="food" class="img-responsive img-curve">
                       <?php
                        }
                        ?>
  
 
        <?php
    }

}else{
    echo "Food not available";
}

}else{
    header('location'.SITE);
}



?>
    <!-- fOOD sEARCH Section Starts Here -->

                       
</div>
    
    <div class="food-menu-desc">
        <input type="hidden" name="food" value="<?php echo $title;?>">
        <h3><?php echo $title;?></h3>
        <input type="hidden" name="price"value="<?php echo $price;?>">
        <p class="food-price"><?php echo $price;?></p>

        <div class="order-label">Quantity</div>
        <input type="number" name="qty" class="input-responsive" value="1" required>
        
    </div>

</fieldset>
                    
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="full name" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="phone-number" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="email address" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="city, country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
<?php 
if(isset($_POST['submit'])){

    
    $food=$_POST['food'];
    $price=$_POST['price'];
     $qty=$_POST['qty'];
    $total=$price*$qty;
    $orderdate=date("y-m-d h:i:sa");
    $status="ordered";
    $customer_name=$_POST['full-name'];
   $customer_email=$_POST['email'];
   $customer_address=$_POST['address'];
    $customer_contact=$_POST['contact'];

    

 
  $sql2="INSERT INTO tbl_order SET
food='$food',
    price=$price,
    qty=$qty,
    total=$total,
    orderdate='$orderdate',
    status='$status',
    c_name='$customer_name',
    c_email='$customer_email',
    c_address='$customer_address',
    c_contact='$customer_contact'";
 
$res2=mysqli_query($conn,$sql2);


if($res2==true){
    $_SESSION['order1']="<div class='success'> order updated successfully</div>";
    header('location:http://localhost/food_order/');
     
  }else{
    $_SESSION['order1']="<div class='error'> order not updated</div>";
    header('location:http://localhost/food_order/');
     
  }
 
}

?>
    <!-- social Section Starts Here -->
    <?php include('./frontpartials/footer.php') ?>  