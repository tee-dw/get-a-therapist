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

        if($_POST && isset($_POST['btnsubmit'])){
            
            $therapy_sessionmode = $_POST['therapy-mode'];
            $therapy_sessionpatientmsg = sanitizer($_POST['msg']);
            $therapist_id = $_POST['therapist_id'];
            $patient_id = $_POST['patient_id'];
            $therapy_whom = $_POST['therapy-who'];
            $therapy_date = $_POST['date'];
            $risk_check = $_POST['risk-check'];

            if($therapy_sessionmode == '' || $therapy_sessionpatientmsg == '' || $therapy_whom == '' || $therapy_date == '' || $risk_check == ''){
                $_SESSION['error_message'] = "Fields cannot be empty! Please fill all fields so we can process your booking!";
                header("location:../book_session.php");
                exit();
            }

                $rsp = $patient->book_session($therapy_sessionmode, $therapy_sessionpatientmsg, $therapy_whom, $therapy_date, $risk_check, $therapist_id, $patient_id);

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
    
        }else{
            
            $_SESSION['error_message']="Please complete the form";
            header('location:../signup.php');
    
        }

    }