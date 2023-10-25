<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Admin Registration</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />
</head>

<body>

    <!-- Start Landing Section -->
    <div class="landing admin-register">
        <div class="">
            <h2 class="text-center mb-1">Admin Registration</h2>
            <h4 class="text-center mb-3 fw-light">Create an account</h4>
            <div class="row m-0">
                <div class="col-md-6 p-0 d-none d-md-block">
                    <img src="../assets/images/bgregister.png" class="admin-register" alt="Register photo">
                </div>
                <div class="col-md-6 py-4 px-5 d-flex flex-column gap-4">
                    <div>
                        <form action="" method="post" class="d-flex flex-column gap-4" enctype="multipart/form-data">
                            <div class="form-outline">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" required>
                            </div>
                            <div class="form-outline">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email" required>
                            </div>
                            <div class="form-outline">
                                <label for="admin_image" class="form-label">Admin Image</label>
                                <input type="file" name="admin_image" id="admin_image" class="form-control" required>
                            </div>
                            <div class="form-outline">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your Password" required>
                            </div>
                            <div class="form-outline">
                                <label for="conf_password" class="form-label">Confirm Password</label>
                                <input type="password" name="conf_password" id="conf_password" class="form-control" placeholder="Confirm your Password" required>
                            </div>
                            <div class="form-outline">
                                <input type="submit" value="Register" class="btn btn-primary mb-3" name="admin_register">
                                <p class="small">
                                    You already have an account? <a href="./admin_login.php" class="text-decoration-underline text-success fw-bold">Login</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Landing Section -->





    <!-- Start Footer -->
    <!-- <div class="upper-nav primary-bg p-2 px-3 text-center text-break">
        <span>All CopyRight &copy;2023</span>
    </div> -->
    <!-- End Footer -->

    <script src="../assets/js/bootstrap.bundle.js"></script>
</body>

</html>
<!-- php code  -->
<?php
if (isset($_POST['admin_register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash_password = password_hash($password,PASSWORD_DEFAULT);
    $conf_password = $_POST['conf_password'];
    $image = $_FILES['admin_image']['name'];
    $image_tmp = $_FILES['admin_image']['tmp_name'];
    // check if user exist or not
    $select_query = "SELECT * FROM `admin_table` WHERE admin_name='$username' OR admin_email='$email'";
    $select_result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($select_result);
    if ($rows_count > 0) {
        echo "<script>window.alert('Username | Email already exist');</script>";
    } else if ($password != $conf_password) {
        echo "<script>window.alert('Passwords are not match');</script>";
    } else {
        // insert query
        move_uploaded_file($image_tmp, "./admin_images/$image");
        $insert_query = "INSERT INTO `admin_table` (admin_name,admin_email,admin_image,admin_password) VALUES ('$username','$email','$image','$hash_password')";
        $insert_result = mysqli_query($con, $insert_query);
        if ($insert_result) {
            echo "<script>window.alert('Admin added successfully');</script>";
        } else {
            die(mysqli_error($con));
        }
    }
}
?>