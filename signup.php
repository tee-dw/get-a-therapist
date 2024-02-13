<?php

    error_reporting(E_ALL);
    session_start();
    require_once('classes/Patient.php');
    require_once('classes/Therapist.php');
    $allstates = $patient->get_state(); //display this in a select  

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
                <div class="signup-form-div col-md-7"> 
                    <form class="row g-3 mx-auto p-5 signup-form" action="process/process_patient_signup.php" method="post">
                        <div class="col-12 mx-auto my-2 signup-form-header">
                            <h5><b><span style="color:#EC993D">First, </span>let's know what you want us to help you with by signing up!</b></h5>
                        </div>   
                        <?php

                            if(isset($_SESSION['error_message'])){
                            print "<div class='alert alert-danger'>" . $_SESSION['error_message'] . "</div>";
                            unset($_SESSION['error_message']);
                            }

                        ?>
                        <hr class="my-2 w-100" style="color: #14467c;">
                        <div class="col-md-6">
                            <label for="patient_fname" class="form-label"><b>First Name</b></label>
                            <input type="text" name="patient_fname" class="form-control" id="patient_fname" placeholder="Enter your First Name">
                        </div>
                        <div class="col-md-6">
                            <label for="patient_lname" class="form-label"><b>Last Name</b></label>
                            <input type="text" name="patient_lname" class="form-control" id="patient_lname" placeholder="Enter your Last Name">
                        </div>
                        <div class="col-md-6">
                            <label for="patient_email" class="form-label"><b>Email Address</b></label>
                            <input type="email" name="patient_email" class="form-control" id="patient_email" placeholder="****@gmail.com">
                        </div>
                        <div class="col-md-6">
                            <label for="patient_phone" class="form-label"><b>Phone Number</b></label>
                            <input type="text" name="patient_phone" class="form-control" id="patient_phone">
                        </div>
                        <div class="col-md-3">
                            <label for="patient_gender" class="form-label"><b>Gender</b></label>
                            <select id="patient_gender" name="patient_gender" class="form-select">
                                <option selected>Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="patient_state" class="form-label"><b>State</b></label>
                            <select id="patient_state" name="state" class="form-select">
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
                            <label for="patient_lga" class="form-label"><b>Local Government</b></label>
                            <p id="lga"><input class="form-control" id="patient_lga" name="lga"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="patient_pwd" class="form-label"><b>Password</b></label>
                            <input type="password" name="patient_pwd" class="form-control" id="patient_pwd">
                            <p class="password-instruction mt-1" style="color:red"></p>
                        </div>
                        <div class="col-md-6">
                            <label for="patient_confpwd" class="form-label"><b>Confirm Password</b></label>
                            <input type="password" name="patient_confpwd" class="form-control" id="patient_confpwd">
                            <p class="password-instruction1 mt-1" style="color:red"></p>
                        </div>
                        <hr class="my-3 w-100" style="color: #14467c;">
                        <div class="col-12 my-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="patient-signup">
                                <i><label class="form-check-label signup-form-patient-check" for="patient-signup">
                                    I confirm that I am either a mental health patient or a relative to a mental health patient and agree to the terms and conditions upon signing up.
                                </label></i>
                            </div>
                        </div>
                        <hr class="my-3 w-100" style="color: #14467c;">
                        <div class="col my-3">
                            <button type="submit" name="patient-signup-btn" class="btn signup-form-patient-btn my-1" id="patient-signup-btn" value="submit-form"><b>Sign Up</b></button>
                            <p>Already have an account, <a href="login.php">login here</a></p>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 signup-form-therapist mx-auto">
                    <div class="signup-form-therapist-innerdiv col-md-10 mx-auto">
                        <p class="signup-form-therapist-text">I am a <br> <span style="color:#EC993D">Therapist...</span></p>
                        <hr class="my-4 w-100" style="color:#E8EEF6">
                        <p class="signup-form-therapist-text2">I want to join the vast network of <b><span style="color:#EC993D">Certified Mental Health Therapists</span></b> to help patients with mental health issues get on their wellness journey and eventually attain wholeness.</p>
                        <hr class="my-4 w-100" style="color:#E8EEF6">
                        <div class="col my-3">
                            <a href="therapist_signup.php" type="button" class="btn signup-form-therapist-btn my-1" id="sign-me-up"><b>Sign me up</b></a>
                            <p id="already-have-acct">Already have an account, <a href="login.php">login here</a></p>
                        </div>
                    </div>
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

            $("#patient_state").change(function(){

                var data = "stateid=" + $(this).val();
                $("#lga").load("process/process_lga.php",data);

            })


            $('#patient-signup-btn').prop('disabled', true);

            $("#patient-signup").change(function(){

                $('#patient-signup-btn').prop('disabled', !$(this).is(':checked'));

            })

            $("#patient_pwd").change(function(){
                var pwd = document.getElementById('patient_pwd').value;
                if(pwd.length < 8){
                    $(".password-instruction").text("Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.");
                } else {
                    $(".password-instruction").text("");
                }
            });


            $("#patient_confpwd").change(function(){
                var confpwd = document.getElementById('patient_confpwd').value;
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