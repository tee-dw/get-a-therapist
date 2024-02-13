<?php

    error_reporting(E_ALL);
    require_once('Db.php');

    class Patient extends Db{

        private $dbconn;

        public function __construct(){
            $this->dbconn = $this->connect();
        }

        public function get_details_byid($patient_id){
           
                $query = "SELECT therapy_sessionduration, therapy_sessionmode, therapy_whom, therapy_riskcheck, therapy_sessiondate, therapy_end_date, therapy_sessionstatus, therapy_bookingstatus, therapy_sessionpatientmsg, therapy_sessiontherapymsg, therapy_sessioncharges FROM therapy_session WHERE therapy_patientsid = ?";
                $stmt = $this->dbconn->prepare($query);
                $result = $stmt->execute([$patient_id]);
                $record = $stmt->fetch(PDO::FETCH_ASSOC);

                return $record;
        
        }

        public function sign_up($patient_fname, $patient_lname, $patient_email, $patient_phone, $patient_gender, $patient_state, $patient_lg, $patient_pwd, $patient_confpwd){

            if($patient_pwd == $patient_confpwd){

                try{

                    $hashed_password = password_hash($patient_pwd, PASSWORD_DEFAULT);
                    $query = "INSERT INTO patients (patients_fname, patients_lname, patients_email, patients_phone, patients_gender, patients_stateid, patients_lgaid, patients_pwd) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $this->dbconn->prepare($query);
                    $result = $stmt->execute([$patient_fname, $patient_lname, $patient_email, $patient_phone, $patient_gender, $patient_state, $patient_lg, $hashed_password]);
                    $_SESSION['patient_feedback'] = "Account created successfully, please complete your profile set-up";
                    $patientid = $this->dbconn->lastInsertId();
                    return $patientid;

                }catch(PDOException $e){
                    $_SESSION['error_message'] = "An error occured:" . $e->getMessage();
                    return 0;
                }

            }else{

                $_SESSION['error_message'] = "Password and Confirm Password must be the same";
                return 0;

            }
        }

        public function patient_login($email, $pwd){

            try{
                $query = "SELECT * FROM patients WHERE patients_email=? LIMIT 1";
                $stmt = $this->dbconn->prepare($query);
                $stmt->execute([$email]); 
                $records = $stmt->fetch(PDO::FETCH_ASSOC);
                if($records){
                    $hashed_password = $records['patients_pwd'];
                    $check = password_verify($pwd, $hashed_password); //will return true or false.
                    if($check){
                        return $records;
                    }else{
                        return false;
                    }
                }else{ 
                    return false;
                }
            }catch(PDOException $e){
                $_SESSION['error_message'] = "Please login in first";
                return 0;
            }
            
        }

        public function patient_logout(){
            session_unset();
            session_destroy();
        }

        public function upload_dp($patients_profile_img){

            $file_name = $patients_profile_img['name'];
            $file_type = $patients_profile_img['type'];
            $file_tmp_name = $patients_profile_img['tmp_name'];
            $file_size = $patients_profile_img['size'];

            if ($file_size > (5 * 1024*1024)){
                $_SESSION['error_message'] = "File is too big, maximun of 5mb";
                return false;
            }

            $allowed = ['image/jpeg', 'image/jpg', 'image/png'];
            if(!in_array($file_type, $allowed)){
                $_SESSION['error_message'] = "File type not allowed. Please upload an image";
                return false;
            }

            $unique_filename = "getatherapist" . "_" . time() . '_' . uniqid() . '_' . $file_name;
            
            $destination = "../uploads/" . $unique_filename;

            if(move_uploaded_file($file_tmp_name, $destination)){
                return $unique_filename;
            }else{
                return false;
            }
        }

        public function update_patient_profile($patient_fname, $patient_lname, $patient_phone, $patient_yob, $patients_profile_img, $patient_id){

                $resp = $this->upload_dp($patients_profile_img);

                $query = "UPDATE patients SET patients_fname = ?, patients_lname = ?, patients_phone = ?, patients_yob = ?, patients_profile_img = ? WHERE patients_id = ?";
                $stmt = $this->dbconn->prepare($query);
                $updated = $stmt->execute([$patient_fname, $patient_lname, $patient_phone, $patient_yob, $resp, $patient_id]);

                if($updated){
                    return true;
                }else{
                    return false;
                }

        }

        public function fetch_dp_by_id($patient_id){

                // try {
                    $query = "SELECT patients_profile_img FROM patients WHERE patients_id = ?";
                    $stmt = $this->dbconn->prepare($query);
            
                    if (!$stmt) {
                        throw new Exception("Error preparing statement: " . $this->dbconn->error);
                    }
            
                    $stmt->execute([$patient_id]);
            
                    if ($stmt->rowCount() > 0) {
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        return $result['patients_profile_img'];
                    }
                    
                    
                // } catch (PDOException $e) {
                    
                // }
                
        }

        public function get_patientbyid($id){

            $query = "SELECT * FROM patients WHERE patients_id=?";
            $stmt = $this->dbconn->prepare($query);
            $result = $stmt->execute([$id]);
            $records = $stmt->fetch(PDO::FETCH_ASSOC);
            return $records;

        }

        public function getpatient_state($stateid){
            $query = "SELECT * FROM state WHERE state_id=?";
            $stmt = $this->dbconn->prepare($query);
            $result = $stmt->execute([$stateid]);
            $records = $stmt->fetch(PDO::FETCH_ASSOC);
            return $records['state_name'];
        }

        public function getpatientlga_bystate($lgaid){
            $query = "SELECT * FROM lga WHERE lga_id =?";
            $stmt = $this->dbconn->prepare($query);
            $result = $stmt->execute([$lgaid]);
            $records = $stmt->fetch(PDO::FETCH_ASSOC);
            return $records['lga_name'];
        }

        public function get_state(){
            $query = "SELECT * FROM state";
            $stmt = $this->dbconn->prepare($query);
            $result = $stmt->execute();
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $records;
        }

        public function getlga_bystate($id){
            $query = "SELECT * FROM lga WHERE state_id =?";
            $stmt = $this->dbconn->prepare($query);
            $result = $stmt->execute([$id]);
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $records;
        }

        public function book_session($therapy_sessionmode, $therapy_sessionpatientmsg, $therapy_whom, $therapy_date, $risk_check, $therapist_id, $patient_id){

            try{

                if ($this->has_active_session($therapist_id, $patient_id)){
                    $_SESSION['error_message'] = "You already have an active session with this therapist.";
                    return false;
                }

                if ($this->has_any_active_session($patient_id)){
                    $_SESSION['error_message'] = "You already have an active session. You cannot book another session until the current one is over.";
                    return false;
                }

                $query = "INSERT INTO therapy_session (therapy_sessionmode, therapy_sessionpatientmsg, therapy_whom, therapy_sessiondate, therapy_riskcheck, therapy_therapistid, therapy_patientsid) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $this->dbconn->prepare($query);

                $result = $stmt->execute([$therapy_sessionmode, $therapy_sessionpatientmsg, $therapy_whom, $therapy_date, $risk_check, $therapist_id, $patient_id]);
                    
                    if ($result) {
                        $_SESSION['patient_feedback'] = "Session booked successfully!";
                    } else {
                        $_SESSION['error_message'] = "Failed to book session. Please try again.";
                    }
        
                return $result;

            }catch(PDOException $e){
                $_SESSION['error_message'] = "An error occured:" . $e->getMessage();
                return 0;
            }



        }

        public function has_active_session($patient_id, $therapist_id){
            $query = "SELECT COUNT(*) FROM therapy_session
            WHERE therapy_patientsid = ? AND therapy_therapistid = ? AND therapy_sessionstatus = 'Active'";
            $stmt = $this->dbconn->prepare($query);
            $stmt->execute([$patient_id, $therapist_id]);
            $count = $stmt->fetchColumn();
        
            return ($count > 0);
        }

        public function has_any_active_session($patient_id) {
            $query = "SELECT COUNT(*) FROM therapy_session
            WHERE therapy_patientsid = ? AND therapy_sessionstatus = 'Active'";
            $stmt = $this->dbconn->prepare($query);
            $stmt->execute([$patient_id]);
            $count = $stmt->fetchColumn();
    
            return ($count > 0);
        }
        
        public function get_booking_sessions(){
            $query = "SELECT * FROM therapy_session
            JOIN therapists on therapy_session.therapy_therapistid = therapists.therapists_id
            -- JOIN review on therapy_session.therapy_sessionid = review.review_therapysessionid
            ";
            $stmt = $this->dbconn->prepare($query);
            $result = $stmt->execute();
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $records;
        }

        public function get_sessions_by_patientid($patient_id) {
            try {
                $query = "SELECT * FROM therapy_session 
                JOIN patients ON patients.patients_id = therapy_session.therapy_patientsid 
                JOIN therapists ON therapists.therapists_id = therapy_session.therapy_therapistid 
                JOIN therapists_specialization ON therapists.therapists_therapistspecializationid = therapists_specialization.therapistspecialization_id 
                -- JOIN review on therapy_session.therapy_sessionid = review.review_therapysessionid
                WHERE therapy_session.therapy_patientsid = ?";

                $stmt = $this->dbconn->prepare($query);
        
                if (!$stmt) {
                    throw new Exception("Error preparing statement: " . $this->dbconn->error);
                }
        
                $stmt->execute([$patient_id]);
        
                $sessions = $stmt->fetchALL(PDO::FETCH_ASSOC);
                return $sessions;
                
            } catch (PDOException $e) {
                
                throw new Exception("Database error: " . $e->getMessage());
            } catch (Exception $e) {
               
                throw new Exception("Error: " . $e->getMessage());
            }
        }

        public function get_patient_with_therapist($patientId){
            $query = "SELECT therapists.therapists_id, therapists.therapists_fname, therapists.therapists_lname
            FROM therapists
            JOIN therapy_session ON therapists.therapists_id = therapy_session.therapy_therapistid
            JOIN patients ON therapy_session.therapy_patientsid = patients.patients_id
            WHERE patients.patients_id = '$patientId';";
            $stmt = $this->dbconn->prepare($query);
            $result = $stmt->execute();
            if ($result > 0) {
                // Therapist found, return the data
                $therapistData = $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                // Therapist not found
                $therapistData = null;
            }
            // $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // return $records;

            return $therapistData;

        }

        public function get_all_patients(){
            $query = "SELECT * FROM patients";
            $stmt = $this->dbconn->prepare($query);
            $result = $stmt->execute();
            $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $records;
        }

        public function post_review($relationship, $goals, $approach, $patient_review, $patient_id, $session_id){

            // $response = $this->upload_blogdp($blog_img);

            // if($response){

                $query = "INSERT INTO review (relationship_rating, goals_rating, approach_rating, review_comment, review_patientid, review_therapysessionid) VALUES (?, ?, ?, ?, ?, ?)";

                $stmt = $this->dbconn->prepare($query);

                $resp = $stmt->execute([$relationship, $goals, $approach, $patient_review, $patient_id, $session_id]);

                if($resp){
                    $_SESSION['patient_feedback'] = "Review Sent Successfully!";
                    return true;
                }else{
                    return false;
                }

            // }

        }

        public function get_all_reviews(){
            $query = "SELECT * FROM review
            JOIN patients on review.review_patientid = patients.patients_id
            JOIN therapy_session on review.review_therapysessionid = therapy_session.therapy_sessionid
            ";
            $stmt = $this->dbconn->prepare($query);
            $result = $stmt->execute();
            $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $records;
        }



    }

    $patient = new Patient();


?>