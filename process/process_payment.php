<?php

    error_reporting(E_ALL);
    session_start();
    require_once('../classes/utilities.php');
    require_once('../classes/Patient.php');


    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnpay'])){

        $therapist = $_POST['therapist'];
        $patient_email = $_POST['patients_email'];
        $amount = $_POST['charge'];
        $payment_reference = $_POST['payment_reference'];

        // Insert payment details into the database
        $sql = "INSERT INTO payment (therapist, patienst_email, amount, payment_reference, payment_status) 
                VALUES (:therapist_id, :patient_email, :amount, :payment_reference, 'success')";

        try{
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':therapist', $therapist);
            $stmt->bindParam(':patients_email', $patients_email);
            $stmt->bindParam(':amount', $amount);
            $stmt->bindParam(':payment_reference', $payment_reference);
            $stmt->execute();
            print "Payment details inserted successfully!";
        }catch(PDOException $e) {
            echo 'Error inserting payment details: ' . $e->getMessage();
        }

        // if ($stmt->execute()) {
        //     // Payment details successfully inserted into the database
        //     echo 'Payment details recorded in the database.';
        // } else {
        //     // Error handling
        //     echo 'Error inserting payment details into the database.';
        // }

        // try {
        //     $stmt->execute();
        //     echo 'Payment data inserted into the database';
        // } catch (PDOException $e) {
        //     echo 'Insertion failed: ' . $e->getMessage();
        // }


    }



?>
