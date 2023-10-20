<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
// session_start();
if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];

}
// getting total items and total price of all items
// $select_id_ip = "SELECT * FROM `user_table` WHERE user_id = '$user_id'";
// $select_id_ip_rseult = mysqli_query($con,$select_id_ip);
// $fetchTheIpOfUser = mysqli_fetch_array($select_id_ip_rseult);
// $theIpOfUser = $fetchTheIpOfUser['user_ip'];
$get_ip_address = getIPAddress();
$total_price = 0;
$cart_query = "SELECT * FROM `card_details` WHERE ip_address= '$get_ip_address'";
$cart_result = mysqli_query($con,$cart_query);
$invoice_number = mt_rand();
$status = "pending";
$count_products = mysqli_num_rows($cart_result);
while($row_price=mysqli_fetch_array($cart_result)){
    $product_id = $row_price['product_id'];
    $product_quantity = $row_price['quantity']; // quantity of each product 
    $select_product = "SELECT * FROM `products` WHERE product_id= $product_id";
    $select_product_result = mysqli_query($con,$select_product);
    // getting total sum of all products
    while($row_product_price=mysqli_fetch_array($select_product_result)){
        $product_price = array($row_product_price['product_price']);
        $product_values = array_sum($product_price) * $product_quantity;
        $total_price+=$product_values;
        echo "Product Values" .  $product_values."<br/>";
        echo "Total Price" .  $total_price."<br/>";
        echo "Qauntity" .  $product_quantity."<br/>";
    }
    //Ordes Pending
    $insert_pending_order_query = "INSERT INTO `orders_pending` (user_id,invoice_number,product_id,quantity,order_status) VALUES ($user_id,$invoice_number,$product_id,$product_quantity,'$status')";
    $insert_pending_order_result = mysqli_query($con,$insert_pending_order_query);
}

// Insert Orders 
$insert_order_query = "INSERT INTO `user_orders` (user_id,amount_due,invoice_number,total_products,order_date,order_status) VALUES ($user_id,$total_price,$invoice_number,$count_products,NOW(),'$status')";
$insert_order_result = mysqli_query($con,$insert_order_query);
if($insert_order_result){
    echo "<script>window.alert('Orders are submitted successfully');</script>";
    echo "<script>window.open('profile.php','_self');</script>";
}


// Delete items from card
$empty_cart = "DELETE FROM `card_details` WHERE ip_address='$get_ip_address'";
$empty_cart_result = mysqli_query($con,$empty_cart);

