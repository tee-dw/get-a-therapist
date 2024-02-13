<?php

    error_reporting(E_ALL);
    session_start();
    require_once('../classes/utilities.php');
    require_once('../admin/Therapist.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        if($_POST && isset($_POST['gatform_submit'])){
        
        
            #we want to retrieve the form data
    
            $user_fname = sanitizer($_POST['fname']);
            $user_lname = sanitizer($_POST['lname']);
            $user_email = sanitizer($_POST['email']);
            $user_msg = sanitizer($_POST['messages']);

            if($user_fname == '' ||  $user_lname == '' || $user_email == '' || $user_msg == ''){
                $_SESSION['error_message'] = "Fields cannot be empty!";
                header("location:../contact.php");
                exit();
            }
    
            $rsp = $therapist->retrieve_msgs($user_fname, $user_lname, $user_email, $user_msg);
    
            if($rsp){
                $_SESSION['guest_feedback'] = "Sent! You will get an email shortly!";
                header("location:../contact.php");
            }else{
                header("location:../contact.php");
            }
    
        }else{
            
            #we want to send them back to the form (register.php)
            $_SESSION['error_message']="Please complete the form";
            header('location:../index.php');
    
        }

    }