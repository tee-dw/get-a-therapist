<?php

error_reporting(E_ALL);
session_start();
require_once("classes/Therapist.php");
require_once("classes/Patient.php");
require_once("partials/specialization.php");

$data = $therapist->get_therapistbyid($_SESSION['therapist_online']);

$therapist_id = $_SESSION['therapist_online'];
$session = $therapist->get_session_by_therapistid($therapist_id);

$therapistImage = $therapist->fetch_dp_by_id($_SESSION['therapist_online']);

// print "<pre>";
// print_r($session);
// print "</pre>";
// die();

$patient_id = $_SESSION['patient_online'];


if (isset($_GET['therapist_id'])) {
    $therapist_id = $_GET['therapist_id'];
}

if (isset($_GET['patient_id'])) {
    $patient_id = $_GET['patient_id'];  
}


$details = $patient->get_details_byid($patient_id);
// print "<pre>";
// print_r($details);
// print "</pre>";
// die();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
    <title>Get A Therapist | Update Patient's Booking</title>
    <link rel="icon" type="image/ico" href="assets/images/gat-small-logo.ico" sizes="32x32">
</head>
<body>
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
                    <h1 class="display-5"><strong>My Dashboard</strong></h1>
                    <div>
                        <hr style="margin-left: 0;">
                    </div>
                    <p class="my-2">Welcome back! Update Your Profile...</p>
                </div>
            </div>
        </div>
        <!-- hero ends here -->
        <!-- Sub-header starts here -->
        <header class="p-3 border-bottom dashboard-header container-fluid">
            <div class="container-fluid">
              <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
               
                <ul class="member nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-start mb-md-0">
                    <li><a href="dashboard_therapist.php" class="nav-link px-2 " style="color:#EC993D"><b>My Profile</b><span class="divider">|</span></a></li>
                    <li><a href="dashboard_therapist.php#all-bookings" class="nav-link px-2 link-dark">All Bookings<span class="divider">|</span></a></li>
                    <li><a href="dashboard_therapist.php#all-sessions" class="nav-link px-2 link-dark">All Sessions<span class="divider">|</span></a></li>
                    <li><a href="blog.php" class="nav-link px-2 link-dark">My Blog</a></li>
                </ul>
        
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="uploads/<?php print $therapistImage; ?>" alt="mdo" width="32" height="35" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item" href="update_therapist_profile.php">Edit Profile</a></li>
                        <li><a class="dropdown-item" href="blog.php">My Blog</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="logout_therapist.php" id="logout">Sign out</a></li>
                    </ul>
                </div>
              </div>
            </div>
        </header>
        <!-- Sub-header ends here -->
    <div class="container">

        <form class="p-5 m-5" style="background-color:#E8EEF6; color:#14467C" action="process/process_update_patient_booking.php" method="post">
        <h3 class="my-4"><b>Update Patient's Booking</b></h3>
        <?php

            if(isset($_SESSION['therapist_feedback'])){
                print "<div class='alert alert-success'>" . $_SESSION['therapist_feedback'] . "</div>";
                unset($_SESSION['therapist_feedback']);
            }

        ?>

        <?php

            if(isset($_SESSION['error_message'])){
            print "<div class='alert alert-danger'>" . $_SESSION['error_message'] . "</div>";
            unset($_SESSION['error_message']);
            }

        ?>
        <hr class="mt-2 mb-5 w-100">
            <div class="form-group row mx-auto my-1">
            <input type="hidden" name="therapist_id" value="<?php print $therapist_id; ?>">
            <input type="hidden" name="patient_id" value="<?php print $patient_id; ?>">
                <div class="col-md-3 mb-3">
                    <label class="form-label" for="therapy-mode"><b>Therapy Mode</b></label>
                        <select name="therapy-mode" id="therapy-mode" class="form-select" disabled>
                            <option value=""><?php print $details['therapy_sessionmode']; ?></option>
                            
                        </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label" for="therapy-who"><b>Therapy for whom?</b></label>
                    <select name="therapy-who" id="therapy-who" class="form-select" disabled>
                        <option value=""><?php print $details['therapy_whom']; ?></option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="risk-check"><b><span style="color:#EC993D;">Risk Check</span> - Have you ever considered ending your life?</b></label>
                    <select name="risk-check" id="risk-check" class="form-select" disabled>
                        <option value=""><?php print $details['therapy_riskcheck']; ?></option>
                    </select>
                </div>
            </div>
            <div class="form-group row mx-auto my-1">
                <div class="col-md">
                    <label class="form-label" for="therapy-mode"><b>Message</b></label><br>
                    <textarea class="form-control" name="" id="" disabled><?php print $details['therapy_sessionpatientmsg']; ?></textarea>
                </div>
            </div>
            <div class="form-group row mx-auto my-3">
                <div class="col-md-2 mb-3">
                    <label class="form-label" for="duration"><b>Duration</b></label>
                    <input class="form-control" id="duration" name="duration" required type="text" value="<?php print ($details['therapy_sessionduration']); ?>" >
                </div>
                <div class="col-md-2 mb-3">
                    <label class="form-label" for="therapy-who"><b>Start Date</b></label>
                    <input class="form-control" name="date" type="date" value="<?php print ($details['therapy_sessiondate']); ?>">
                </div>
                <div class="col-md-2 mb-3">
                    <label class="form-label" for="therapy-who"><b>End Date</b></label>
                    <input class="form-control" name="end_date" type="date" value="<?php print ($details['therapy_end_date']); ?>">
                </div>
                <div class="col-md-2 mb-3">
                    <label class="form-label" for="status"><b>Booking Status</b></label>
                    <select name="status" id="status" class="form-select">
                        <option value="1" id="Pending">Pending</option>
                        <option value="2" id="Approved">Approved</option>
                    </select>
                    <input class="form-control" type="text" name="current_status" value="<?php print $details['therapy_bookingstatus']; ?>" disabled>
                </div>
                <div class="col-md-2 mb-3">
                    <label class="form-label" for="status_session"><b>Session Status</b></label>
                    <select name="status_session" id="status_session" class="form-select">
                        <option value="1">Active</option>
                        <option value="2">Completed</option>
                    </select>
                    <input class="form-control" type="text" name="current_status" value="<?php print $details['therapy_sessionstatus']; ?>" disabled>
                </div>
                <div class="col-md-2 mb-3">
                    <label class="form-label" for="phone"><b>Charge</b></label>
                    <input class="form-control noround" id="phone" name="phone" required type="text" value="<?php print ($data['therapists_amtperhour']); ?>" disabled>
                </div>
            </div>
            <div class="form-group row mx-auto my-1">
                <div class="col-md">
                    <label class="form-label" for="msg"><b>Response</b></label><br>
                    <textarea class="form-control" name="msg" id="msg"><?php print ($details['therapy_sessiontherapymsg']) ?></textarea>
                </div>
            </div>
            <hr class="my-4">
            <div class="form-group mb-3"> 
                <input class="btn btn-primary noround" id="btnbooking" name="btnbooking" type="submit" value="Update Booking"> 
            </div>
        </form>
    </div>

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