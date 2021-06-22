
<?php
/* define('LOCALHOST','localhost:3307');
define('USERNAME','root');
define('PASSWORD','root');
define('DATABASE','food'); */

define('SITE','http://localhost/food_order/');
session_start();

$conn =mysqli_connect('localhost:3307', 'root','root')or die();
    $db_select=mysqli_select_db($conn,'food')or die();

    ?>