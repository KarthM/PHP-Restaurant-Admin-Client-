<?php  include('./frontpartials/nav.php')?>

<div class="main-content">
        
        <div class="wrapper">
        <h3 class="text-center">Contact  </h3>
<section class="contact">
        <div class="container">
  <form action="" method="POST">

    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="First name.."required>

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="last name.."required>

    <label for="country">Country</label>
    <select id="country" name="country">
      <option value="uk">UK</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select>

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="message" style="height:200px" required></textarea>
 
    <input type="submit" value="Submit" name="contact_btn" class="btn-primary" style="width:100px ";>

  </form>
</div>
            
         <div class="clearfix"></div>
</section>
       </div>
</div>


<?php  include('./frontpartials/footer.php')?>







