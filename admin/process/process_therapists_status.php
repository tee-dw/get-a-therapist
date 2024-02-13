<?php

session_start();

if (!isset($_SESSION['admin_online'])) {
    header("Location: login.php");
    exit();
}

require_once("../classes/Admin.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['status-btn'])){

    $therapist_id = $_POST['therapist_id'];
    $current_status = $_POST['current_status'];

    $new_status = ($current_status != "Inactive") ? "Inactive" : "Active";

    $rsp = $admin1->toggle_therapists_status($new_status, $therapist_id);

    if ($rsp){
        // $_SESSION['admin_feedback'] = "Therapist status toggled successfully!";
        header('location:../all_therapists.php');
        exit();
    } else {
        // $_SESSION['error_message'] = "Error toggling therapist status!";
        header('location:../all_therapists.php');
        exit();
    }
} else {
    // Handle other cases if needed
}
?>