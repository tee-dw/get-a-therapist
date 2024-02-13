<?php

    error_reporting(E_ALL);
    session_start();
    require_once('../classes/utilities.php');
    require_once('../classes/Patient.php');

    

    // print "<pre>";
    // print_r($_POST);
    // print "</pre>";
    // die();

    // print_r($_SESSION);
    // die();

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        if($_POST && isset($_POST['btnreview'])){
            
            $relationship = $_POST['relationship'];
            $goals = $_POST['goals'];
            $approach = $_POST['approach'];
            $patient_review = sanitizer($_POST['review']);
            $session_id = $_POST['session_id'];
            $patient_id = $_SESSION['patient_online'];
            

                // if (empty($therapy_sessionmode) || empty($therapy_session_patientmsg)) {
                //     $_SESSION['error_message'] = "Please complete the form.";
                //     header('location: ../book_session.php');
                //     exit();
                // }

                $rsp = $patient->post_review($relationship, $goals, $approach, $patient_review, $patient_id, $session_id);

            // print "<pre>";
            // print_r($rsp);
            // print "</pre>";
            // die();
    
                if($rsp){
                    $_SESSION['patient_online'] = $patient_id;
                    header("location:../dashboard_patient.php");
                    exit();
                }else{
                    header("location:../book_session.php");
                    exit();
                }
                // }

        }
    
    }else{
            
        $_SESSION['error_message']="Please complete the form";
        header('location:../signup.php');
    
    }