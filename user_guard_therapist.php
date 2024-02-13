<?php

    if(!(isset($_SESSION['therapist_online']))){
        $_SESSION['therapist_feedback'] = 'To access this page, you must be logged in.';
        header('location:login.php');
        exit();
    }

?>