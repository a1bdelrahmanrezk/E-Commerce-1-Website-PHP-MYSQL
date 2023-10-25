<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users Page</title>
</head>

<body>
    <div class="container">
        <div class="categ-header">
            <div class="sub-title">
                <span class="shape"></span>
                <h2>All Users</h2>
            </div>
        </div>
        <div class="table-data">
            <table class="table table-bordered table-hover table-striped text-center">
                <thead class="table-dark">
                    <?php
                    $get_user_query = "SELECT * FROM `user_table`";
                    $get_user_result = mysqli_query($con, $get_user_query);
                    $row_count = mysqli_num_rows($get_user_result);
                    if($row_count!=0){
                        echo "
                        <tr>
                        <th>User No.</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Delete</th>
                    </tr>
                    ";
                    }
                    ?>
                </thead>
                <tbody>
                    <?php
                    //get User info
                    // $get_user_query = "SELECT * FROM `user_table`";
                    // $get_user_result = mysqli_query($con, $get_user_query);
                    // $row_count = mysqli_num_rows($get_user_result);
                    if ($row_count == 0) {
                        echo "<h2 class='text-center text-light p-2 bg-dark'>No users yet</h2>";
                    } else {
                        $id_number = 1;
                        while ($row_fetch_users = mysqli_fetch_array($get_user_result)) {
                            $user_id = $row_fetch_users['user_id'];
                            $username = $row_fetch_users['username'];
                            $user_email = $row_fetch_users['user_email'];
                            $user_image = $row_fetch_users['user_image'];
                            $user_address = $row_fetch_users['user_address'];
                            $user_mobile = $row_fetch_users['user_mobile'];
                            echo "
                            <tr>
                            <td>$id_number</td>
                            <td>$username</td>
                            <td>$user_email</td>
                            <td>
                                <img src='../users_area/user_images/$user_image' alt='$username photo' class='img-thumbnail' width='100px'/>
                            </td>
                            <td>$user_address</td>
                            <td>$user_mobile</td>
                            <td>
                                <a href='index.php?delete_user=$user_id' data-bs-toggle='modal' data-bs-target='#deleteModal_$user_id'>
                                <svg xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 448 512'><path d='M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z'/></svg>
                                </a>
                                <!-- Modal -->
                                <div class='modal fade' id='deleteModal_$user_id' tabindex='-1' aria-labelledby='deleteModal_$user_id.Label' aria-hidden='true'>
                                    <div class='modal-dialog modal-dialog-centered justify-content-center'>
                                        <div class='modal-content' style='width:80%;'>
                                            <div class='modal-body'>
                                                <div class='d-flex flex-column gap-3 align-items-center text-center'>
                                                    <span>
                                                        <svg width='50' height='50' viewBox='0 0 60 60' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                                            <circle cx='29.5' cy='30.5' r='26' stroke='#EA4335' stroke-width='3' />
                                                            <path d='M41.2715 22.2715C42.248 21.2949 42.248 19.709 41.2715 18.7324C40.2949 17.7559 38.709 17.7559 37.7324 18.7324L29.5059 26.9668L21.2715 18.7402C20.2949 17.7637 18.709 17.7637 17.7324 18.7402C16.7559 19.7168 16.7559 21.3027 17.7324 22.2793L25.9668 30.5059L17.7402 38.7402C16.7637 39.7168 16.7637 41.3027 17.7402 42.2793C18.7168 43.2559 20.3027 43.2559 21.2793 42.2793L29.5059 34.0449L37.7402 42.2715C38.7168 43.248 40.3027 43.248 41.2793 42.2715C42.2559 41.2949 42.2559 39.709 41.2793 38.7324L33.0449 30.5059L41.2715 22.2715Z' fill='#EA4335' />
                                                        </svg>
                                                    </span>
                                                    <h2>Are you sure?</h2>
                                                    <p>
                                                        Do you really want to delete these records? this process cannot be done.
                                                    </p>
                                                    <div class='btns d-flex gap-3'>
                                                        <button type='button' class='btn px-5 btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                                        <button type='button' class='btn px-5 btn-primary' data-bs-dismiss='modal'>
                                                            <a class='text-light' href='index.php?delete_payment=$user_id'>
                                                                Delete <strong>$username</strong>
                                                            </a>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal  -->
                            </td>
                        </tr>
                            ";

                            $id_number++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>