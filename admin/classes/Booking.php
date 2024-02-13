<?php

error_reporting(E_ALL);
    require_once('Db.php');

    class Booking extends Db
    {

        private $dbcon;

        public function __construct(){
            $this->dbcon = $this->connect();
        }

        public function getallbookings(){
            $sql = "SELECT *
            FROM therapy_session
            JOIN patients ON therapy_session.therapy_patientsid = patients.patients_id
            JOIN therapists ON therapy_session.therapy_therapistid = therapists.therapists_id LIMIT 7;
            ";
            $stmt = $this->dbcon->prepare($sql);
            $stmt->execute();
            $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $bookings;
        }

        function countBookings(){
            try {
                $sql = "SELECT COUNT(*) AS total_bookings FROM therapy_session";
                $stmt = $this->dbcon->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
                if ($result) {
                    return $result['total_bookings'];
                } else {
                    return 0;
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return false;
            }
        }

    }

    $book = new Booking();

?>