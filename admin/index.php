<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />
</head>

<body>
    <!-- upper-nav -->
    <div class="upper-nav primary-bg p-2 px-3 text-center text-break">
        <span>Admin Dashboard And Free Express Delivery</span>
    </div>
    <!-- upper-nav -->
    <!-- Start NavBar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">A1</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContentad" aria-controls="navbarSupportedContentad" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContentad">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Welcome Admin</a>
                    </li>
                    <li class="nav-item">
                    <button class="btn btn-primary p-0 px-1">
                            <a href="#" class="nav-link text-light">Logout</a>
                        </button>
                    </li>
                </ul>
                
            </div>
        </div>
    </nav>
    <!-- End NavBar -->
    <!-- Start Control Buttons -->
    <div class="control">
        <div class="container pt-4 pb-0">
            <div class="categ-header">
                <div class="sub-title">
                    <span class="shape"></span>
                    <span class="title">Admin Dashboard</span>
                </div>
                <h2>Manage Details Of Ecommerce</h2>
            </div>
            <div class="row align-items-center">
                <div class="col-md-2">
                    <div class="admin-image">
                        <a href="#"><img src="../assets/images/products/cameracanon.png" alt="Admin Photo"></a>
                        <p>Admin Name</p>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="buttons">
                        <button class="btn btn-outline-primary m-2">
                            <a href="#" class="nav-link">Insert Products</a>
                        </button>
                        <button class="btn btn-outline-primary m-2">
                            <a href="#" class="nav-link">View Products</a>
                        </button>
                        <button class="btn btn-outline-primary m-2">
                            <a href="index.php?insert_category" class="nav-link">Insert Categories</a>
                        </button>
                        <button class="btn btn-outline-primary m-2">
                            <a href="#" class="nav-link">View Categories</a>
                        </button>
                        <button class="btn btn-outline-primary m-2">
                            <a href="index.php?insert_brand" class="nav-link">Insert Brands</a>
                        </button>
                        <button class="btn btn-outline-primary m-2">
                            <a href="#" class="nav-link">view Brands</a>
                        </button>
                        <button class="btn btn-outline-primary m-2">
                            <a href="#" class="nav-link">All Orders</a>
                        </button>
                        <button class="btn btn-outline-primary m-2">
                            <a href="#" class="nav-link">All Payments</a>
                        </button>
                        <button class="btn btn-outline-primary m-2">
                            <a href="#" class="nav-link">List Users</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Control Buttons -->
        <!-- divider  -->
    <div class="container">
        <div class="divider"></div>
    </div>
    <!-- divider  -->
    <!-- Start Changed Page  -->
    <div class="change-page">
        <div class="container">
            <?php
            if(isset($_GET['insert_category'])){
                include('./insert_categories.php');
            }
            if(isset($_GET['insert_brand'])){
                include('./insert_brands.php');
            }
            ?>
        </div>
    </div>
    <!-- End Changed Page  -->







    <!-- Start Footer -->
    <!-- <div class="upper-nav primary-bg p-2 px-3 text-center text-break">
        <span>All CopyRight &copy;2023</span>
    </div> -->
    <!-- End Footer -->

    <script src="../assets//js/bootstrap.bundle.js"></script>
</body>

</html>