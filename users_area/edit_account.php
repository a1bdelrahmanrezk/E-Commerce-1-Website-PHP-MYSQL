<?php
if(isset($_GET['edit_account'])){
    $user_session_name = $_SESSION['username'];
    $select_user_query = "SELECT * FROM `user_table` WHERE username='$user_session_name'";
    $select_user_result = mysqli_query($con,$select_user_query);
    $row_user_fetch = mysqli_fetch_array($select_user_result);
    $user_id = $row_user_fetch['user_id'];
    $username = $row_user_fetch['username'];
    $user_email = $row_user_fetch['user_email'];
    $user_address = $row_user_fetch['user_address'];
    $user_mobile = $row_user_fetch['user_mobile'];
    $user_image = $row_user_fetch['user_image'];
    
    
}
// Update data
if(isset($_POST['user_update'])){
    $update_id = $user_id;
    $update_user = $_POST['user_username'];
    $update_email = $_POST['user_email'];
    $update_address = $_POST['user_address'];
    $update_mobile = $_POST['user_mobile'];
    $update_image = $_FILES['user_image']['name'] != ''? $_FILES['user_image']['name'] : $user_image;
    $update_image_tmp = $_FILES['user_image']['tmp_name'];
    move_uploaded_file($update_image_tmp,"./user_images/$update_image");
    
    // update query 
    $update_query = "UPDATE `user_table` SET username='$update_user',user_email='$update_email',user_image='$update_image',user_address='$update_address',user_mobile='$update_mobile' WHERE user_id=$update_id";
    $update_result = mysqli_query($con,$update_query);
    if($update_result){
        $_SESSION['username'] = $update_user;
        echo "<script>window.alert('Data updated successfully');</script>";
        echo "<script>window.open('profile.php?edit_account','_self');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="text-center mb-3">Edit Account</h3>
                <form action="" method="post" enctype="multipart/form-data" class="d-flex flex-column gap-3">
                    <div class="form-outline">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" name="user_username" id="user_username" class="form-control" value="<?php echo $username;?>">
                    </div>
                    <div class="form-outline">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" name="user_email" id="user_email" class="form-control" value="<?php echo $user_email;?>">
                    </div>
                    <div class="form-outline d-flex">
                        <!-- <label for="user_image" class="form-label">User Photo</label> -->
                        <input type="file" name="user_image" id="user_image" value="<?php echo $user_image;?>" class="form-control">
                        <img src="./user_images/<?php echo $user_image;?>" height="80px" alt="<?php echo $username;?> Photo">
                    </div>
                    <div class="form-outline">
                        <label for="user_address" class="form-label">User Address</label>
                        <input type="text" name="user_address" id="user_address" class="form-control" value="<?php echo $user_address;?>">
                    </div>
                    <div class="form-outline">
                        <label for="user_mobile" class="form-label">User Mobile</label>
                        <input type="text" name="user_mobile" id="user_mobile" class="form-control" value="<?php echo $user_mobile;?>">
                    </div>
                    <div class="form-outline text-center">
                        <input type="submit" name="user_update" id="user_update" value="Update" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>