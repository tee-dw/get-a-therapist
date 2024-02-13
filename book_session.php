<?php

error_reporting(E_ALL);
session_start();
require_once("classes/Therapist.php");
require_once("classes/Patient.php");

// $data = $patient->get_patientbyid($_SESSION['patient_online']);

$patientImage = $patient->fetch_dp_by_id($_SESSION['patient_online']);

$therapist_id = $_SESSION['therapist_online'];
$patient_id = $_SESSION['patient_online'];

if (isset($_GET['therapist_id'])) {
    $therapist_id = $_GET['therapist_id'];

}


if (isset($_GET['patient_id'])) {
    $patient_id = $_GET['patient_id'];
    
}

$allTherapists = $therapist->get_all_therapists();

$therapist = $therapist->get_therapistbyid($therapist_id);
// print "<pre>";
// print_r($therapist);
// print "</pre>";
// die();

$data = $patient->get_patientbyid($_SESSION['patient_online']);

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
    <title>Get A Therapist | Book Session</title>
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
                    <h1 class="display-5"><strong>Booking Time</strong></h1>
                    <div>
                        <hr style="margin-left: 0;">
                    </div>
                    <p class="my-2">Welcome! Now it's time to book your session</p>
                </div>
            </div>
        </div>
        <!-- hero ends here -->
        <!-- Sub-header starts here -->
        <header class="p-3 border-bottom dashboard-header container-fluid">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
               
                    <ul class="member nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-start mb-md-0">
                        <li><a href="dashboard_patient.php" class="nav-link px-2" style="color:#EC993D;"><b>My Profile</b><span class="divider">|</span></a></li>
                        <li><a href="dashboard_patient.php" class="nav-link px-2 link-dark">My Active Session<span class="divider">|</span></a></li>
                        <li><a href="dashboard_patient.php" class="nav-link px-2 link-dark">My Session History<span class="divider">|</span></a></li>
                        <li><a href="dashboard_patient.php" class="nav-link px-2 link-dark">Helpful Mental Health Resources<span class="divider">|</span></a></li>
                        <li><a href="all_therapy.php" class="nav-link px-2 link-dark"><b>Find Therapist</b></a></li>
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
        <!-- Sub-header ends here -->
    <div class="container">
        <form class="p-5 m-5" style="background-color:#E8EEF6; color:#14467C" action="process/process_book_session.php" method="post">
        <h3 class="my-4"><b>Book Your <span style="font-family:'Averia Serif Libre', serif; color:#EC993D; font-style:italic;">Therapy</span> Session</b> with <b><?php print $therapist['therapists_fname'] . ' ' . $therapist['therapists_lname']; ?></b></h3>
        <hr class="mt-2 mb-5 w-100">
        <?php

            if(isset($_SESSION['patient_feedback'])){
                print "<div class='alert alert-success'>" . $_SESSION['patient_feedback'] . "</div>";
                unset($_SESSION['patient_feedback']);
            }

        ?>

        <?php

            if(isset($_SESSION['error_message'])){
            print "<div class='alert alert-danger'>" . $_SESSION['error_message'] . "</div>";
            unset($_SESSION['error_message']);
            }

        ?>
            <input type="hidden" name="therapist_id" value="<?php print $therapist_id; ?>">
            <input type="hidden" name="patient_id" value="<?php print $patient_id; ?>">
            <div class="form-group row mx-auto my-3">
                <label class="form-label col-md" for="therapists_bio"><b>Read <?php print $therapist['therapists_fname'] . ' ' . $therapist['therapists_lname'] . "'s" . ' ' . "Bio"; ?></b> (Drag the down-right part of the field down to read full bio)</label><br>
                <textarea class="form-control" name="therapists_bio" id="bio" disabled><?php print $therapist['therapists_bio'] ?></textarea>
            </div>
            <div class="form-group row mx-auto d-flex">
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="therapy-mode"><b>Do you want an offline or an online Therapy Session?</b></label>
                    <select name="therapy-mode" id="therapy-mode" class="form-select">                      
                        <option value="1">Online</option>
                        <option value="2">Offline</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="therapy-who"><b>Who needs this Therapy?</b></label>
                    <select name="therapy-who" id="therapy-who" class="form-select">
                        <option value="1">Myself</option>
                        <option value="2">Another person</option>
                    </select>
                </div>
            </div>
            <div class="form-group row mx-auto d-flex">
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="therapy-who"><b>When do you want to begin your Therapy?</b></label>
                    <input class="form-control" type="date" name="date">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="risk-check"><b><span style="color:#EC993D;">Risk Check</span> - Have you ever considered ending your life?</b></label>
                    <select name="risk-check" id="risk-check" class="form-select">
                        <option value="No, Never">No, Never</option>
                        <option value="I have thought about it, but would never act on it">I have thought about it, but would never act on it</option>
                        <option value="I have made plans or attempted to end my life within the past 3 months">I have made plans or attempted to end my life within the past 3 months</option>
                        <option value="I am planning to end my life">I am planning to end my life</option>
                    </select>
                </div>
            </div>
            <div class="form-group row mx-auto mt-3">
                <div class="col-md">
                    <label class="form-label" for="msg"><b>Please describe the problems you want help with.</b> (For example, are you struggling with anxiety, low mood, negative or critical thoughts, intrusive thoughts, anger, trauma, relationship problems, sleep problems?)</label><br>
                    <textarea class="form-control" name="msg" id="msg"></textarea>
                </div>
            </div>
            <hr class="mt-5 mb-1 w-100">

            <div class="mb-3">
                Please note that for us to be able to process your request, you will have to make payment first before booking. Thank you.
            </div>
            <div class="payment-booking">
                <div class="form-group mb-3 payment">

                    <button type="button" class="btn btn-secondary"><a href="find_therapist.php" style="color: white; text-decoration: none">Back</a></button>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php print $therapist['therapists_id']; ?>"><b>Pay</b></button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop<?php echo $therapist['therapists_id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel"><b>Payment Form</b></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="paymentForm" action="process/process_payment.php" method="post">
                                        <div class="form-group my-3">
                                            <label for="first-name" class="form-label"><b>My Choice Therapist</b></label>
                                            <input type="text" class="form-control" id="therapist" name="therapist" value="<?php print $therapist['therapists_fname'] . " " . $therapist['therapists_lname']; ?>" disabled/>
                                        </div>
                                        <div class="form-group my-3">
                                            <label for="email" class="form-label"><b>My Email Address</b></label>
                                            <input type="email" class="form-control" id="email-address" name="patients_email" value="<?php print $data['patients_email']; ?>" disabled />
                                        </div>
                                        <div class="form-group my-3">
                                            <label for="charge" class="form-label"><b>Charge</b></label>
                                            <input type="text" class="form-control" id="charge" name="charge" value="<?php print $therapist['therapists_amtperhour']; ?>" disabled/>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                                    <button type="button" class="btn btn-danger" id="btnpay" name="btnpay" onclick="payWithPaystack(<?php print $therapist['therapists_amtperhour']; ?>)">Make Payment</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3 booking">

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Book Session</button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Booking</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="my-2">
                                        In order for us to be able to process your request, you need to <span style="color:red"><b>make payment.</b></span> <b>Click <a href='book_session.php' style="color:red">here</a> if you haven't made payment.</b>
                                    </div>
                                    <hr class="my-4 w-100">
                                    <div class="my-2">
                                        You're about to begin your journey to wellness. Are you sure you want to book a therapy session with <b><?php print $therapist['therapists_fname'] . ' ' . $therapist['therapists_lname']; ?></b>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                                    <button type="submit" class="btn btn-primary" id="btnsubmit" name="btnsubmit">Book Session Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

        <!-- Footer begins here -->
        <?php

            require_once("partials/footer.php");

        ?>
    <script src="https://js.paystack.co/v1/inline.js"></script> 
    <script src="script/payment.js"></script>
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