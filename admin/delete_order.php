<?php
    if(isset($_GET['delete_order'])){
        $delete_id = $_GET['delete_order'];
        // delete from user orders
        $delete_query = "DELETE FROM `user_orders` WHERE order_id = $delete_id";
        $delete_result = mysqli_query($con,$delete_query);
        // delete from orders pending [first -> fetch invoice number from user_orders, then delete from orders pending using invoice_number]
        // $get_invoice_query = "SELECT * FROM `user_orders` WHERE order_id = $delete_id";
        // $get_invoice_result = mysqli_query($con,$get_invoice_query);
        // $row_fetch_invoice = mysqli_fetch_array($get_invoice_result);
        // $invoice_to_delete = $row_fetch_invoice['invoice_number'];
        // $delete_orders_pending_query = "DELETE FROM `orders_pending` WHERE invoice_number = '$invoice_to_delete'";
        // $delete_orders_pending_result = mysqli_query($con,$delete_orders_pending_query);
        if($delete_result){
            echo "<script>window.alert('Order deleted successfully');</script>";
            echo "<script>window.open('index.php?list_orders','_self');</script>";
        }

    }
?>