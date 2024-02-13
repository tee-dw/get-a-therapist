<?php

    error_reporting(E_ALL);
    session_start();
    require_once('classes/Admin.php');
    require_once('classes/Users.php');

    $data = $admin1->getadminbyid($_SESSION['admin_online']);

    $patients = $users->get_all_patients();
    

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
    <title>Admin Dashboard | All Patients</title>
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
                <a href="#" class="active">
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
                    <span class="material-symbols-rounded">mail</span>
                    <h3>Messages</h3>
                </a>
                <a href="blogs.php">
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

        <main>
            <div class="recent-bookings">
                <h2>All Patients</h2>
                <table>
                <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>State</th>
                            <th>LGA</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                                      
                            foreach ($patients as $patient) {
                                      
                        ?>

                        <tr>

                            <td><img src="../uploads/<?php print $patient['patients_profile_img']; ?>" width="" height="27" style="border-radius:10%"></td>
                            <td><?php print $patient['patients_fname'] . ' ' . $patient['patients_lname']; ?></td>
                            <td><?php print $patient['patients_email']; ?></td>
                            <td><?php print $patient['patients_phone']; ?></td>
                            <td><?php print $patient['patients_gender']; ?></td>
                            <td><?php print $patient['state_name']; ?></td>
                            <td><?php print $patient['lga_name']; ?></td>
                            <td><a href="">view details</a></td>

                        </tr>

                        <?php

                            }

                        ?>
                        
                    </tbody>
                </table>
                <a href="#">Show All</a>
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

            <div class="therapist-details">
                <h2>Patient Details</h2>
                <div class="details">
                    <div class="recent-bookings">
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Signup date</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
                                      
                                    foreach ($patients as $patient) {
                                          
                                ?>

                                <tr>
                                    <td><?php print $patient['patients_fname'] . ' ' . $patient['patients_lname']; ?></td>
                                    <td><?php print $patient['patients_datesubscribed'] ?></td>
                                </tr>

                                <?php

                                    }

                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                
                </div>
            </div>
            <!-----------END OF DETAILS------------>
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