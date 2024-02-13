<?php

error_reporting(E_ALL);
session_start();
require_once("classes/Patient.php");
require_once("classes/Therapist.php");
require_once("user_guard_patient.php");



$allTherapists = $therapist->get_all_therapists();
// print "<pre>";
// print_r($allTherapists);
// print "</pre>";
// die();

// $allTherapist = $therapist->get_all_therapists();
// print "<pre>";
// print_r($allTherapist);
// print "</pre>";
// die();

$data = $patient->get_patientbyid($_SESSION['patient_online']);

$patientImage = $patient->fetch_dp_by_id($_SESSION['patient_online']);


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
    <title>Get A Therapist | Addiction Therapy</title>
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
              
                                <!-- <a href='login.php' class='btn login-button' type='submit' id='login-btn'>Login</a>
                                <a href='signup.php' class='btn signup-button mx-2' type='submit' id='signup-btn'>Get Started</a> -->

                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- header ends here -->
        <!-- hero starts here -->
        <div class="row login" id="for-sidebar">
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
        <!-- Sub-header starts here -->
        <header class="p-3 border-bottom dashboard-header container-fluid">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
               
                    <ul class="member nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-start mb-md-0">
                        <li><a href="dashboard_patient.php" class="nav-link px-2" style="color:#EC993D;"><b>My Profile</b><span class="divider">|</span></a></li>
                        <li><a href="dashboard_patient.php" class="nav-link px-2 link-dark">My Active Session<span class="divider">|</span></a></li>
                        <li><a href="dashboard_patient.php" class="nav-link px-2 link-dark">My Session History<span class="divider">|</span></a></li>
                        <li><a href="dashboard_patient.php" class="nav-link px-2 link-dark">Helpful Mental Health Resources<span class="divider">|</span></a></li>
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
        <!-- Sub-header ends here -->
        <!-- Aside begins here -->

<div class="container">
    <div class="m-5">
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne" style="background-color: #E8EEF6"><b>Addiction Therapy</b></button></h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <div class='main-content'>
                            <p><b>Addiction therapy</b> is a type of counseling or treatment aimed at helping individuals overcome addiction to substances such as alcohol, drugs, or behavioral addictions like gambling. The goal of addiction therapy is to address the physical, psychological, and social aspects of addiction to promote recovery and prevent relapse. Here are some key components and approaches commonly used in addiction therapy:</p>
                            <p>The effectiveness of addiction therapy varies among individuals, and a personalized approach is often necessary. Treatment plans are tailored to address the unique needs and circumstances of each person seeking help for addiction. </p>
                        </div>
                        <div class="main-header-therapists col-md-2">
                            <p>Available Therapists</p>
                        </div>
                        <div class="main-header-therapists-content d-flex">

                            <?php

                                if ($allTherapists)
                                    foreach($allTherapists as $therapists){

                                        $divStyle = ($therapists['therapists_status'] != "Active") ? 'style="display: none;"' : '';
                                        $div_Style = ($therapists['therapists_therapistspecializationid'] != 1) ? 'style="display: none;"' : '';

                                
                            ?>

                                <div class="available-therapists" <?php print $divStyle . $div_Style ?> >
                                    <img src="uploads/<?php print $therapists['therapists_profile_img']; ?>" width="100%" height="150" style="border-radius:10%">
                                    <div class="avt">
                                        <p><?php print ($therapists['therapists_fname'] . " " . $therapists['therapists_lname'] . ", " . $therapists['therapistsqualification_name']); ?><br><span><?php print $therapists['therapists_professional_title'] ?></span></p>
                                    </div>
                                </div>

                            <?php
                                                    
                                }

                            ?>
                        </div>
                        <div class="available-therapists">
                            <a href="find_therapist.php" class="btn see-more-therapists-btn" type="button">See More Therapists</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo"><b>Child Therapy</b></button></h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <div class='main-content'>
                            <p><b>Child therapy</b>, also known as child counseling or play therapy, is a specialized form of mental health treatment designed to address the emotional, behavioral, and psychological needs of children. Children may face various challenges, including family issues, trauma, anxiety, depression, developmental disorders, or adjustment difficulties. Child therapists use age-appropriate techniques and interventions to communicate with and support their young clients. </p>
                            <p>Child therapy is a collaborative process involving the child, therapist, and often family members. It plays a crucial role in supporting children's mental and emotional well-being, fostering healthy development, and addressing challenges early on. </p>
                        </div>
                        <div class='main-header-therapists col-md-2'>
                            <p>Available Therapists</p>
                        </div>
                        <div class="main-header-therapists-content d-flex">

                            <?php

                                if ($allTherapists )
                                    foreach($allTherapists as $therapists){
                                        $divStyle = ($therapists['therapists_status'] != "Active") ? 'style="display: none;"' : '';
                                        $div_Style = ($therapists['therapists_therapistspecializationid'] != 2) ? 'style="display: none;"' : '';

                    
                            ?>

                                <div class="available-therapists" <?php print $divStyle . $div_Style ?> >
                                    <img src="uploads/<?php print $therapists['therapists_profile_img']; ?>" width="100%" height="150" style="border-radius:10%">
                                    <div class="avt">
                                        <p><?php print ($therapists['therapists_fname'] . " " . $therapists['therapists_lname'] . ", " . $therapists['therapistsqualification_name']); ?><br><span><?php print $therapists['therapists_professional_title'] ?></span></p>
                                    </div>
                                </div>

                            <?php
                                                    
                                }

                            ?>
                        </div>
                        <div class="available-therapists">
                            <a href="find_therapist.php" class="btn see-more-therapists-btn" type="button">See More Therapists</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree" style="background-color: #E8EEF6"><b>Clinical Therapy</b></button></h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <div class="main-content">
                            <p><b>Clinical therapy</b>, often referred to as psychotherapy or counseling, is a specialized form of mental health treatment designed to help individuals address and overcome emotional, psychological, and behavioral challenges. </p>
                            <p>Clinical therapy is a collaborative journey that empowers individuals to navigate life's challenges, fostering emotional well-being and resilience. The effectiveness of therapy often depends on the commitment of both the client and the therapist to the therapeutic process.</p>
                        </div>
                        <div class="main-header-therapists col-md-2">
                            <p>Available Therapists</p>
                        </div>
                        <div class="main-header-therapists-content d-flex">

                            <?php

                                if ($allTherapists )
                                    foreach($allTherapists as $therapists){
                                        $divStyle = ($therapists['therapists_status'] != "Active") ? 'style="display: none;"' : '';
                                        $div_Style = ($therapists['therapists_therapistspecializationid'] != 3) ? 'style="display: none;"' : '';


                            ?>

                                <div class="available-therapists" <?php print $divStyle . $div_Style ?> >
                                    <img src="uploads/<?php print $therapists['therapists_profile_img']; ?>" width="100%" height="150" style="border-radius:10%">
                                    <div class="avt">
                                        <p><?php print ($therapists['therapists_fname'] . " " . $therapists['therapists_lname'] . ", " . $therapists['therapistsqualification_name']); ?><br><span><?php print $therapists['therapists_professional_title'] ?></span></p>
                                    </div>
                                </div>

                            <?php
                                                    
                                }

                            ?>
                        </div>
                        <div class="available-therapists">
                            <a href="find_therapist.php" class="btn see-more-therapists-btn" type="button">See More Therapists</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour"><b>Marriage and Relationship Counselling</b></button></h2>
                <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <div class="main-content">
                            <p><b>Marriage therapy</b>, also known as couples therapy or marriage counseling, is a specialized form of mental health treatment focused on improving the relationship dynamics and overall well-being of couples. It involves a trained therapist working with a couple to address and resolve conflicts, improve communication, and enhance the overall quality of their relationship. Here's a brief introduction to marriage therapy:</p>
                            <p>Marriage therapy recognizes that relationships require ongoing effort and attention. Whether couples are facing specific challenges or simply seeking to enhance their connection, marriage therapy provides a valuable space for growth, understanding, and positive change within the context of a committed partnership.</p>
                        </div>
                        <div class="main-header-therapists col-md-2">
                            <p>Available Therapists</p>
                        </div>
                        <div class="main-header-therapists-content d-flex">

                            <?php

                                if ($allTherapists )
                                    foreach($allTherapists as $therapists){
                                        $divStyle = ($therapists['therapists_status'] != "Active") ? 'style="display: none;"' : '';
                                        $div_Style = ($therapists['therapists_therapistspecializationid'] != 4) ? 'style="display: none;"' : '';
                    
                            ?>
                    
                                <div class="available-therapists" <?php print $divStyle . $div_Style ?> >
                                    <img src="uploads/<?php print $therapists['therapists_profile_img']; ?>" width="100%" height="150" style="border-radius:10%">
                                    <div class="avt">
                                        <p><?php print ($therapists['therapists_fname'] . " " . $therapists['therapists_lname'] . ", " . $therapists['therapistsqualification_name']); ?><br><span><?php print $therapists['therapists_professional_title'] ?></span></p>
                                    </div>
                                </div>

                            <?php
                                                    
                                }

                            ?>
                        </div>
                        <div class="available-therapists">
                            <a href="find_therapist.php" class="btn see-more-therapists-btn" type="button">See More Therapists</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive" style="background-color: #E8EEF6"><b>Psychodynamic Therapy</b></button></h2>
                <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <div class="main-content">
                            <p><b>Psychodynamic therapy</b>, often referred to as psychodynamic counseling or psychoanalytic therapy, is a therapeutic approach rooted in the principles of psychoanalysis. Developed by Sigmund Freud and expanded upon by subsequent theorists, psychodynamic therapy explores the unconscious mind, childhood experiences, and the dynamics of interpersonal relationships. Here's a brief introduction to psychodynamic therapy:</p>
                            <p>Psychodynamic therapy provides individuals with a unique opportunity for self-discovery, self-awareness, and personal transformation. By exploring the unconscious mind and early experiences, individuals can gain a deeper understanding of themselves, their relationships, and the factors influencing their psychological well-being. </p>
                        </div>
                        <div class="main-header-therapists col-md-2">
                            <p>Available Therapists</p>
                        </div>
                        <div class="main-header-therapists-content d-flex">

                            <?php

                                if ($allTherapists)
                                    foreach($allTherapists as $therapists){
                                        $divStyle = ($therapists['therapists_status'] != "Active") ? 'style="display: none;"' : '';
                                        $div_Style = ($therapists['therapists_therapistspecializationid'] != 5) ? 'style="display: none;"' : '';
                    
                            ?>
                    
                                <div class="available-therapists" <?php print $divStyle . $div_Style ?> >
                                    <img src="uploads/<?php print $therapists['therapists_profile_img']; ?>" width="100%" height="150" style="border-radius:10%">
                                    <div class="avt">
                                        <p><?php print ($therapists['therapists_fname'] . " " . $therapists['therapists_lname'] . ", " . $therapists['therapistsqualification_name']); ?><br><span><?php print $therapists['therapists_professional_title'] ?></span></p>
                                    </div>
                                </div>

                            <?php
                                                    
                                }

                            ?>
                        </div>
                        <div class="available-therapists">
                            <a href="find_therapist.php" class="btn see-more-therapists-btn" type="button">See More Therapists</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseSix"><b>Trauma Therapy</b></button></h2>
                <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <div class="main-content">
                            <p><b>Trauma therapy</b>, also known as trauma-focused therapy, is a specialized form of psychological treatment designed to help individuals who have experienced traumatic events. Trauma can result from various sources, including but not limited to, physical or sexual abuse, accidents, natural disasters, combat, or witnessing violence. Here's a brief overview of trauma therapy:</p>
                            <p>Trauma therapy is a collaborative and individualized process, and the specific approach used may vary based on the nature of the trauma and the unique needs of the person seeking treatment. It provides a supportive space for individuals to navigate the challenges associated with trauma and move towards healing and recovery. </p>
                        </div>
                        <div class="main-header-therapists col-md-2">
                            <p>Available Therapists</p>
                        </div>
                        <div class="main-header-therapists-content d-flex">

                            <?php

                                if ($allTherapists )
                                    foreach($allTherapists as $therapists){
                                        $divStyle = ($therapists['therapists_status'] != "Active") ? 'style="display: none;"' : '';
                                        $div_Style = ($therapists['therapists_therapistspecializationid'] != 6) ? 'style="display: none;"' : '';
                    
                            ?>
                    
                                <div class="available-therapists" <?php print $divStyle . $div_Style ?> >
                                    <img src="uploads/<?php print $therapists['therapists_profile_img']; ?>" width="100%" height="150" style="border-radius:10%">
                                    <div class="avt">
                                        <p><?php print ($therapists['therapists_fname'] . " " . $therapists['therapists_lname'] . ", " . $therapists['therapistsqualification_name']); ?><br><span><?php print $therapists['therapists_professional_title'] ?></span></p>
                                    </div>
                                </div>

                            <?php
                                                    
                                }

                            ?>
                        </div>
                        <div class="available-therapists">
                            <a href="find_therapist.php" class="btn see-more-therapists-btn" type="button">See More Therapists</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false" aria-controls="panelsStayOpen-collapseSeven" style="background-color: #E8EEF6"><b>Youth Therapy</b></button></h2>
                <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <div class="main-content">
                            <p><b>Youth therapy</b>, also known as adolescent or teen therapy, is a specialized form of mental health treatment tailored to the unique needs and challenges faced by young individuals during the transitional phase from childhood to adulthood. Here's a brief introduction to youth therapy:</p>
                            <p>Youth therapy recognizes that adolescence is a period of significant change and self-discovery, and it aims to provide the necessary support for young individuals to navigate this transformative journey with resilience and confidence. </p>
                        </div>
                        <div class="main-header-therapists col-md-2">
                            <p>Available Therapists</p>
                            
                        </div>
                        <div class="main-header-therapists-content d-flex">

                            <?php

                                if ($allTherapists)
                                    foreach($allTherapists as $therapists){
                                        $divStyle = ($therapists['therapists_status'] != "Active") ? 'style="display: none;"' : '';
                                        $div_Style = ($therapists['therapists_therapistspecializationid'] != 7) ? 'style="display: none;"' : '';
                    
                            ?>
                    
                                <div class="available-therapists" <?php print $divStyle . $div_Style ?> >
                                    <img src="uploads/<?php print $therapists['therapists_profile_img']; ?>" width="100%" height="150" style="border-radius:10%">
                                    <div class="avt">
                                        <p><?php print ($therapists['therapists_fname'] . " " . $therapists['therapists_lname'] . ", " . $therapists['therapistsqualification_name']); ?><br><span><?php print $therapists['therapists_professional_title'] ?></span></p>
                                    </div>
                                </div>

                            <?php
                                                    
                                }

                            ?>
                        </div>
                        <div class="available-therapists">
                            <a href="find_therapist.php" class="btn see-more-therapists-btn" type="button">See More Therapists</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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