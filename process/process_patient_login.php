<?php

    error_reporting(E_ALL);
    session_start();
    require_once('../classes/utilities.php');
    require_once('../classes/Patient.php');
    
    #we want to disallow direct visit to this file.

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        if($_POST && isset($_POST['btn_login_patient'])){

            // print "hello";
            
            $email = sanitizer($_POST['patient_email']);
            $pwd = $_POST['patient_pwd'];

            $rsp = $patient->patient_login($email, $pwd);

            // print "<pre>";
            // print_r($rsp);
            // print "</pre>";
            // exit();
            
            if(is_array($rsp)){
                $_SESSION['patient_online'] = $rsp['patients_id'];
                $_SESSION['patient_feedback'] = "Login Successful!";
                header("location:../dashboard_patient.php");
                // print("welcome");
            }else{
                $_SESSION['error_message'] = 'Login failed, pls try again..';
                header("location:../login.php");
            }

        }else{
            
            $_SESSION['error_message']="Invalid Access";
            header('location:../login.php');
            exit();

        }

    }

?>