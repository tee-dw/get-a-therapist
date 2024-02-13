<?php

    error_reporting(E_ALL);
    session_start();
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
    <title>Admin Dashboard | Login</title>
    <link rel="icon" type="image/ico" href="assets/images/gat-small-logo.ico" sizes="32x32">
</head>
<body>
    <nav class="admin-header">
        <div class="gat-logo">
            <img src="assets/assets/img/getatherapist_logo.png" alt="logo"> 
        </div>
    </nav>   
    
        <div class="row admin-login">
            <div class="col-md">
                <form action="process/process_login.php" method="post">
                <h2>Admin Login</h2>
                <?php
                    // if(isset($_SESSION["admin_feedback"])){
                    //     print "<div class='alert alert-success'>". $_SESSION["admin_feedback"] . "</div>";
                    //     unset($_SESSION["admin_feedback"]);
                    // };
                ?>
                <?php
                    if(isset($_SESSION["error_message"])){
                        print "<div class='alert alert-danger'>". $_SESSION["error_message"] . "</div>";
                        unset($_SESSION["error_message"]);
                    };
                ?>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="admin-email" name="email" type="email" placeholder="name@example.com" />
                        <label for="admin-email">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="admin-pwd" name="password" type="password" placeholder="Password" />
                        <label for="admin-pwd">Password</label>
                    </div>
                                            
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <button class="btn btn-primary col-12" type="submit" name="login_btn">Login</button>
                    </div>
                </form>
            </div>
        </div>

    <footer>
        <small class="text-muted">Copyright &copy; Tobie 2023</small>
        <div>
            <a href="#">Privacy Policy</a>&middot;<a href="#">Terms &amp; Conditions</a>
        </div>
    </footer>
    <script src="script/jquery-3.7.1.min.js"></script>
    <script src="script/index.js"></script>
</body>
</html>
