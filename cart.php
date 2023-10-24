<?php
include('./includes/connect.php');
include('./functions/common_functions.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Cart Details Page</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.css" />
    <link rel="stylesheet" href="./assets/css/main.css" />
</head>

<body>
    <!-- upper-nav -->
    <div class="upper-nav primary-bg p-2 px-3 text-center text-break">
        <span>Summer Sale For All Swim Suits And Free Express Delivery - OFF 50%! <a>Shop Now</a></span>
    </div>
    <!-- upper-nav -->
    <!-- Start NavBar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">A1</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active"  href="./index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./products.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <?php
                        if(isset($_SESSION['username'])){                            
                            echo "
                            <li class='nav-item'>
                            <a class='nav-link' href='./users_area/profile.php'>My Account</a>
                        </li>";
                        }
                        else{
                            echo "
                            <li class='nav-item'>
                            <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
                        </li>";
                        }
                    ?>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="./cart.php"><svg width="28" height="28" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 27C11.5523 27 12 26.5523 12 26C12 25.4477 11.5523 25 11 25C10.4477 25 10 25.4477 10 26C10 26.5523 10.4477 27 11 27Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M25 27C25.5523 27 26 26.5523 26 26C26 25.4477 25.5523 25 25 25C24.4477 25 24 25.4477 24 26C24 26.5523 24.4477 27 25 27Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M3 5H7L10 22H26" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M10 16.6667H25.59C25.7056 16.6667 25.8177 16.6267 25.9072 16.5535C25.9966 16.4802 26.0579 16.3782 26.0806 16.2648L27.8806 7.26479C27.8951 7.19222 27.8934 7.11733 27.8755 7.04552C27.8575 6.97371 27.8239 6.90678 27.7769 6.84956C27.73 6.79234 27.6709 6.74625 27.604 6.71462C27.5371 6.68299 27.464 6.66661 27.39 6.66666H8" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <sup>
                                <?php
                                cart_item();
                                ?>
                            </sup>
                            <span class="d-none">
                                Total Price is: 
                                <?php
                                total_cart_price();
                                ?>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" class="d-flex align-items-center gap-1" href="#">
                            <svg width="28" height="28" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M24 27V24.3333C24 22.9188 23.5224 21.5623 22.6722 20.5621C21.8221 19.5619 20.669 19 19.4667 19H11.5333C10.331 19 9.17795 19.5619 8.32778 20.5621C7.47762 21.5623 7 22.9188 7 24.3333V27" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16.5 14C18.9853 14 21 11.9853 21 9.5C21 7.01472 18.9853 5 16.5 5C14.0147 5 12 7.01472 12 9.5C12 11.9853 14.0147 14 16.5 14Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <?php
                                if(!isset($_SESSION['username'])){
                                    echo "<span>
                                    Welcome guest
                                </span>";
                            }else{
                                    echo "<span>
                                    Welcome ".$_SESSION['username']. "</span>";
                                }
                                ?>
                        </a>
                    </li>
                    <?php
                    if(!isset($_SESSION['username'])){
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='./users_area/user_login.php'>
                            Login
                        </a>
                    </li>";
                }else{
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='./users_area/logout.php'>
                            Logout
                        </a>
                    </li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End NavBar -->

    <!-- Start Table Section -->
    <div class="landing">
        <div class="container">
            <div class="row py-5 m-0">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <table class="table table-bordered table-hover table-striped table-group-divider text-center">

                        <!-- display data in cart  -->
                        <?php
                        $getIpAddress = getIPAddress();
                        $total_price = 0;
                        $cart_query = "SELECT * FROM `card_details` WHERE ip_address='$getIpAddress'";
                        $cart_result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($cart_result);
                        if ($result_count > 0) {
                            echo "
                                <thead>
                                    <tr class='d-flex flex-column d-md-table-row '>
                                        <th>Product Title</th>
                                        <th>Product Image</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Remove</th>
                                        <th colspan='2'>Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                ";
                            while ($row = mysqli_fetch_array($cart_result)) {
                                $product_id = $row['product_id'];
                                $product_quantity = $row['quantity'];
                                $select_product_query = "SELECT * FROM `products` WHERE product_id=$product_id";
                                $select_product_result = mysqli_query($con, $select_product_query);
                                while ($row_product_price = mysqli_fetch_array($select_product_result)) {
                                    $product_price = array($row_product_price['product_price']);
                                    $price_table = $row_product_price['product_price'];
                                    $product_id = $row_product_price['product_id'];
                                    $product_title = $row_product_price['product_title'];
                                    $product_image_one = $row_product_price['product_image_one'];
                                    $product_values = array_sum($product_price);
                                    $total_price += $product_values * $product_quantity;
                        ?>
                                    <!-- display data in cart  -->
                                    <tr class="d-flex flex-column d-md-table-row ">
                                        <td>
                                            <?php echo $product_title; ?>
                                        </td>
                                        <td><img src="./admin/product_images/<?php echo $product_image_one; ?>" class="img-thumbnail" alt="<?php echo $product_title; ?>"></td>
                                        <td>
                                            <input type="number" class="form-control w-50 mx-auto" min="1" name="qty_<?php echo $product_id; ?>">
                                        </td>
                                        <?php
                                        // $total_price += $product_values * $product_quantity;
                                        // echo "<h1>total_priceafter: $total_price</h1><br/>";
                                        $getIpAddress = getIPAddress();
                                        if (isset($_POST['update_cart'])) {
                                            $itemsOfProduct = 'qty_' . $product_id;
                                            $quantities = $_POST[$itemsOfProduct];
                                            if (!empty($quantities)) {
                                                $update_cart_query = "UPDATE `card_details` SET quantity = $quantities WHERE ip_address='$getIpAddress' AND product_id=$product_id;";
                                                // $update_cart_query = "UPDATE `card_details` SET quantity = $quantities WHERE ip_address='$getIpAddress' AND product_id=$product_id;";
                                                $update_cart_result = mysqli_query($con, $update_cart_query);
                                            }
                                            // echo "<script>location.reload(1);</script>";
                                            // header('Location: '.$_SERVER['REQUEST_URI']);
                                            // header("refresh: 2");
                                            // echo "<h1>total_price after: $total_price</h1><br/>";
                                            echo "<script>window.open('cart.php','_self');</script>";
                                        }
                                        ?>
                                        <td>
                                            <?php echo $price_table; ?>
                                        </td>
                                        <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                                        <td>
                                            <!-- <button class="btn btn-dark">Update</button> -->
                                            <input type="submit" value="Update" class="btn btn-dark" name="update_cart">
                                        </td>
                                        <td>
                                            <!-- <button class="btn btn-primary">Remove</button> -->
                                            <input type="submit" value="Remove" class="btn btn-primary" name="remove_cart">
                                        </td>
                                    </tr>
                        <?php   }
                            }
                        }else{
                            echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                        }
                        ?>
                        </tbody>
                    </table>
                    <!-- SubTotal -->
                    <div class="d-flex align-items-center gap-4 flex-wrap">
                        <?php
                        $getIpAddress = getIPAddress();
                        $cart_query = "SELECT * FROM `card_details` WHERE ip_address='$getIpAddress'";
                        $cart_result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($cart_result);
                        if ($result_count > 0) {
                            echo "
                        <h4>Sub-Total: <strong class='text-2'> $total_price</strong></h4>
                        
                        <input type='submit' value='Continue Shopping' class='btn btn-dark' name='continue_shopping'>
                        <button class='btn btn-dark'><a class='text-light' href='./index.php'>Continue Shopping</a></button>
                        
                        <input type='submit' value='Checkout' class='btn btn-dark' name='checkout'>
                        <button class='btn btn-dark'><a class='text-light' href='./users_area/checkout.php'>Checkout</a></button>
                        ";
                        }else{
                            echo "<input type='button' value='Continue Shopping' class='btn btn-dark' name='continue_shopping'>";
                        }
                        if(isset($_POST['continue_shopping'])){
                            // echo "<script>window.open('index.php','_self');</script>";
                            // unset($_POST['continue_shopping']);
                        }else if(isset($_POST['checkout'])){
                            // unset($_POST['checkout']);
                            // echo "<script>window.open('./users_area/checkout.php','_self');</script>";
                        }
                        ?>
                    </div>
                    <!-- SubTotal -->
                </form>
                <!-- function to remove items  -->
                <?php
                function remove_cart_item()
                {
                    global $con;
                    if (isset($_POST['remove_cart'])) {
                        foreach ($_POST['removeitem'] as $remove_id) {
                            $delete_query = "DELETE FROM `card_details` WHERE product_id=$remove_id";
                            $delete_run_result = mysqli_query($con, $delete_query);
                            if ($delete_run_result) {
                                echo "<script>window.open('cart.php','_self');</script>";
                            }
                        }
                    }
                }
                echo $remove_item = remove_cart_item();
                ?>
                <!-- function to remove items  -->
            </div>
        </div>
        <!-- put it here -->
    </div>

    <!-- End Table Section -->













    <!-- divider  -->
    <!-- <div class="container">
        <div class="divider"></div>
    </div> -->
    <!-- divider  -->




    <!-- Start Footer -->
    <!-- <div class="upper-nav primary-bg p-2 px-3 text-center text-break">
        <span>All CopyRight &copy;2023</span>
    </div> -->
    <!-- End Footer -->

    <script src="./assets//js/bootstrap.bundle.js"></script>
</body>

</html>