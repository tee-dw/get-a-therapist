<?php

    error_reporting(E_ALL);

    session_start();
    require_once('classes/Therapist.php');
    $therapist->therapist_logout();

    header('location:index.php');

?>