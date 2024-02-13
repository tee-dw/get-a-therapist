<?php

    error_reporting(E_ALL);
    session_start();
    require_once('classes/Admin.php');
    require_once('classes/Booking.php');
    require_once('classes/Users.php');
    require_once('admin_guard.php');
    // require_once('../../classes/Patient.php');
    // require_once('../../classes/Therapist.php');
    

    $data = $admin1->getadminbyid($_SESSION['admin_online']);

    // $patient_data = $patient->get_patientbyid($_SESSION['patient_online']);

    // $therapist_data = $therapist->get_therapistbyid($_SESSION['therapist_online']);

    $bookings = $book->getallbookings();

    // print "<pre>";
    // print_r($bookings);
    // print "</pre>";
    // die();

    $countBookings = $book->countBookings();

    $countTherapists = $users->countTherapists();
    $countPatients = $users->countPatients();

    $msgs = $users->get_all_msgs();
    

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
    <!-- <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet"> -->
    <title>Admin Dashboard</title>
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
                <a href="#" class="active">
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
                <a href="messages.php" >
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

        <!-------------- END OF ASIDE -------------->

        <main>
                <?php
                    if(isset($_SESSION["admin_feedback"])){
                        print "<div class='alert alert-success'>". $_SESSION["admin_feedback"] . "</div>";
                        unset($_SESSION["admin_feedback"]);
                    };
                ?>
            <div class="insights">
                <div class="therapists">
                    <span class="material-symbols-rounded">account_circle</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Therapist(s)</h3>
                            <h1><?php print $countTherapists; ?></h1>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 Hrs</small>
                </div>

                <!------------END OF THERAPISTS------------>

                <div class="patients">
                    <span class="material-symbols-rounded">recent_patient</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Patient(s)</h3>
                            <h1><?php print $countPatients ?></h1>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 Hrs</small>
                </div>

                <!------------END OF PATIENTS------------>

                <div class="income">
                    <span class="material-symbols-rounded">attach_money</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Income</h3>
                            <h1>₦673,500</h1>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 Hrs</small>
                </div>

                <!------------END OF INCOME------------>
            </div>

            <!------------END OF INSIGHTS----------->
            <div class="recent-bookings">
                <h2>Recent Bookings</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Therapist Name</th>
                            <th>Patient Name</th>
                            <th>Hours Booked</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                      
                            foreach ($bookings as $book) {
                                      
                        ?>

                        <tr>

                            <td><?php print $book['therapists_fname'] . ' ' . $book['therapists_lname']; ?></td>
                            <td><?php print $book['patients_fname'] . ' ' . $book['patients_lname']; ?></td>
                            <td><?php print $book['therapy_sessionduration']; ?></td>
                            <td></td>
                            <td>

                                <?php

                                    $bookingsession = $book['therapy_bookingstatus'];
                                        if($bookingsession != "Approved"){
                                            print '<button type="submit" class="booking-btn-bad">' . $bookingsession . '</button>';
                                        }else{
                                            print '<button type="button" class="booking-btn-good">' . $bookingsession . '</button>';
                                        }

                                ?>

                            </td>
                            <td><a href="#">view more details</a></td>

                        </tr>

                        <?php

                            }

                        ?>
                        
                    </tbody>
                </table>
                <a href="all_sessions.php">Show All</a>
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
                        <a href="edit_profile.php"><small class="text-muted">Edit your profile</small></a>
                    </div>
                    <div class="dropdown text-end profile-photo">
                        <img src="../assets/images/avatar-therapist.png" width="38" height="38" style="border-radius:50%">
                    </div>
                </div>
            </div>
            <!-----------END OF TOP------------>

            <div class="recent-updates">
                <h2>Messages</h2>
                <div class="updates">
                    <?php
                                        
                        foreach ($msgs as $msg) {
                                    
                    ?>

                
                    <div class="update">
                        <div class="profile-photo">
                            <span class="material-symbols-rounded">mail</span>
                        </div>
                        <div class="message">
                            <p><b><?php print $msg['firstname'] . ' ' . $msg['lastname']; ?></b> said, <?php print '"' . $msg['messages'] . '"'?></p>
                            <small class="text-muted"><?php print $msg['date_posted'] ?></small>
                        </div>
                    </div>
                
                    <?php

                        }

                    ?>
                </div>
            </div>
            <!---------------END OF RECENT UPDATES--------------->

            <div class="session-analytics">
                <h2>Booking Analytics</h2>
                <div class="item online">
                    <div class="icon">
                        <span class="material-symbols-rounded">lists</span>
                    </div>
                    <div class="rightside">
                        <div class="info">
                            <h3>BOOKINGS</h3>
                        </div>
                        <span class="material-symbols-rounded">trending_up</span>
                        <h3><?php print $countBookings ?> Session(s)</h3>
                    </div>
                </div>
            </div>
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