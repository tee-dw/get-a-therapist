<?php

    error_reporting(E_ALL);
    session_start();
    require_once('classes/Admin.php');
    require_once('classes/Users.php');

    $data = $admin1->getadminbyid($_SESSION['admin_online']);
    
    $msgs = $users->get_all_msgs();

    $blogs = $users->get_all_blogs();

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
    <link rel="stylesheet" href="css/style.css">
    <link href="assets/fa/css/all.css" rel="stylesheet">
    <title>Admin Dashboard | Messages</title>
    <link rel="icon" type="image/ico" href="assets/images/gat-small-logo.ico" sizes="32x32">
</head>
<body>
    <nav class="header">
        <div class="logo">
            <img src="../assets/images/getatherapist_logo.png" alt="logo"> 
        </div>
        <p>You are currently signed in as <b>Super Admin</b></p>
    </nav>
    <div class="container">
        <aside>
            <div class="top">
                <div class="close" id="close-btn">
                    <span class="material-symbols-rounded">close</span>
                </div>
            </div>

            <div class="sidebar">
                <a href="dashboard.php">
                    <span class="material-symbols-rounded">grid_view</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="all_therapists.php">
                    <span class="material-symbols-rounded">person</span>
                    <h3>Therapists</h3>
                </a>
                <a href="all_patients.php">
                    <span class="material-symbols-rounded">patient_list</span>
                    <h3>Patients</h3>
                </a>
                <a href="all_bookings.php">
                    <span class="material-symbols-rounded">lists</span>
                    <h3>Bookings</h3>
                </a>
                <a href="all_sessions.php">
                    <span class="material-symbols-rounded">groups</span>
                    <h3>Sessions</h3>
                </a>
                <a href="messages.php">
                    <span class="material-symbols-rounded">email</span>
                    <h3>Messages</h3>
                </a>
                <a href="#" class="active">
                    <span class="material-symbols-rounded">newsmode</span>
                    <h3>Blogs</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-rounded">manage_accounts</span>
                    <h3>Settings</h3>
                </a>
                <a href="logout.php">
                    <span class="material-symbols-rounded">logout</span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>

        <!-------------- END OF ASIDE -------------->

        <main>
            <div class="recent-updates">
                <h2>Recent Blogs</h2>
                <div class="updates">
                    <?php
                                        
                        foreach ($blogs as $blog) {
                                    
                    ?>

                
                    <div class="update">
                        <div class="profile-photo">
                            <img src="../upload/<?php print $blog['blog_img']; ?>" width="70%" alt="">
                        </div>
                        <div class="message">
                            <p><b><?php print $blog['blog_title']; ?></b> by <b><span style="color: blue"><?php print $blog['therapists_fname'] . ' ' . $blog['therapists_lname']; ?></span></b></p>
                            <p><?php print $blog['blog_caption']; ?></p>
                            <small><i><?php print $blog['blog_dateposted']; ?></i></small>
                        </div>
                    </div>
                
                    <?php

                        }

                    ?>
            </div>
        </main>
        <!----------------END OF MAIN------------------>

        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-symbols-rounded"> menu</span>
                </button>
                <div class="theme-toggler">
                    <span class="material-symbols-rounded active">light_mode</span>
                    <span class="material-symbols-rounded">dark_mode</span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p>Hey, <b><?php print ($data['admin_fname']); ?></b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="../assets/images/avatar-therapist.png" alt="img">
                    </div>
                </div>
            </div>
            <!-----------END OF TOP------------>
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