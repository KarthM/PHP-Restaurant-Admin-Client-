<?php include('./frontpartials/nav.php') ?> 
    <!-- Navbar Section Ends Here -->



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php 
            $sql="SELECT * from category where active='yes'";
            $res=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            if($count>0){
                while($row=mysqli_fetch_assoc($res)){
                   $id=$row['id'];
                     $title=$row['title'];
                    $image=$row['image'];
                
                ?>
                 <a href="<?php echo SITE; ?>category-foods.php?cat_id=<?php echo $id;?>">
            <div class="box-3 float-container">
            <?php 
            if($image==""){
                echo "<div class='error'> Image not added;</div>";
            }else{
                ?>
                 <img src="<?php echo SITE;?>images/category/<?php echo $image;?>" alt="Pizza" width ="200px"class="img-responsive img-curve">
            <?php
            }

            
            ?>
               

                <h3 class="float-text text-white"><?php echo $title; ?></h3>
            </div>
            </a>  
                <?php
            }
        }else{
            echo "<div class='error'> category not added;</div>";
        }
            
            ?>
            
            

            

           
            
         


            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <!-- social Section Starts Here -->
    <?php include('./frontpartials/footer.php') ?>  