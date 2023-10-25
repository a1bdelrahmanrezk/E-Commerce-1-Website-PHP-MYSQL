<?php
    // fetch all data
    if(isset($_GET['edit_brand'])){
        $edit_id = $_GET['edit_brand'];
        $get_data_query = "SELECT * FROM `brands` WHERE brand_id = $edit_id";
        $get_data_result = mysqli_query($con,$get_data_query);
        $row_fetch_data = mysqli_fetch_array($get_data_result);
        $brand_id = $row_fetch_data['brand_id'];
        $brand_title = $row_fetch_data['brand_title'];
    }
    // edit brand
    if(isset($_POST['update_brand'])){
        $brand_title = $_POST['brand_title'];
        // check empty fields 
        if(empty($brand_title)){
            echo "<script>window.alert('Please fill the field');</script>";
        }else{
            // update query 
            $update_brand_query = "UPDATE `brands` SET brand_title='$brand_title' WHERE brand_id = $edit_id";
            $update_brand_result = mysqli_query($con,$update_brand_query);
            if($update_brand_result){
                echo "<script>window.alert('Brand updated successfully');</script>";
                echo "<script>window.open('./index.php?view_brands','_self');</script>";
            }
        }
    }
    ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center mb-4">Edit Brand</h1>
            <form action="" method="post" enctype="multipart/form-data" class="d-flex flex-column gap-3 mb-3">
                <div class="form-outline">
                    <label for="brand_title" class="form-label">Product Title</label>
                    <input type="text" name="brand_title" id="brand_title" class="form-control" required value="<?php echo $brand_title;?>">
                </div>
                <div class="form-outline text-center">
                    <input type="submit" value="Update Brand" class="btn btn-primary" name="update_brand">
                </div>
            </form>
        </div>
    </div>
</div>