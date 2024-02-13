<?php

error_reporting(E_ALL);
session_start();
require_once("classes/Therapist.php");

$data = $therapist->get_therapistbyid($_SESSION['therapist_online']);

// print_r($data);
// die();

$therapistImage = $therapist->fetch_dp_by_id($_SESSION['therapist_online']);

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
    <title>Get A Therapist | Update Profile</title>
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
                            <!-- <form class="d-flex nav-form">
                                <a href="login.php" class="btn login-button d-none" type="submit" id="login-btn">Login</a>
                                <a href="signup.php" class="btn signup-button mx-2 d-none" type="submit" id="signup-btn">Get Started</a>
                            </form> -->
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
    <div class="container">
        <form class="update-profile-form p-5 m-5" style="background-color:#E8EEF6; color:#14467C" action="process/process_update_therapist_profile.php" method="post" enctype="multipart/form-data" id="therapist_form">
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
        <h3 class="my-4"><b>Edit Your Profile</b></h3>
        <hr class="mt-2 mb-5 w-100">
            <div class="row">
                <div class="form-group col-md-6 mx-auto">
                    <div class="upload-div col-md mb-3">
                        
                            <div class="mb-1 mx-auto" id="img-feedback"></div>
                            <div>
                                <center class="p-5 mx-auto" id="feedback"><img src="uploads/<?php print $therapistImage; ?>" width="100%" style="border-radius:30px"></center>
                            </div>
                        
                    </div>
                </div>
                <div class="form-group col-md-6 mx-auto">
                    <div class="upload">
                        <div class="col-12">
                            <label class="form-label" for="upload">Upload Profile Picture</label>
                            <input type="file" class="form-control" id="upload" name="upload-dp">
                        </div>
                    </div>
                    <div class="form-group row mx-auto my-3">
                            <label class="form-label" for="therapists_bio"><b>Your Bio</b></label><br>
                            <textarea class="form-control" name="therapists_bio" id="bio"><?php print $data['therapists_bio'] ?></textarea>
                    </div>
                    <div class="col-md my-3">
                        <label class="form-label" for="fname"><b>FirstName</b></label>
                        <input class="form-control" id="fname" name="fname" required type="text" value="<?php print ($data['therapists_fname']); ?>" >
                    </div>
                    <div class="col-md mb-3">
                        <label class="form-label" for="lname"><b>LastName</b></label>
                        <input class="form-control" id="lname" name="lname" required type="text" value="<?php print ($data['therapists_lname']); ?>" >
                    </div>
                    <div class="col-md mb-3">
                        <label class="form-label" for="phone"><b>Phone</b></label>
                        <input class="form-control" id="phone" name="phone" required type="text" value="<?php print ($data['therapists_phone']); ?>" >
                    </div>
                    <div class="col-md mb-3">
                        <label class="form-label" for="dob"><b>Year of Birth</b></label>
                        <input class="form-control" id="yob" name="yob" required type="year" value="<?php print ($data['therapists_yob']); ?>" >
                    </div>
                    <div class="col-md">
                        <label for="prof-cert" class="form-label"><b>Professional Certifcation(s)</b></label>
                        <input type="text" name="prof-cert" class="form-control" id="prof-cert" placeholder="e.g., CBHC-BS, CCMA, CBHT..." value="<?php print $data['therapists_prof_cert'] ?>">
                    </div>
                </div>
                <hr class="my-4">
                <div class="form-group mb-3"> 
                    <button class="btn btn-primary" id="btnsubmit" name="btnsubmit_therapist" type="submit">Update Profile</button>
                </div>
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
                alert("Logout canceled.");
            } else{

            }
        });

    })
        
    </script>
</body>
</html>