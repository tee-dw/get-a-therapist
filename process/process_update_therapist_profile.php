<?php

    error_reporting(E_ALL);
    session_start();
    require_once "../classes/Therapist.php";
    require_once "../classes/utilities.php";

    // print "<pre>";
    // print_r($_POST);
    // print "</pre>";
    // die();

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnsubmit_therapist']) && $_FILES['upload-dp']['error']==0){

        // print "<pre>";
        // print_r($_FILES);
        // print "</pre>";
        // die();

            //collect form values and sanitize
            $therapist_fname = sanitizer($_POST['fname']);
            $therapist_lname = sanitizer($_POST['lname']);
            $therapist_phone = sanitizer($_POST['phone']);
            $therapist_yob = sanitizer($_POST['yob']);
            $therapists_profile_img = $_FILES['upload-dp'];
            $therapists_prof_cert = $_POST['prof-cert'];
            $therapists_bio = sanitizer($_POST['therapists_bio']);

            // print "<pre>";
            // print_r($therapists_profile_img);
            // print "</pre>";
            // die();

            $therapist_id = $_SESSION['therapist_online'];

            $response = $therapist->update_therapist_profile($therapist_fname, $therapist_lname, $therapist_phone, $therapist_yob, $therapists_profile_img, $therapists_prof_cert, $therapists_bio, $therapist_id);

            // print_r($response);
            // die();

                if($response){
                    $_SESSION['therapist_feedback'] = "Profile updated successfully";
                    header('location:../update_therapist_profile.php');
                    exit();
                }else{
                    $_SESSION['error_message'] = "Failed to update profile";
                    header('location:../update_therapist_profile.php');
                    exit();
                }

    }else{
        $_SESSION['error_message'] = "You have not made any changes to the form. Please fill the form before clicking the Update button.";
        header('location:../update_therapist_profile.php');
        exit();
    }

?>