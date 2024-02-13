<?php

error_reporting(E_ALL);
session_start();
require_once("classes/Patient.php");
require_once("classes/Therapist.php");
require_once('user_guard_patient.php');



$patient_id = $_SESSION['patient_online'];
// print_r($patient_id);

$sessions = $patient->get_sessions_by_patientid($patient_id);
// print "<pre>";
// print_r($sessions);
// print "</pre>";
// die();

$data = $patient->get_patientbyid($_SESSION['patient_online']);

$session = $therapist->get_booking_sessions();
// print "<pre>";
// print_r($session);
// print "</pre>";
// die();


// $therapistdata = $therapist->get_therapistbyid($_SESSION['therapist_online']);
// print "<pre>";
// print_r($therapistdata);
// print "</pre>";

// $patientId = $_SESSION['therapist_online'];
// $therapistInfo = $patient->get_patient_with_therapist($patientId);

// print "<pre>";
// print_r($therapistInfo);
// print "</pre>";
// die();

$patientImage = $patient->fetch_dp_by_id($_SESSION['patient_online']);

$blogs = $therapist->get_blogs();

$reviews = $patient->get_all_reviews();


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
    <title>Get A Therapist | Dashboard</title>
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
                                <a href="login.php" class="btn login-button d-none" type="submit" id="login-btn">Login</a>
                                <a href="signup.php" class="btn signup-button mx-2 d-none" type="submit" id="signup-btn">Get Started</a>
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
                    <h1 class="display-5"><strong>My Dashboard</strong></h1>
                    <div>
                        <hr style="margin-left: 0;">
                    </div>
                    <p class="my-2">Welcome back! Continue on your wellness journey...</p>
                </div>
            </div>
        </div>
        <!-- hero ends here -->
        <!-- Sub-header starts here -->
        <!-- Sub-header starts here -->
        <header class="p-3 border-bottom dashboard-header container-fluid">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
               
                    <ul class="member nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-start mb-md-0">
                        <li><a href="#my-profile" class="nav-link px-2" style="color:#EC993D;"><b>My Profile</b><span class="divider">|</span></a></li>
                        <li><a href="#my-active-session" class="nav-link px-2 link-dark">My Active Session<span class="divider">|</span></a></li>
                        <li><a href="#my-session-history" class="nav-link px-2 link-dark">My Session History<span class="divider">|</span></a></li>
                        <li><a href="#resources" class="nav-link px-2 link-dark">Helpful Mental Health Resources<span class="divider">|</span></a></li>
                        <li><a href="all_therapy.php" class="nav-link px-2 link-dark"><b>Find Therapist</b></a></li>
                    </ul>
        
                    <div class="dropdown text-end">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="uploads/<?php print $patientImage; ?>" width="32" height="35" style="border-radius:50%">
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
        <!-- Sub-header ends here -->
        <!-- Dashboard begins here -->

            <div class="row" id="my-profile">
              <div class="content col-md">
                <div class="mt-3 therapist_feedback">

                    <?php

                      if(isset($_SESSION['patient_feedback'])){

                          print "<div class='alert alert-success'>" . $_SESSION['patient_feedback'] . "</div>";
                          unset($_SESSION['patient_feedback']);

                      }

                    ?>

                </div>
                <h3 class="">Welcome! <?php print $data['patients_fname'] . ','; ?></h3>
                <p>This is your dashboard. Here you can update your profile, see catalogs of Therapists, book your therapy session with anyone of your choice and then view your progress.</p>
              </div>
            </div>
            <div class="col-md patient-profile-section">
              
                <div class="patient-profile-div">
                            <table class="table dashboard-table">
                              <div class="dashboard-heading-div d-flex">
                                <h4 class="dashboard-heading">My Profile</h4>
                                <a href="update_patient_profile.php">Edit my profile</a>
                              </div>
                                <thead>
                                  <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                  </tr>
                                </thead>
                                <tbody class="table-group-divider">

                                  <tr>
                                    <th>Fullname</th>
                                    <td><?php print ($data['patients_fname'] . " " . $data['patients_lname']); ?></td>
                                  </tr>
                                  <tr>
                                    <th>Email Adress</th>
                                    <td><?php print ($data['patients_email']); ?></td>
                                  </tr>
                                  <tr>
                                    <th>Phone Number</th>
                                    <td><?php print ($data['patients_phone']); ?></td>
                                  </tr>
                                  <tr>
                                    <th>Gender</th>
                                    <td><?php print ($data['patients_gender']); ?></td>
                                  </tr>
                                  <tr>
                                    <th>State</th>
                                    <td><?php print ($patient->getpatient_state($data['patients_stateid']))?></td>
                                  </tr>
                                  <tr>
                                    <th>Local Governement</th>
                                    <td><?php print ($patient->getpatientlga_bystate($data['patients_lgaid'])); ?></td>
                                  </tr>
                                </tbody>
                              </table>
    
                </div>
            
                <div class="row" id="my-active-session">                 
                    <div class="content col-md">
                      <h3 class="">My Active Session</h3>
                      <p>Your Active Session is where you get to see the current session you booked with a Therapist. </p>
                    </div>
                </div>
            </div>
            <div class="col-md patient-profile-section">    
                <div class="therapist-profile-div">
                    <table class="table table-striped dashboard-table">
                        <h4 class="dashboard-heading">My Session</h4>
                        <hr class="my-3 w-100">
                        <?php 
                        
                            if ($sessions) {

                        ?>
                                    <thead>
                                        <tr>
                                            <th scope="col">Therapist</th>
                                            <th scope="col">Therapy Specialization</th>
                                            <th scope="col">Duration</th>
                                            <th scope="col">Start Date</th>
                                            <th scope="col">End Date</th>
                                            <th scope="col">Mode</th>
                                            <th scope="col">Feedback</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        <?php
                                
                                    foreach ($sessions as $session) {
                                        $patient = $_SESSION['patient_online'] ?? null;

                        ?>
                                        <tr>
                                            <td><?php print $session['therapists_fname'] . ' ' . $session['therapists_lname'];?></td>
                                            <td><?php print $session['therapistspecialization_name'];?></td>
                                            <td><?php print $session['therapy_sessionduration'];?></td>
                                            <td><?php print $session['therapy_sessiondate'];?></td>
                                            <td><?php print $session['therapy_end_date'];?></td>
                                            <td><?php print $session['therapy_sessionmode'];?></td>
                                            <td><?php print $session['therapy_sessiontherapymsg'] ?></td>
                                            <td><a href="#"><button class="btn btn-primary" type="button">Send message</button></a></td>
                                        </tr>
                        <?php
                                    
                                }

                            } else {
                                print "<p><h5 class='mt-5'><center>You do not have any available Therapy Session yet. Book a Session by clicking <a href='all_therapy.php'><i>here</i></a></center></h5></p>";
                            }

                        ?>

                        </tbody>
                    </table>
                </div>
                <div class="row" id="my-session-history">
                    
                    <div class="content col-md">
                        <h3 class="">My Session History</h3>
                        <p>Whether you booked an online or an offline session, your Therapy session history is where you get to see your appointments with your Therapist. </p>
                    </div>
                </div>
            </div>
        <div class="col-md patient-profile-section d-flex">                    
                        <div class="therapist-profile-div">
                            <table class="table table-striped dashboard-table">
                              <h4 class="dashboard-heading">Session History</h4>
                              <hr class="my-3 w-100">
                            <?php 
                                
                                    if ($sessions) {

                            ?>
                                    <thead>
                                    <tr>
                                        
                                        <th scope="col">Date</th>
                                        <th scope="col">Therapy Administered</th>    
                                        <th scope="col">Session Status</th>                                 
                                        <th scope="col">Review</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                            <?php
                                        foreach ($sessions as $session) {
                            ?>
                                    <tr>
                                       
                                        <td><?php print $session['therapy_sessiondate'];?></td>
                                        <td><?php print $session['therapistspecialization_name'] ?></td>
                                        <td><?php print $session['therapy_sessionstatus'] ?></td>
                                        <td><a href="#"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Send Review</button></a></td>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel"><strng>Rating and Review</strong></h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="process/process_review.php" method="post">
                                                            <input type="hidden" name="session_id" value="<?php print $session['therapy_sessionid']; ?>">
                                                            <p>You are about to rate <b><?php print $session['therapists_fname'] . ' ' . $session['therapists_lname'];?></b> based on your just-concluded therapy session. Please note that all users on this platform will see your ratings and reviews.</p>
                                                            <hr class="my-4 w-100">
                                                            <div class="my-3">
                                                                <label class="form-label" for="relationship"><b>Relationship - </b>I felt heard, understood and respected.</label>
                                                                <select class="form-select" name="relationship" id="relationship">
                                                                    <option value="Yes!">Yes!</option>
                                                                    <option value="Somewhat Yes">Somewhat Yes</option>
                                                                    <option value="Fair enough">Fair enough</option>
                                                                    <option value="Somewhat No">Somewhat No</option>
                                                                    <option value="No!">No!</option>
                                                                </select>
                                                            </div>
                                                            <div  class="my-3">
                                                                <label class="form-label" for="goals"><b>Goals and Topics - </b>We worked on and talked about what I wanted to work on and talk about.</label>
                                                                <select class="form-select" name="goals" id="goals">
                                                                    <option value="Yes!">Yes!</option>
                                                                    <option value="Somewhat Yes">Somewhat Yes</option>
                                                                    <option value="Fair enough">Fair enough</option>
                                                                    <option value="Somewhat No">Somewhat No</option>
                                                                    <option value="No!">No!</option>
                                                                </select>
                                                            </div>
                                                            <div class="my-3">
                                                                <label class="form-label" for="approach"><b>Approach or Method - </b>The therapist approach is a good fit for me.</label>
                                                                <select class="form-select" name="approach" id="approach">
                                                                    <option value="Yes!">Yes!</option>
                                                                    <option value="Somewhat Yes">Somewhat Yes</option>
                                                                    <option value="Fair enough">Fair enough</option>
                                                                    <option value="Somewhat No">Somewhat No</option>
                                                                    <option value="No!">No!</option>
                                                                </select>
                                                            </div>
                                                            <hr class="my-4 w-100">
                                                            <div class="mt-2 mb-4">
                                                                <label class="form-label" for=""><b>Review</b></label>
                                                                <textarea name="review" id="review" cols="30" rows="5" class="form-control" placeholder="Write your short overall review here..."></textarea>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                                                                <button type="submit" class="btn btn-primary" id="btnreview" name="btnreview">Send Review</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                            <?php
                                            
                                        }

                                    } else {

                                        print "<p><h5 class='mt-5'><center>You do not have any recorded Therapy Session History yet. Book a Session by clicking <a href='all_therapy.php'><i>here</i></a></center></h5></p>";
                                    }

                            ?>
                                </tbody>
                              </table>
                              <div class="col therapist-view-more-btn my-5">
                                  <a href="#" class="btn therapist-view-more-button" type="button">View More</a>
                              </div>
            </div>
        </div>
        <!-- Login form ends here -->
        <!-- Resources begins here -->
        <div class="row resources-section" id="resources">
            <h3 class="resources-section-heading">Helpful Resources</h3>
            <hr class="my-2 mx-auto w-100">
            
            <?php

                if ($blogs)
                foreach ($blogs as $blog){
                    $divStyle = ($blog['blog_status'] != "Active") ? 'style="display: none;"' : '';

            ?>

            <div class="row resources-section" id="resources">
                <div class="col-md d-flex p-5">
                    <div class="col-md-6 resources-img-div">
                        <img src="upload/<?php print $blog['blog_img']; ?>" width="70%" alt="">  
                    </div>
                    <div class="col-md-6 resources-caption-div">
                        <div class="resources-caption-heading">
                            <h4><b><?php print $blog['blog_title'] ?></b></h4>
                        </div>
                        <div class="resources-caption-content">
                            <p><?php print $blog['blog_caption'] ?></p>
                            <small>-<?php print $blog['therapists_fname'] . ' ' . $blog['therapists_lname'] ?>, <span><?php print $blog['therapists_professional_title'] . ', ' . $blog['therapistsqualification_name'] ?>.</span></small>
                        </div>
                    </div>
                </div>
            </div>

            <?php

                }

            ?>


        </div>
        <!-- Resources ends here -->
        <!-- Review begins here -->
        <div class="row" id="reviews">
            <div class="col reviews mb-5">
                <div id="reviews" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                    <?php

                        if ($reviews)
                            foreach($reviews as $review){

                    ?>
                        <div class="carousel-item active patient-review">
                            <div class="col-md-6 m-auto">
                                <div class="col-md-4 patient-profile-img">
                                    <img src="uploads/<?php print $review['patients_profile_img']; ?>" alt="" width="100%" height="100%" style="border-radius:50%">
                                </div>
                            </div>
                            <hr class="my-3" style="width:200px;"/>
                            <div class="col-md-6 m-auto review-text">
                                <h6><b><?php print $review['patients_fname'] . ' ' . $review['patients_lname']; ?></b></h6>
                                <p><?php print $review['review_comment']; ?></p>
                                <small><?php print $review['review_date']; ?></small>
                            </div>
                        </div>
                    <?php
                                
                        }

                    ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <!-- Review ends here -->
        <!-- Footer begins here -->
        <?php

            require_once("partials/footer.php");

        ?>
    <script src="js/payment.js"></script>
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