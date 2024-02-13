<?php

    error_reporting(E_ALL);
    session_start();
    require_once "../classes/Therapist.php";
    require_once "../classes/utilities.php";

    // print "<pre>";
    // print_r($_POST);
    // print "</pre>";
    // die();

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_blog']) && $_FILES['upload_blog']['error']==0){

        // print "<pre>";
        // print_r($_FILES);
        // print "</pre>";
        // die();

            //collect form values and sanitize
            $blog_title = sanitizer($_POST['title']);
            $blog_caption = sanitizer($_POST['caption']);
            $blog_content = sanitizer($_POST['content']);
            $blog_img = $_FILES['upload_blog'];

            // print "<pre>";
            // print_r($blog_img);
            // print "</pre>";
            // die();

            $therapist_id = $_SESSION['therapist_online'];

            $response = $therapist->upload_blog($blog_img, $blog_title, $blog_caption, $blog_content, $therapist_id);

            // print_r($response);
            // die();

                if($response){
                    $_SESSION['therapist_feedback'] = "Blog uploaded successfully! Scroll down to see your blog details.";
                    header('location:../blog.php');
                    exit();
                }else{
                    $_SESSION['error_message'] = "Failed to update blog";
                    header('location:../blog.php');
                    exit();
                }

    }else{
        $_SESSION['error_message'] = "You have not made any changes to the form. Please fill the form before clicking the Update button.";
        header('location:../blog.php');
        exit();
    }

?>