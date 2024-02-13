<?php

error_reporting(E_ALL);
session_start();
require_once("classes/Patient.php");
require_once("classes/Therapist.php");

$allTherapists = $therapist->get_all_therapists();
    // print "<pre>";
    // print_r($allTherapists);
    // print "</pre>";
    // die();


$allPatients = $patient->get_all_patients();
    // print "<pre>";
    // print_r($allPatients);
    // print "</pre>";
    // die();


    $data = $patient->get_patientbyid($_SESSION['patient_online']);

    $patientImage = $patient->fetch_dp_by_id($_SESSION['patient_online']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Therapy, Psychology, Counselling, Mental Health, Wellness"/>
	<meta name="description" content="A Lagos based Theraphy Hub, passionate about shaping the mental health of youths and families globally"/>
    <meta name="author" content="Oluwatobi"/>
	<meta property="og:title" content="Get A Therapist"/>
	<meta property="og:description" content="A Lagos based Theraphy Hub, passionate about shaping the mental health of youths and families globally"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Averia+Serif+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Symbols+Rounded">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/fa/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <title>Get A Therapist | Find Therapist</title>
    <link rel="icon" type="image/ico" href="assets/images/gat-small-logo.ico" sizes="32x32">
</head>
<body>
    <div class="container-fluid">
         <!-- header starts here -->
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a class="navbar-brand" href="index.php"><img src="assets/images/getatherapist_logo.png" class="" width="" height="100" alt="..."></a>
                        <div class="collapse navbar-collapse my-nav col-md-6" id="navbarTogglerDemo03">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.php">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.php">Contact Us</a>
                                </li>
                            </ul>
                            <form class="d-flex nav-form">

                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- header ends here -->
        <!-- hero starts here -->
        <div class="row login">
            <div class="col-md">
                <div class="text-overlay">
                    <h1 class="display-5"><strong>Find Your Therapist</strong></h1>
                    <div>
                        <hr style="margin-left: 0;">
                    </div>
                    <p class="my-2">We are excited to help you get wellness!</p>
                </div>
            </div>
        </div>
        <!-- hero ends here -->
        <!-- Login form starts here -->
        <header class="p-3 border-bottom dashboard-header container-fluid">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
               
                    <ul class="member nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-start mb-md-0">
                        <li><a href="dashboard_patient.php#my-profile" class="nav-link px-2" style="color:#EC993D;"><b>My Profile</b><span class="divider">|</span></a></li>
                        <li><a href="dashboard_patient.php#my-active-session" class="nav-link px-2 link-dark">My Active Session<span class="divider">|</span></a></li>
                        <li><a href="dashboard_patient.php#my-session-history" class="nav-link px-2 link-dark">My Session History<span class="divider">|</span></a></li>
                        <li><a href="dashboard_patient.php#resources" class="nav-link px-2 link-dark">Helpful Mental Health Resources<span class="divider">|</span></a></li>
                        <li><a href="addiction_therapy.php" class="nav-link px-2 link-dark"><b>Find Therapist</b></a></li>
                    </ul>
        
                    <div class="dropdown text-end">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="uploads/<?php print $patientImage; ?>" alt="mdo" width="32" height="35" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small">
                            <li><a class="dropdown-item" href="update_patient_profile.php">Edit Profile</a></li>
                            
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="logout_patient.php" id="logout">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- Menu ends here -->
        <!-- Aside begins here -->
        <!-- <div class="wrapper"> -->
            <!-- Main begins here -->
            <main class="the-main mt-5">
                <div class="col-md find-therapist">
                    <div class="find-therapist-div col-md-11 mx-auto">
                        <table class="table find-therapist-table">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Therapist</th>
                                    <th scope="col">Qualification</th>
                                    <th scopr="col">Professional Title</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Specification</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Charge/Session</th>
                                    <th scope="col">State</th>
                                    <th scope="col">Status</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                        
                        <?php
                            if ($allTherapists) {
                                foreach($allTherapists as $therapist) {
                                    $patient = $_SESSION['patient_online'] ?? null;

                                    $rowStyle = ($therapist['therapists_status'] != "Active") ? 'style="display: none;"' : '';
                        ?>
                            <tr <?php print $rowStyle ?> >
                                <td><img src="uploads/<?php print $therapist['therapists_profile_img']; ?>" alt="dp" width="32" height="35"></td>
                                <td class="therapist"><?php print $therapist['therapists_fname'] . " " . $therapist['therapists_lname']; ?></td>
                                <td><?php print $therapist['therapistsqualification_name'] ?></td>
                                <td><?php print $therapist['therapists_professional_title']?></td>
                                <td><?php print $therapist['therapists_gender'] ?></td>
                                <td><?php print $therapist['therapistspecialization_name']; ?></td>
                                <td scope="col"><?php print $therapist['therapists_email']; ?></td>
                                
                                <td>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-warning btn-sm"><b><?php print $therapist['therapists_amtperhour']; ?></b></button>

                                </td>
                                <td><?php print $therapist['state_name']; ?></td>
                                <td scope="col" style="color:green"><?php
                                
                                if($therapist['therapists_status'] == "Active"){
                                    print "<button class='btn btn-outline-success btn-sm'>" . $therapist['therapists_status'] . "</button>";
                                }else{
                                    print "";
                                }
                                
                                ?></td>
                                <td scope="col"><a href="book_session.php?therapist_id=<?php print $therapist['therapists_id']; ?>&patient_id=<?php print $patient; ?>" class="btn book_a_session col-md" type="button">Book Session</a></td>
                            </tr>
                        <?php
                                
                                }
                            }
                        ?>
                            </tbody>
                        </table>
                    </div>
              </div>
            </main>
        <!-- </div> -->
        <!-- Footer begins here -->
        <?php

            require_once("partials/footer.php");

        ?>
    <script>

        $(document).ready(function(){



            $("#logout").click(function(event) {
            
                if (!confirm("Are you sure you want to log out?")) {
                    event.preventDefault();
                } else{

                }
            });

        })
        
    </script>
</body>
</html>