<?php

    error_reporting(E_ALL);
    session_start();
    require_once('classes/Admin.php');
    require_once('classes/Users.php');

    $data = $admin1->getadminbyid($_SESSION['admin_online']);

    // print_r($data);

    $adminImage = $admin1->fetch_dp_by_id($_SESSION['admin_online']);
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Symbols+Rounded">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="assets/fa/css/all.css" rel="stylesheet">
    <title>Admin Dashboard Edit Profile</title>
    <link rel="icon" type="image/ico" href="assets/images/gat-small-logo.ico" sizes="32x32">
</head>
<body>
<nav class="admin-header">
        <div class="gat-logo">
            <img src="assets/assets/img/getatherapist_logo.png" alt="logo"> 
        </div>
    </nav>   
    
        <div class="row admin-register">
            <div class="col-md">
                <form action="process/process_edit_profile.php" method="post">
                <h2>Update Admin Profile</h2>
                <?php
                    if(isset($_SESSION["error_message"])){
                        print "<div class='alert alert-danger'>". $_SESSION["error_message"] . "</div>";
                        unset($_SESSION["error_message"]);
                    };
                ?>
                    <div class="col-md d-flex">
                        <div class="form-floating col-md-6 mb-3">
                            <input class="form-control" id="admin-fname" name="fname" type="text" placeholder="First Name" value="<?php print $data['admin_fname'] ?>"/>
                            <label for="admin-fname">First Name</label>
                        </div>
                        <div class="form-floating col-md-6 mb-3">
                            <input class="form-control" id="admin-lname" name="lname" type="text" placeholder="Last Name" value="<?php print $data['admin_lname'] ?>" />
                            <label for="admin-lname">Last Name</label>
                        </div>
                    </div>
                    <div class="upload">
                        <div class="col-md">
                            <label class="form-label" for="upload">Upload Profile Picture</label>
                            <input type="file" class="form-control" id="upload" name="upload-dp">
                        </div>
                    </div>
                                     
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <button class="btn btn-primary col-12" type="submit" name="edit_btn">Update</button>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <a href="dashboard.php" class="mx-auto">My Dashboard</a>
                    </div>
                    
                </form>
            </div>
        </div>
    <footer>
        <small class="text-muted">Copyright &copy; Tobie 2023</small>
        <div>
            <a href="#">Privacy Policy</a>
                &middot;
            <a href="#">Terms &amp; Conditions</a>
        </div>
    </footer>
    <script src="script/jquery-3.7.1.min.js"></script>
    <script src="script/index.js"></script>
</body>
</html>