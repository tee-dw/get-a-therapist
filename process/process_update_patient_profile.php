<?php

    error_reporting(E_ALL);
    session_start();
    require_once "../classes/Patient.php";
    require_once "../classes/utilities.php";

    // print "<pre>";
    // print_r($_POST);
    // print "</pre>";
    // die();

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnsubmit_patient']) && $_FILES['upload-dp']['error']==0){

        // print "<pre>";
        // print_r($_FILES);
        // print "</pre>";
        // die();

            //collect form values and sanitize
            $patient_fname = sanitizer($_POST['fname']);
            $patient_lname = sanitizer($_POST['lname']);
            $patient_phone = $_POST['phone'];
            $patient_yob = $_POST['yob'];
            $patients_profile_img = $_FILES['upload-dp'];

            $patient_id = $_SESSION['patient_online'];

            $response = $patient->update_patient_profile($patient_fname, $patient_lname, $patient_phone, $patient_yob, $patients_profile_img, $patient_id);

            // print_r($response);
            // die();

                if($response){
                    $_SESSION['patient_feedback'] = "Profile updated successfully";
                    header('location:../update_patient_profile.php');
                    exit();
                }else{
                    $_SESSION['error_message'] = "Failed to update profile";
                    header('location:../update_patient_profile.php');
                    exit();
                }

    }else{
        $_SESSION['error_message'] = "You have not made any changes to the form. Please fill the form before clicking the Update button.";
        header('location:../update_patient_profile.php');
        exit();
    }

?>