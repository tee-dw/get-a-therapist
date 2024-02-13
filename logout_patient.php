<?php

    error_reporting(E_ALL);

    session_start();
    require_once('classes/Patient.php');
    $patient->patient_logout();

    header('location:index.php');

?>