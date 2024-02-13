<?php
    error_reporting(E_ALL);
    session_start();

    require_once "../classes/utilities.php";
    require_once "../classes/Admin.php";
    
    if($_POST && isset($_POST['login_btn'])){
        //collect the form data and sanitize
        $email = sanitizer($_POST['email']);
        $password = $_POST['password'];

        //validate
        if(empty($email) || empty($password)){
            $_SESSION["error_message"] = "Either email or password is not provided";
            header("location: ../login.php");
        }

        $admin_confirmed = $admin1->login_admin($email, $password);

        if($admin_confirmed){
            $_SESSION["admin_online"] = $admin_confirmed;
            $_SESSION['admin_feedback'] = "Login Successful";
            header("location:../dashboard.php");
            exit();
        }else{
            header("location: ../login.php");
            exit();
        }
    }else{
        $_SESSION["error_message"] = "Please, login the right way...";
        header("location: ../login.php");
        exit();
    }

?>