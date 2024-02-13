<?php

    error_reporting(E_ALL);
    session_start();
    require_once "../classes/Admin.php";
    require_once "../classes/utilities.php";

    print "<pre>";
    print_r($_POST);
    print "</pre>";
    // die();

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_btn']) && $_FILES['upload-dp']['error']==0){

        print "<pre>";
        print_r($_FILES);
        print "</pre>";
        // die();

            $admin_fname = sanitizer($_POST['fname']);
            $admin_lname = sanitizer($_POST['lname']);
            $admin_dp = $_FILES['upload-dp'];

            print_r($admin_dp);

            $admin_id = $_SESSION['admin_online'];

            $response = $admin1->update_admin_profile($admin_fname, $admin_lname, $admin_dp, $admin_id);

            // print_r($response);
            // die();

                if($response){
                    $_SESSION['admin_feedback'] = "Profile updated successfully";
                    header('location:../edit_profile.php');
                    exit();
                }else{
                    $_SESSION['error_message'] = "Failed to update profile";
                    header('location:../edit_profile.php');
                    exit();
                }

    }else{
        // $_SESSION['error_message'] = "You have not made any changes to the form. Please fill the form before clicking the Update button.";
        // header('location:../edit_profile.php');
        // exit();
    }

?>