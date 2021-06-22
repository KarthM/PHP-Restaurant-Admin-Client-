<?php include('./frontpartials/nav.php') ?> 

<?php 

if(isset($_GET['cat_id'])){
    $cat_id=$_GET['cat_id'];
    $sql= "SELECT title from category where id=$cat_id";
    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    if($count>0){
        while($row=mysqli_fetch_assoc($res)){
           
            $title=$row['title'];
        }

    }else{
        echo "<div class='error'> no food item found in this category</div>";
    }
}else{
    header('location'.SITE);
}

?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white"><?php echo $title;?></a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            
        <?php 
        $sql2="SELECT * from fooditem where category_id=$cat_id";
        $res2=mysqli_query($conn,$sql2);
        $counts=mysqli_num_rows($res2);
        if($counts>0)
        {
            while($rows=mysqli_fetch_assoc($res2)){
                $cid=$rows['id'];
               $category_title=$rows['title'];
                $category_description=$rows['description'];
                $category_price=$rows['price'];
                $image=$rows['image'];
                ?>
                <div class="food-menu-box">
                <div class="food-menu-img">
                   <?php 
                   if($category_image=""){
                   echo "<div class='error'>no image available</div>";
                   }else{
                       ?>

                    <img src="<?php echo SITE ;?>images/food/<?php echo $image;?>" alt="burger" class="img-curve img-responsive"> 
                <?php   
                }
                   
                   ?> 
               
        
         </div>

                <div class="food-menu-desc">
                    <h4><?php echo $category_title;?></h4>
                    <p class="food-price"><?php echo $category_price;?></p>
                    <p class="food-detail">
                   <?php echo $category_description;?>
                    </p>
                    <br>

                    <a href="<?php echo SITE;?>order.php?food_id=<?php echo $cid; ?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>
            

                 <?php
            }

        }
        else
        {
            echo "no fooditem available";
        }
        
        
        ?>
      
       

            
        <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
    <?php include('./frontpartials/footer.php') ?>  