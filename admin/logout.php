<?php

    error_reporting(E_ALL);
    session_start();
    require_once('classes/Admin.php');
    $admin1->logout_admin();

    header('location:login.php');

?>