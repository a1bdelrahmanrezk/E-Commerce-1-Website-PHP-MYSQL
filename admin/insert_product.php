<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brand=$_POST['product_brand'];
    $product_price=$_POST['product_price'];
    $product_status='true';
    //access images
    $product_image_one=$_FILES['product_image_one']['name'];
    $product_image_two=$_FILES['product_image_two']['name'];
    $product_image_three=$_FILES['product_image_three']['name'];
    //access images tmp name
    $temp_image_one=$_FILES['product_image_one']['tmp_name'];
    $temp_image_two=$_FILES['product_image_two']['tmp_name'];
    $temp_image_three=$_FILES['product_image_three']['tmp_name'];
    //checking empty condition
    if($product_title == '' || $product_description == '' || $product_keywords == '' || $product_category == '' || $product_brand == '' || empty($product_price) || empty($product_image_one) || empty($product_image_two) || empty($product_image_three)){
        echo "<script>alert(\"Fields should not be empty\");</script>";
        exit();
    }else{
        //move folders
        move_uploaded_file($temp_image_one,"./product_images/$product_image_one");
        move_uploaded_file($temp_image_two,"./product_images/$product_image_two");
        move_uploaded_file($temp_image_three,"./product_images/$product_image_three");
        //insert query in db
        $insert_query = "INSERT INTO `products` (product_title,product_description,product_keywords,category_id,brand_id,product_image_one,product_image_two,product_image_three,product_price,date,status) VALUES ('$product_title','$product_description','$product_keywords','$product_category','$product_brand','$product_image_one','$product_image_two','$product_image_three','$product_price',NOW(),'$product_status')";
        $insert_result=mysqli_query($con,$insert_query);
        if($insert_result){
        echo "<script>alert(\"Product Inserted Successfully\");</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products - Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />
</head>

<body>
    <div class="container py-4 px-2">
        <div class="categ-header text-center mb-4">
            <!-- <div class="sub-title">
                    <span class="shape"></span>
                    <span class="title">Admin Dashboard</span>
                </div> -->
            <h2>Insert Products</h2>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <!-- title -->
                    <div class="form-outline mb-4">
                        <label for="product_title" class="form-label">Product Title</label>
                        <input type="text" placeholder="Enter Product Title" name="product_title" id="product_title" class="form-control" autocomplete="off" required>
                    </div>
                    <!-- description -->
                    <div class="form-outline mb-4">
                        <label for="product_description" class="form-label">Product Description</label>
                        <input type="text" placeholder="Enter Product Description" name="product_description" id="product_description" class="form-control" autocomplete="off" required>
                    </div>
                    <!-- keywords -->
                    <div class="form-outline mb-4">
                        <label for="product_keywords" class="form-label">Product Keywords</label>
                        <input type="text" placeholder="Enter Product Keywords" name="product_keywords" id="product_keywords" class="form-control" autocomplete="off" required>
                    </div>
                    <!-- categories -->
                    <div class="form-outline mb-4">
                        <select class="form-select" name="product_category" id="product_category">
                            <option selected disabled>Select a Cateogry</option>
                            <?php
                            $select_query = 'SELECT * FROM `categories`';
                            $select_result = mysqli_query($con, $select_query);
                            while ($row = mysqli_fetch_assoc($select_result)) {
                                $category_title = $row['category_title'];
                                $category_id = $row['category_id'];
                                echo "
                                        <option value='$category_id'>$category_title</option>
                                        ";
                            }
                            ?>
                        </select>
                    </div>
                    <!-- brands -->
                    <div class="form-outline mb-4">
                        <select class="form-select" name="product_brand" id="product_brand">
                            <option selected disabled>Select a Brand</option>
                            <?php
                            $select_query = 'SELECT * FROM `brands`';
                            $select_result = mysqli_query($con, $select_query);
                            while ($row = mysqli_fetch_assoc($select_result)) {
                                $brand_title = $row['brand_title'];
                                $brand_id = $row['brand_id'];
                                echo "
                                        <option value='$brand_id'>$brand_title</option>
                                        ";
                            }
                            ?>
                        </select>
                    </div>
                    <!-- Image one -->
                    <div class="form-outline mb-4">
                        <label for="product_image_one" class="form-label">Product Image One</label>
                        <input type="file" name="product_image_one" id="product_image_one" class="form-control" required>
                    </div>
                    <!-- Image two -->
                    <div class="form-outline mb-4">
                        <label for="product_image_two" class="form-label">Product Image Two</label>
                        <input type="file" name="product_image_two" id="product_image_two" class="form-control" required>
                    </div>
                    <!-- Image three -->
                    <div class="form-outline mb-4">
                        <label for="product_image_three" class="form-label">Product Image Three</label>
                        <input type="file" name="product_image_three" id="product_image_three" class="form-control" required>
                    </div>
                    <!-- Price -->
                    <div class="form-outline mb-4">
                        <label for="product_price" class="form-label">Product Price</label>
                        <input type="number" placeholder="Enter Product Price" name="product_price" id="product_price" class="form-control" autocomplete="off" required>
                    </div>
                    <!--  -->
                    <div class="form-outline mb-4">
                        <input type="submit" value="Insert Product" name="insert_product" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>