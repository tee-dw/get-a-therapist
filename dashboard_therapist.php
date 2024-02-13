<?php

error_reporting(E_ALL);
session_start();
require_once("classes/Therapist.php");
require_once("classes/Patient.php");
require_once("partials/specialization.php");
require_once('user_guard_therapist.php');

$data = $therapist->get_therapistbyid($_SESSION['therapist_online']);

// $sessionid = $_SESSION['therapist_online'];
$session = $therapist->get_booking_sessions();

// print "<pre>";
// print_r($session);
// print "</pre>";
// exit();

$therapist_id = $_SESSION['therapist_online'];
$sessions = $therapist->get_sessions_by_therapistid($therapist_id);

$therapistImage = $therapist->fetch_dp_by_id($_SESSION['therapist_online']);

$tableData = $therapist->get_table_details();

// print "<pre>";
// print_r($tableData);
// print "</pre>";
// exit();

// $therapistId = 1; // Replace with the actual therapist ID
// $patientsWithSessions = $therapist->get_patients_with_sessions($therapistId);

// print_r($patientsWithSessions);


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
                                <!-- <a href="login.php" class="btn login-button d-none" type="submit" id="login-btn">Login</a>
                                <a href="signup.php" class="btn signup-button mx-2 d-none" type="submit" id="signup-btn">Get Started</a> -->
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
                    <p class="my-2">Welcome hero! Continue on your journey to save lives...</p>
                </div>
            </div>
        </div>
        <!-- hero ends here -->
        <!-- Sub-header starts here -->
        <header class="p-3 border-bottom dashboard-header container-fluid">
            <div class="container-fluid">
              <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
               
                <ul class="member nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-start mb-md-0">
                    <li><a href="#my-profile" class="nav-link px-2 " style="color:#EC993D"><b>My Profile</b><span class="divider">|</span></a></li>
                    <li><a href="#all-bookings" class="nav-link px-2 link-dark">All Bookings<span class="divider">|</span></a></li>
                    <li><a href="#all-sessions" class="nav-link px-2 link-dark">All Sessions<span class="divider">|</span></a></li>
                    <li><a href="blog.php" class="nav-link px-2 link-dark">My Blog</a></li>
                </ul>
        
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="uploads/<?php print $therapistImage; ?>" width="32" height="35" style="border-radius:50%">
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
        <!-- Dashboard begins here -->
        <!-- <div class="container"> -->
        <div class="row" id="my-profile">
          <div class="content col-md">
            <div class="mt-3 therapist_feedback">

                    <?php

                      if(isset($_SESSION['therapist_feedback'])){

                          print "<div class='alert alert-success'>" . $_SESSION['therapist_feedback'] . "</div>";
                          unset($_SESSION['therapist_feedback']);

                      }

                    ?>

            </div>
              <h3 class="">Welcome! <?php print ($data['therapists_fname'] . ','); ?></h3>
              <p>This is your dashboard, you can view your therapy bookings, sessions and therapy session history with your patients.</p>
          </div>
        </div>
        <div class="row therapist-profile-section">
          <div class="col-md therapist-profile-div">
              <table class="table dashboard-table">
                <div class="dashboard-heading-div d-flex">
                  <h4 class="dashboard-heading">My Profile</h4>
                  <a href="update_therapist_profile.php">Edit my profile</a>
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
                    <td><?php print ($data['therapists_fname'] . " " . $data['therapists_lname']); ?></td>
                  </tr>
                  <tr>
                    <th>Email Adress</th>
                    <td><?php print $data['therapists_email']?></td>
                  </tr>
                  <tr>
                    <th>Phone Number</th>
                    <td><?php print $data['therapists_phone']?></td>
                  </tr>
                  <tr>
                    <th>Gender</th>
                    <td><?php print $data['therapists_gender']?></td>
                  </tr>
                  <tr>
                    <th>Title</th>
                    <td><?php print $data['therapists_professional_title']?></td>
                  </tr>
                  <tr>
                    <th>Specialization</th>
                    <td><?php print $data['therapistspecialization_name']?></td>
                  </tr>
                  <tr>
                    <th>Professional Certifcation</th>
                    <td><?php print $data['therapists_prof_cert']?></td>
                  </tr>
                  <tr>
                    <th>State</th>
                    <td><?php print ($therapist->gettherapist_state($data['therapists_state']))?></td>
                  </tr>
                  <tr>
                    <th>Local Governement</th>
                    <td><?php print ($therapist->gettherapistlga_bystate($data['therapists_lg']))?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="row" id="all-bookings">
            <div class="content col-md">
              <h3 class="">Your Bookings</h3>
              <p>Your Therapy Bookings comprise of the scheduling and time slot appointment requests from patients for therapeutic sessions. With the details provided by your potential client, you may approve, pend or eventually decline their requests. </p>
            </div>
          </div>
        </div>
        <div class="row therapist-profile-section">
                        <div class="col-md therapist-profile-div">
                        <table class="table table-striped dashboard-table">
                        <h4 class="dashboard-heading">All Bookings</h4>
                        <hr class="my-3 w-100">
                          <?php

                              if($sessions){

                          ?>
                                <thead>
                                  <tr>
                                    
                                    <th scope="col">Date</th>
                                    <th scope="col">Patient's Name</th>
                                    <th scope="col">Patient's Email</th>
                                    <th scope="col">Patient's Message</th>
                                    <th scope="col">Booking Status</th>
                                    <th scope="col">Details</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    
                          <?php
                          
                                foreach ($sessions as $therapy_session) {
                                  $therapist = $_SESSION['therapist_online'] ?? null;
                          ?>

                                <tr>
                                  <td><?php print $therapy_session['therapy_sessiondate']; ?></td>
                                  <td><?php print $therapy_session['patients_fname'] . ' ' . $therapy_session['patients_lname']; ?></td>
                                  <td><?php print $therapy_session['patients_email']; ?></td>
                                  <td><?php print $therapy_session['therapy_sessionpatientmsg']?></td>
                                  <td>
                                      <?php

                                        $bookingsession = $therapy_session['therapy_bookingstatus'];
                                            if($bookingsession != "Approved"){
                                              print '<button type="button" class="btn btn-sm btn-warning" id="table-action">' . $bookingsession . '</button>';
                                        }else{
                                              print '<button type="button" class="btn btn-sm btn-success" id="table-action">' . $bookingsession . '</button>';
                                        }

                                      ?>
                                  </td>
                                  <td><a href="update_patient_booking.php?therapist_id=<?php print $therapist; ?>&patient_id=<?php print $therapy_session['patients_id']; ?>">view more details</a></td>
                                </tr>
                          <?php
                                }

                              } else {
                                print "<p><h5 class='mt-5'><center>You do not have any therapy bookings yet</center></h5></p>";
                              }

                              

                          ?>
                                    
                                </tbody>
                              </table>
                              <div class="col therapist-view-more-btn">
                                  <a href="#" class="btn therapist-view-more-button" type="button">View More</a>
                              </div>
                          
                </div>
                <div class="row" id="all-sessions">
                  <div class="content col-md">
                    <h3 class="">Your Sessions</h3>
                    <p>Your Therapy Bookings comprise of the scheduling and time slot appointment requests from patients for therapeutic sessions. With the details provided by your potential client, you may approve, pend or eventually decline their requests. </p>
                  </div>
                </div>
            </div>
            <div class="row therapist-profile-section">
                        <div class="col-md therapist-profile-div mb-5">
                        <table class="table table-striped dashboard-table">
                              <h4 class="dashboard-heading">All Sessions</h4>
                              <hr class="my-3 w-100">
                        <?php
                            if ($sessions) {
                              
                              
                        ?>
                                <thead>
                                  <tr>
                                    
                                    <th scope="col">Duration</th>
                                    <th scope="col">Patient's Name</th>
                                    <th scope="col">Therapy Administered</th>
                                    <th scope="col">Completion Date</th>
                                    <th scope="col">Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                    
                                      foreach ($sessions as $session) {
                                ?>
                                  <tr>

                                        
                                        <td><?php print $session['therapy_sessionduration']; ?></td>
                                        <td><?php print $session['patients_fname'] . ' ' . $therapy_session['patients_lname']; ?></td>
                                        <td><?php print $session['therapistspecialization_name'];?></td>
                                        <td><?php print $therapy_session['therapy_end_date']; ?></td>
                                        <td>
                                            <?php

                                                $sessionstatus = $session['therapy_sessionstatus'];
                                                    if($sessionstatus != "Completed"){
                                                      print '<button type="button" class="btn btn-sm btn-info" id="table-action">' . $sessionstatus . '</button>';
                                                }else{
                                                      print '<button type="button" class="btn btn-sm btn-success" id="table-action">' . $sessionstatus . '</button>';
                                                }

                                            ?>
                                        </td>

                                  </tr>

                                  <?php
                                            
                                          }
  
                                      } else {
                                          print "<p><h5 class='mt-5'><center>You do not have an an ongoing Therapy Session yet. As soon as a booking is approved, you will see your patient here.</center></h5></p>";
                                      }
  
                                  ?>
                                </tbody>
                              </table>
                              <div class="col therapist-view-more-btn">
                                  <a href="#" class="btn therapist-view-more-button" type="button">View More</a>
                              </div> 
                            </div>

    <!-- </div> -->
        <!-- Dashboard ends here -->
        <!-- Footer begins here -->
<?php

require_once("partials/footer.php");

?>
    <script>

        $(document).ready(function(){

          $(".no-data").click(function(){
            $(this).addClass("animate__shakeX");
          })

          $(document).ready(function(){

      $("#logout").click(function(event) {
          
          if (!confirm("Are you sure you want to log out?")) {
              event.preventDefault();
              alert("Logout canceled.");
          } else{

          }
      });





})

        })
      
    </script>
</body>
</html>