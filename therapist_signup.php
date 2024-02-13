<?php

    error_reporting(E_ALL);
    session_start();
    require_once('classes/Therapist.php');
    require_once("partials/specialization.php");
    require_once("partials/year_started.php");
    require_once("partials/professional_title.php");


    $allstates = $therapist->get_state();

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
    <title>Get A Therapist</title>
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
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="categories">
                                        Categories
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="#">Addiction Therapy</a></li>
                                        <li><a class="dropdown-item" href="#">Child Therapy</a></li>
                                        <li><a class="dropdown-item" href="#">Clinical Therapy</a></li>
                                        <li><a class="dropdown-item" href="#">Marriage and Family Counselling</a></li>
                                        <li><a class="dropdown-item" href="#">Psychodynamic Therapy</a></li>
                                        <li><a class="dropdown-item" href="#">Trauma Therapy</a></li>
                                        <li><a class="dropdown-item" href="#">Youth Therapy</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php#resources">Resources</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.php">Contact Us</a>
                                </li>
                            </ul>
                            <form class="d-flex nav-form">
              
                                <a href='login.php' class='btn login-button' type='submit' id='login-btn'>Login</a>

                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- header ends here -->
        <!-- hero starts here -->
        <div class="row sign-up">
            <div class="col-md">
                <div class="text-overlay-signup">
                    <h1 class="display-5"><strong>Sign Up</strong></h1>
                    <div>
                        <hr style="margin-left: 0;">
                    </div>
                    <p class="my-2">Let's get to know you</p>
                </div>
            </div>
        </div>
        <!-- hero ends here -->
        <!-- signup begins here -->
        <div class="container p-5">
            <div class="row signup-form-row d-flex">
                <div class="signup-form-div col"> 
                    <form class="row g-3 mx-auto p-5 signup-form" action="process/process_therapist_signup.php" method="post">
                        <div class="col-12 my-2 signup-form-header">
                            <h5 class=""><b><span style="color:#EC993D">Welcome, </span>we are excited to have you join our team in making the world a better place!</b></h5>
                            <p>Just answer a few questions and you're good to go...</p>
                        </div>   
                        <hr class="my-2 mt-5 w-100" style="color: #14467c;">
                        <div class="col-12">
                            <h2 class=""><b>Personal Information</b></h2>
                        </div> 
                        <hr class="my-3 w-100" style="color: #14467c;">
                        <?php

                                if(isset($_SESSION['error_message'])){

                                    print "<div class='alert alert-danger'>" . $_SESSION['error_message'] . "</div>";
                                    unset($_SESSION['error_message']);

                                }

                        ?>
                        <div class="col-md-6">
                            <label for="therapist_fname" class="form-label"><b>First Name</b></label>
                            <input type="text" class="form-control" name="therapist_fname" id="therapist_fname" placeholder="Enter your First Name">
                            <p class="empty1 mt-1" style="color:red"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="therapist_lname" class="form-label"><b>Last Name</b></label>
                            <input type="text" class="form-control" name="therapist_lname" id="therapist_lname" placeholder="Enter your Last Name">
                            <p class="empty2 mt-1" style="color:red"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="therapist_email" class="form-label"><b>Email Address</b></label>
                            <input type="email" class="form-control" name="therapist_email" id="therapist_email" placeholder="****@gmail.com">
                            <p class="empty3 mt-1" style="color:red"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="therapist_phone" class="form-label"><b>Phone Number</b></label>
                            <input type="text" class="form-control" name="therapist_phone" id="therapist_phone">
                            <p class="empty4 mt-1" style="color:red"></p>
                        </div>
                        <div class="col-md-3 my-3">
                            <label for="therapist_gender" class="form-label"><b>Gender</b></label>
                            <select id="therapist_gender" class="form-select" name="therapist_gender">
                                <option selected>Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="therapist_state" class="form-label"><b>State</b></label>
                            <select id="therapist_state" name="state" class="form-select">
                            <?php
                                foreach($allstates as $state){

                                    $statename = $state['state_name'];
                                    $stateid = $state['state_id'];

                            ?>
                        
                                <option value="<?php print $stateid; ?>"><?php print $statename; ?></option>

                            <?php  
                                }
                            ?>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <label for="lga" class="form-label"><b>Local Government</b></label>
                            <p id="lga"><input class="form-control" id="therapist_lga" name="lga"></p>
                        </div>
                        <hr class="my-2 mt-5 w-100" style="color: #14467c;">
                        <div class="col-md-10">
                            <h2 class=""><b>Professional Information</b></h2>
                        </div> 
                        <hr class="my-3 w-100" style="color: #14467c;">
                        <?php

                                if(isset($_SESSION['error_message'])){

                                    print "<div class='alert alert-danger'>" . $_SESSION['error_message'] . "</div>";
                                    unset($_SESSION['error_message']);

                                }

                        ?>
                        <div class="col-md-4 my-3">
                            <label for="qualification" class="form-label"><b>Select your highest qualification</b></label>
                            <select name="qualification" class="form-select" id="qualification">
                                <option value="0">Select</option>
                                <option value="1">HND</option>
                                <option value="2">BSc</option>
                                <option value="3">MSc</option>
                                <option value="4">PhD</option>
                            </select>
                        </div>
                        <div class="col-md-4 my-3">
                            <label for="title" class="form-label"><b>Select your Professional Title</b></label>
                            <select id="title" name="title" class="form-select">
                                <?php
                                    for ($title = 0; $title < $num_of_professional_title; $title = $title+1){
                                        print '<option value="' . $professional_title[$title] . '">' . $professional_title[$title] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4 my-3">
                            <label for="therapist_year_started" class="form-label"><b>You've been in this field since...</b></label>
                            <select id="therapist_year_started" name="therapist_year_started" class="form-select">
                                <?php
                                    for ($ys = 0; $ys < $num_of_year_started; $ys = $ys+1){
                                        print '<option value="' . $year_started[$ys] . '">' . $year_started[$ys] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4 my-3">
                            <label for="therapist_spec" class="form-label"><b>Select your main Therapy Specification:</b></label>
                            <select id="therapist_spec" name="therapist_spec" class="form-select">
                                <?php
                                    for ($spec = 1; $spec < $num_of_spec; $spec = $spec+1){
                                        print '<option value="' . $spec . '">' . $specialization[$spec] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="therapist_charge" class="form-label"><b>How much do you charge per session</b></label>
                            <select name="therapy_charge" class="form-select" id="therapy_charge">
                                <option value="Select">Select</option>
                                <option value="5000">₦5,000</option>
                                <option value="10000">₦10,000</option>
                                <option value="20000">₦20,000</option>
                                <option value="30000">₦30,000</option>
                                <option value="40000">₦40,000</option>
                                <option value="50000">₦50,000</option>
                                <option value="60000">₦60,000</option>
                                <option value="70000">₦70,000</option>
                                <option value="80000">₦80,000</option>
                                <option value="90000">₦90,000</option>
                                <option value="100000">₦100,000</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="prof-cert" class="form-label"><b>Professional Certifcation(s)</b></label>
                            <input type="text" name="prof-cert" class="form-control" id="prof-cert" placeholder="e.g., CBHC-BS, CCMA, CBHT...">
                        </div>
                        <div class="col-md-6">
                            <label for="therapist_pwd" class="form-label"><b>Password</b></label>
                            <input type="password" name="therapist_pwd" class="form-control" id="therapist_pwd">
                            <p class="password-instruction mt-1" style="color:red"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="therapist_confpwd" class="form-label"><b>Confirm Password</b></label>
                            <input type="password" name="therapist_confpwd" class="form-control" id="therapist_confpwd">
                            <p class="password-instruction1 mt-1" style="color:red"></p>
                        </div>
                        <hr class="my-3 w-100" style="color: #14467c;">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="therapist-signup">
                            <i><label class="form-check-label signup-form-therapist-check" for="therapist-signup">
                                I confirm that I am a Certified Mental Health Therapist and agree to the terms and conditions upon signing up.
                            </label></i>
                        </div>
                        <hr class="my-3 w-100" style="color: #14467c;">
                        <div class="col-md-2 mx-auto my-3">
                            <button type="submit" class="btn signup-form-therapist-btn my-1" name="therapist-btn-submit" id="therapist-signup-btn"><b>Sign Up</b></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Signup ends here -->
        <!-- Footer begins here -->
        <?php

            require_once("partials/footer.php");

        ?>
    <script>

        $(document).ready(function(){

            $("#therapist_state").change(function(){
                
                var data = "stateid=" + $(this).val();
                $("#lga").load("process/process_lga.php",data);

            });
            

            $('#therapist-signup-btn').prop('disabled', true);

            $("#therapist-signup").change(function(){

                $('#therapist-signup-btn').prop('disabled', !$(this).is(':checked'));

            });

            $("#therapist_pwd").change(function(){
                var pwd = document.getElementById('therapist_pwd').value;
                if(pwd.length < 8){
                    $(".password-instruction").text("Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.");
                } else {
                    $(".password-instruction").text("");
                }
            });


            $("#therapist_confpwd").change(function(){
                var confpwd = document.getElementById('therapist_confpwd').value;
                if(confpwd.length < 8){
                    $(".password-instruction1").text("Your password must be 8-20 characters long, and must be same with your password.");
                } else {
                    $(".password-instruction1").text("");
                }
            });

           

        })

    </script>
</body>
</html>