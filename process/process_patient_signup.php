<?php

    error_reporting(E_ALL);
    session_start();
    require_once('../classes/utilities.php');
    require_once('../classes/Patient.php');

    #we want to disallow direct visit to this file.
    // var_dump($_SERVER["REQUEST_METHOD"]);
    // exit();

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        if($_POST && isset($_POST['patient-signup-btn'])){
        
        
            #we want to retrieve the form data
    
            $patient_fname = sanitizer($_POST['patient_fname']);
            $patient_lname = sanitizer($_POST['patient_lname']);
            $patient_email = sanitizer($_POST['patient_email']);
            $patient_phone = sanitizer($_POST['patient_phone']);
            $patient_gender = $_POST['patient_gender'];
            $patient_state = $_POST['state'];
            $patient_lg = $_POST['lga'];
            $patient_pwd = $_POST['patient_pwd'];
            $patient_confpwd = $_POST['patient_confpwd'];

            if($patient_fname == '' ||  $patient_lname == '' || $patient_email == '' || $patient_phone == '' || $patient_gender == '' || $patient_state == '' || $patient_lg == '' || $patient_pwd == '' || $patient_confpwd == ''){
                $_SESSION['error_message'] = "Fields cannot be empty!";
                header("location:../signup.php");
                exit();
            }
    
            $rsp = $patient->sign_up($patient_fname, $patient_lname, $patient_email, $patient_phone, $patient_gender, $patient_state, $patient_lg, $patient_pwd, $patient_confpwd);
    
            if($rsp){
                $_SESSION['patient_online'] = $rsp;
                header("location:../dashboard_patient.php");
            }else{
                header("location:../signup.php");
            }
    
        }else{
            
            #we want to send them back to the form (register.php)
            $_SESSION['error_message']="Please complete the form";
            header('location:../signup.php');
    
        }

    }