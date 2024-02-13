<?php

    if(!(isset($_SESSION['patient_online']))){
        $_SESSION['patient_feedback'] = 'To access this page, you must be logged in.';
        header('location:login.php');
        exit();
    }

?>