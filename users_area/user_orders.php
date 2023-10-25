<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Orders Page</title>
</head>

<body>
    <?php
        // access user id
        $username = $_SESSION['username'];
        $get_user_query = "SELECT * FROM `user_table` WHERE username='$username'";
        $get_user_result = mysqli_query($con,$get_user_query);
        $row_user_data = mysqli_fetch_array($get_user_result);
        $user_id = $row_user_data['user_id'];
    ?>
    <div class="container">
        <h3 class="text-center text-success mb-5">
            All my orders
        </h3>
        <table class="table table-bordered table-hover table-striped table-group-divider text-center">
            <thead>
                <tr>
                    <th>Serial NO.</th>
                    <th>Order Number</th>
                    <th>Amount due</th>
                    <th>Total Products</th>
                    <th>Invoice Number</th>
                    <th>Date</th>
                    <!-- <th>Complete/Incomplete</th> -->
                    <th>Status</th>
                    <th>Confirm</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $get_order_details_query = "SELECT * FROM `user_orders` WHERE user_id='$user_id'";
                    $get_order_details_result = mysqli_query($con,$get_order_details_query);
                    $serial_number = 1;
                    while($row_fetch_order_details = mysqli_fetch_array($get_order_details_result)){
                        $order_id = $row_fetch_order_details['order_id'];
                        $amount_due = $row_fetch_order_details['amount_due'];
                        $invoice_number = $row_fetch_order_details['invoice_number'];
                        $total_products = $row_fetch_order_details['total_products'];
                        $order_date = $row_fetch_order_details['order_date'];
                        $order_status = $row_fetch_order_details['order_status'];
                        $order_complete = $row_fetch_order_details['order_status'] == 'pending' ? 'Incomplete' : 'Complete';
                        echo $order_status == 'pending'? "
                        <tr>
                        <td>$serial_number</td>
                        <td>$order_id</td>
                        <td>$amount_due</td>
                        <td>$total_products</td>
                        <td>$invoice_number</td>
                        <td>$order_date</td>
                        <td>$order_status</td>
                        <td>
                            <a href='confirm_payment.php?order_id=$order_id' class='text-decoration-underline'>Confirm</a>
                        </td>
                    </tr>
                        ":"
                        <tr>
                        <td>$serial_number</td>
                        <td>$order_id</td>
                        <td>$amount_due</td>
                        <td>$total_products</td>
                        <td>$invoice_number</td>
                        <td>$order_date</td>
                        <td>$order_status</td>
                        <td>
                            Confirmed
                        </td>
                    </tr>
                        " ;
                        $serial_number++;
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>