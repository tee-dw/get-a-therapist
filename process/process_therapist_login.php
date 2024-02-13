<?php

    error_reporting(E_ALL);
    session_start();
    require_once('../classes/utilities.php');
    require_once('../classes/Therapist.php');
    
    #we want to disallow direct visit to this file.

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        if($_POST && isset($_POST['btn_login_therapist'])){

            // print "hello";
            
            $email = sanitizer($_POST['therapist_email']);
            $pwd = $_POST['therapist_pwd'];

            $rsp = $therapist->therapist_login($email, $pwd);

            // print "<pre>";
            // print_r($rsp);
            // print "</pre>";
            // exit();
            
            if(is_array($rsp)){
                $_SESSION['therapist_online'] = $rsp['therapists_id'];
                $_SESSION['therapist_feedback'] = "Login Successful!";
                header("location:../dashboard_therapist.php");
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