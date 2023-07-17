<?php 
// $con=mysqli_connect('localhost','root','','ecommerce_1');
$con = new mysqli('localhost','root','','ecommerce_1');
if(!$con){
    die(mysqli_error($con));
}




?>