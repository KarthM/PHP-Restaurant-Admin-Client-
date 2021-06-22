
   <?php include('./frontpartials/nav.php') ?> 

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITE; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
            $sql1="SELECT * from fooditem where  active='yes'";
            $res1=mysqli_query($conn,$sql1);
            $counts=mysqli_num_rows($res1);
            if($counts>0){
                while($rows=mysqli_fetch_assoc($res1)){
                   $id=$rows['id'];
                     $title=$rows['title'];
                     $description=$rows['description'];
                    $image=$rows['image'];
                    $price=$rows['price'];
                   
                
                ?>
                     <div class="food-menu-box">
                <div class="food-menu-img">
               <?php 
            if($image==""){
                echo "<div class='error'> Image not added;</div>";
            }else{
                ?>
                 <img src="<?php echo SITE;?>images/food/<?php echo $image;?>" alt="food" class="img-responsive img-curve"></div>
            <?php
            }
            ?>
            
                          <div class="food-menu-desc">
                    <h4><?php echo $title;?></h4>
                    <p class="food-price"><?php echo $price;?></p>
                    <p class="food-detail">
                    <?php echo $description;?>
                    </p>
                    <br>

                    <a href="<?php echo SITE;?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>            
               

                <h3 class="float-text text-white"><?php echo $title; ?></h3>
            </div>
            </a>  
                <?php
            }
        }else{
            echo "<div class='error'> food not added;</div>";
        }
            
            ?>
            
            




            
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

 
    <?php include('./frontpartials/footer.php') ?>  