<?php
error_reporting();
require_once "Db.php";


class Users extends Db{

    private $dbcon;

    public function __construct(){
        $this->dbcon =$this->connect();
    }

    public function get_all_therapists(){
        $query = "SELECT * FROM therapists
        JOIN therapists_specialization ON therapists.therapists_therapistspecializationid = therapists_specialization.therapistspecialization_id
        JOIN state ON therapists.therapists_state = state.state_id
        JOIN lga ON therapists.therapists_lg = lga.lga_id";
        $stmt = $this->dbcon->prepare($query);
        $result = $stmt->execute();
        $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $records;
    }

    public function get_all_patients(){
        $query = "SELECT * FROM patients
        JOIN state ON patients.patients_stateid = state.state_id
        JOIN lga ON patients.patients_lgaid = lga.lga_id
        LIMIT 9";
        $stmt = $this->dbcon->prepare($query);
        $result = $stmt->execute();
        $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $records;
    }

    function countTherapists(){
        try {
            $sql = "SELECT COUNT(*) AS total_therapists FROM therapists";
            $stmt = $this->dbcon->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($result) {
                return $result['total_therapists'];
            } else {
                return 0; // No therapists found
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    function countPatients(){
        try {
            $sql = "SELECT COUNT(*) AS total_patients FROM patients";
            $stmt = $this->dbcon->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($result) {
                return $result['total_patients'];
            } else {
                return 0;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function get_all_msgs(){
        $query = "SELECT * FROM messages";
        $stmt = $this->dbcon->prepare($query);
        $result = $stmt->execute();
        $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $records;
    }

    public function get_all_blogs(){
        $query = "SELECT * FROM blog
        JOIN therapists ON blog.blog_therapistid = therapists.therapists_id
        JOIN therapists_qualification ON therapists.therapists_therapistsqualificationid = therapists_qualification.therapistsqualification_id
        ";
        $stmt = $this->dbcon->prepare($query);
        $result = $stmt->execute();
        $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $records;
    }
    
    
}

 $users = new Users;

?>