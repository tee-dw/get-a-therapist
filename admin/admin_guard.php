<?php

    if(!(isset($_SESSION['admin_online']))){
        $_SESSION['error_message'] = 'You must be logged in as an admin in order to access this page.';
        header('location:login.php');
        exit();
    }

?>