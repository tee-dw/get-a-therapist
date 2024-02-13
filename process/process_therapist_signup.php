<?php

    error_reporting(E_ALL);
    session_start();
    require_once('../classes/utilities.php');
    require_once('../classes/Therapist.php');

    #we want to disallow direct visit to this file.

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        if($_POST && isset($_POST['therapist-btn-submit'])){
            
            #we want to retrieve the form data

            $therapist_fname = sanitizer($_POST['therapist_fname']);
            $therapist_lname = sanitizer($_POST['therapist_lname']);
            $therapist_email = sanitizer($_POST['therapist_email']);
            $therapist_phone = sanitizer($_POST['therapist_phone']);
            $therapist_gender = $_POST['therapist_gender'];
            $therapist_state = $_POST['state'];
            $therapist_lg = $_POST['lga'];
            $therapist_qualification = $_POST["qualification"];
            $therapist_professional_title = $_POST["title"];
            $therapist_year_started = $_POST["therapist_year_started"];
            $therapist_spec = $_POST['therapist_spec'];
            $therapist_charge = $_POST['therapy_charge'];
            $prof_cert = sanitizer($_POST["prof-cert"]);
            $therapist_pwd = $_POST['therapist_pwd'];
            $therapist_confpwd = $_POST['therapist_confpwd'];
        
            if($therapist_fname == '' || $therapist_lname == '' || $therapist_email == '' || $therapist_phone == '' || $therapist_gender == '' || $prof_cert == '' || $therapist_pwd == '' || $therapist_confpwd == ''){
                $_SESSION['error_message'] = "Fields cannot be empty!";
                header("location:../therapist_signup.php");
                exit();
            }

            $rsp = $therapist->sign_up($therapist_fname, $therapist_lname, $therapist_email, $therapist_phone, $therapist_gender, $therapist_year_started, $prof_cert, $therapist_professional_title, $therapist_charge, $therapist_state, $therapist_lg, $therapist_pwd, $therapist_confpwd, $therapist_spec, $therapist_qualification);

            // print $rsp;
            // exit();

            if($rsp){
                $_SESSION['therapist_online'] = $rsp;
                header("location:../dashboard_therapist.php");
            }else{
                header("location:../therapist_signup.php");
            }


        }else{
            
            #we want to send them back to the form
            $_SESSION['error_message'] = "Please complete the form";
            header('location:../therapist_signup.php');

        }

    }

?>