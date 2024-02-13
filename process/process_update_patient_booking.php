<?php

    error_reporting(E_ALL);
    session_start();
    require_once "../classes/Therapist.php";
    require_once "../classes/utilities.php";

    print "<pre>";
    print_r($_POST);
    print "</pre>";
    // die();

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnbooking'])){

            $therapy_duration = sanitizer($_POST['duration']);
            $therapy_status = $_POST['status'];
            $therapy_msg = $_POST['msg'];
            $status_session = $_POST['status_session'];
            $patient_id = $_POST['patient_id'];
            $therapist_id = $_POST['therapist_id'];
            $start_date = $_POST['date'];
            $end_date = $_POST['end_date'];
            // $therapist_id = $_SESSION['therapist_online'];

            $response = $therapist->update_patient_booking($therapy_duration, $therapy_status, $therapy_msg, $status_session, $start_date, $end_date, $therapist_id, $patient_id);

            // print_r($response);
            // die();

                if($response){
                    $_SESSION['therapist_feedback'] = "Booking updated successfully";
                    header('location:../update_patient_booking.php');
                    exit();
                }else{
                    $_SESSION['error_message'] = "Failed to update profile";
                    header('location:../update_patient_booking.php');
                    exit();
                }

    }else{
        $_SESSION['error_message'] = "You have not made any changes to the form. Please fill the form before clicking the Update button.";
        header('location:../update_patient_booking.php');
        exit();
    }

?>