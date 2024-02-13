<?php

    error_reporting(E_ALL);
    require_once('Db.php');

    class Therapist extends Db{

        private $dbconn;

        public function __construct(){
            $this->dbconn = $this->connect();
        }

        public function get_therapistbyid($id){

            $query = "SELECT * FROM therapists
            JOIN therapists_specialization ON therapists.therapists_therapistspecializationid = therapists_specialization.therapistspecialization_id
            WHERE therapists_id=?";
            $stmt = $this->dbconn->prepare($query);
            $result = $stmt->execute([$id]);
            $records = $stmt->fetch(PDO::FETCH_ASSOC);
            return $records;

        }

        public function sign_up($therapist_fname, $therapist_lname, $therapist_email, $therapist_phone, $therapist_gender, $therapist_year_started, $prof_cert, $therapist_professional_title, $therapist_charge, $therapist_state, $therapist_lg, $therapist_pwd, $therapist_confpwd, $therapist_spec, $therapist_qualification){

            if($therapist_pwd == $therapist_confpwd){

                try{

                    #write the query.
                    $hashed_password = password_hash($therapist_pwd, PASSWORD_DEFAULT);
                    $query = "INSERT INTO therapists (therapists_fname, therapists_lname, therapists_email, therapists_phone, therapists_gender, therapists_yearstarted, therapists_prof_cert, therapists_professional_title, therapists_amtperhour, therapists_state, therapists_lg, therapists_pwd, therapists_therapistspecializationid, therapists_therapistsqualificationid) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                    #prepare the query
                    $stmt = $this->dbconn->prepare($query);

                    #execute
                    $result = $stmt->execute([$therapist_fname, $therapist_lname, $therapist_email, $therapist_phone, $therapist_gender, $therapist_year_started, $prof_cert, $therapist_professional_title, $therapist_charge, $therapist_state, $therapist_lg, $hashed_password, $therapist_spec, $therapist_qualification]);

                    $_SESSION['therapist_feedback'] = "Account created successfully. Please click on 'edit my profile' to complete your profile setup";
                    $therapistid = $this->dbconn->lastInsertId();
                    return $therapistid;

                }catch(PDOException $e){
                    $_SESSION['error_message'] = "An error occured:" . $e->getMessage();
                    return 0;
                }

            }else{

                $_SESSION['error_message'] = "Password and Confirm Password must be the same";
                return 0;

            }
        }

        public function therapist_login($email, $pwd){

            try{
                $query = "SELECT * FROM therapists WHERE therapists_email=? LIMIT 1";
                $stmt = $this->dbconn->prepare($query);
                $stmt->execute([$email]); 
                $records = $stmt->fetch(PDO::FETCH_ASSOC);
                if($records){
                    $hashed_password = $records['therapists_pwd'];
                    $check = password_verify($pwd, $hashed_password);
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

        public function therapist_logout(){
            session_unset();
            session_destroy();
        }

        public function upload_therapist_dp($therapists_profile_img){

            $f_name = $therapists_profile_img['name'];
            $f_type = $therapists_profile_img['type'];
            $f_tmp_name = $therapists_profile_img['tmp_name'];
            $f_size = $therapists_profile_img['size'];

            if ($f_size > (5 * 1024*1024)){
                $_SESSION['error_message'] = "File is too big, maximun of 5mb";
                return false;
            }

            $allowed = ['image/jpeg', 'image/jpg', 'image/png'];
            if(!in_array($f_type, $allowed)){
                $_SESSION['error_message'] = "File type not allowed. Please upload an image";
                return false;
            }

            $unique_filename = "getatherapist" . "_" . time() . '_' . uniqid() . '_' . $f_name;
            
            $destination = "../uploads/" . $unique_filename;

            if(move_uploaded_file($f_tmp_name, $destination)){
                return $unique_filename;
            }else{
                $_SESSION['error_message'] = "Error uploading file: " . $_FILES['upload-dp']['error'];
                return false;
            }
        }

        public function update_therapist_profile($therapist_fname, $therapist_lname, $therapist_phone, $therapist_yob, $therapists_profile_img, $therapists_prof_cert,$therapists_bio, $therapist_id){

            $resp = $this->upload_therapist_dp($therapists_profile_img);

            $query = "UPDATE therapists SET therapists_fname = ?, therapists_lname = ?, therapists_phone = ?, therapists_yob = ?, therapists_profile_img = ?, therapists_prof_cert = ?, therapists_bio = ?  WHERE therapists_id = ?";
            $stmt = $this->dbconn->prepare($query);
            $updated = $stmt->execute([$therapist_fname, $therapist_lname, $therapist_phone, $therapist_yob, $resp, $therapists_prof_cert, $therapists_bio, $therapist_id]);

            if($updated){
                return true;
            }else{
                return false;
            }

        }

        public function fetch_dp_by_id($therapist_id){

            try {
                $query = "SELECT therapists_profile_img FROM therapists WHERE therapists_id = ?";
                $stmt = $this->dbconn->prepare($query);
        
                if (!$stmt) {
                    throw new Exception("Error preparing statement: " . $this->dbconn->error);
                }
        
                $stmt->execute([$therapist_id]);
        
                if ($stmt->rowCount() > 0) {
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $result['therapists_profile_img'];
                }

            } catch (PDOException $e) {
                // Handle database-related exceptions
                throw new Exception("Database error: " . $e->getMessage());
            }

        }

        public function upload_blogdp($blog_img){

            $filename = $blog_img['name'];
            $filetype = $blog_img['type'];
            $file_tmp_name = $blog_img['tmp_name'];
            $filesize = $blog_img['size'];

            if ($filesize > (5 * 1024*1024)){
                $_SESSION['error_message'] = "File is too big, maximun of 5mb";
                return false;
            }

            $allowed = ['image/jpeg', 'image/jpg', 'image/png'];
            if(!in_array($filetype, $allowed)){
                $_SESSION['error_message'] = "File type not allowed. Please upload an image";
                return false;
            }

            $unique_filename = "gat_blog" . "_" . time() . '_' . uniqid() . '_' . $filename;
            
            $destination = "../upload/" . $unique_filename;

            if(move_uploaded_file($file_tmp_name, $destination)){
                return $unique_filename;
            }else{
                $_SESSION['error_message'] = "Error uploading file: " . $_FILES['upload_blog']['error'];
                return false;
            }
        }

        public function upload_blog($blog_img, $blog_title, $blog_caption, $blog_content, $therapist_id){

            $response = $this->upload_blogdp($blog_img);

            if($response){

                $query = "INSERT INTO blog (blog_img, blog_title, blog_caption, blog_content, blog_therapistid) VALUES (?, ?, ?, ?, ?)";

                $stmt = $this->dbconn->prepare($query);

                $resp = $stmt->execute([$response, $blog_title, $blog_caption, $blog_content, $therapist_id]);

                if($resp){
                    return true;
                }else{
                    return false;
                }

            }

        }

        public function fetch_blogdp_by_id($therapist_id){

            try {
                $query = "SELECT blog_img FROM blog WHERE blog_therapistid = ?";
                $stmt = $this->dbconn->prepare($query);
        
                if (!$stmt) {
                    throw new Exception("Error preparing statement: " . $this->dbconn->error);
                }
        
                $stmt->execute([$therapist_id]);
        
                if ($stmt->rowCount() > 0) {
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $result['blog_img'];
                }
                // else {
                //     throw new Exception("Therapist not found with the specified ID.");
                // }
            } catch (PDOException $e) {
                // Handle database-related exceptions
                throw new Exception("Database error: " . $e->getMessage());
            } catch (Exception $e) {
                // Handle other exceptions
                throw new Exception("Error: " . $e->getMessage());
            }
        }

        public function get_blogs(){
            $query = "SELECT * FROM blog
            JOIN therapists ON blog.blog_therapistid = therapists.therapists_id
            JOIN therapists_qualification ON therapists.therapists_therapistsqualificationid = therapists_qualification.therapistsqualification_id
            LIMIT 4";
            $stmt = $this->dbconn->prepare($query);
            $result = $stmt->execute();
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $records;
        }

        public function get_all_blogs_for_a_therapist($therapist_id){
            $query = "SELECT * FROM blog
            JOIN therapists ON blog.blog_therapistid = therapists.therapists_id WHERE blog_therapistid = ?";
            $stmt = $this->dbconn->prepare($query);
            $result = $stmt->execute([$therapist_id]);
            $blogs = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $blogs;
        }

        public function update_patient_booking($therapy_duration, $therapy_status, $therapy_msg, $status_session, $start_date, $end_date, $therapist_id, $patient_id){

            $query = "UPDATE therapy_session SET therapy_sessionduration = ?, therapy_bookingstatus = ?, therapy_sessiontherapymsg = ?, therapy_sessionstatus = ?, therapy_sessiondate = ?, therapy_end_date = ? WHERE therapy_therapistid = ? AND therapy_patientsid =?";
            $stmt = $this->dbconn->prepare($query);
            $updated = $stmt->execute([$therapy_duration, $therapy_status, $therapy_msg, $status_session, $start_date, $end_date, $therapist_id, $patient_id]);

            if($updated){
                return true;
            }else{
                return false;
            }
        }
    

        public function get_sessions_by_therapistid($therapist_id) {
            try {
                $query = "SELECT * FROM therapy_session
                JOIN patients ON patients.patients_id = therapy_session.therapy_patientsid 
                JOIN therapists ON therapists.therapists_id = therapy_session.therapy_therapistid 
                JOIN therapists_specialization ON therapists.therapists_therapistspecializationid = therapists_specialization.therapistspecialization_id 
                WHERE therapists_id = ?";

                $stmt = $this->dbconn->prepare($query);
        
                if (!$stmt) {
                    throw new Exception("Error preparing statement: " . $this->dbconn->error);
                }
        
                $stmt->execute([$therapist_id]);
        
                $sessions = $stmt->fetchALL(PDO::FETCH_ASSOC);
        
                return $sessions;
            } catch (PDOException $e) {
                
                throw new Exception("Database error: " . $e->getMessage());
            } catch (Exception $e) {
                
                throw new Exception("Error: " . $e->getMessage());
            }
        }

        public function get_session_by_therapistid($therapist_id) {
            try {
                $query = "SELECT * FROM therapy_session
                JOIN patients ON patients.patients_id = therapy_session.therapy_patientsid 
                JOIN therapists ON therapists.therapists_id = therapy_session.therapy_therapistid 
                JOIN therapists_specialization ON therapists.therapists_therapistspecializationid = therapists_specialization.therapistspecialization_id 
                WHERE therapists_id = ?";

                $stmt = $this->dbconn->prepare($query);
        
                if (!$stmt) {
                    throw new Exception("Error preparing statement: " . $this->dbconn->error);
                }
        
                $stmt->execute([$therapist_id]);
        
                $sessions = $stmt->fetch(PDO::FETCH_ASSOC);
        
                return $sessions;
            } catch (PDOException $e) {
                
                throw new Exception("Database error: " . $e->getMessage());
            } catch (Exception $e) {
                
                throw new Exception("Error: " . $e->getMessage());
            }
        }

        public function get_all_therapists_for_a_spec(){
            $query = "SELECT * FROM therapists
            JOIN therapists_specialization ON therapists.therapists_therapistspecializationid = therapists_specialization.therapistspecialization_id
            JOIN therapists_qualification ON therapists.therapists_therapistsqualificationid = therapists_qualification.therapistsqualification_id
            LIMIT 5";
            $stmt = $this->dbconn->prepare($query);
            $result = $stmt->execute();
            $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $records;
        }
        
        public function get_all_therapists(){
            $query = "SELECT * FROM therapists
            JOIN therapists_specialization ON therapists.therapists_therapistspecializationid = therapists_specialization.therapistspecialization_id
            JOIN therapists_qualification ON therapists.therapists_therapistsqualificationid = therapists_qualification.therapistsqualification_id
            JOIN state ON therapists.therapists_state = state.state_id";
            $stmt = $this->dbconn->prepare($query);
            $result = $stmt->execute();
            $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $records;
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

        public function gettherapist_state($stateid){
            $query = "SELECT * FROM state WHERE state_id=?";
            $stmt = $this->dbconn->prepare($query);
            $result = $stmt->execute([$stateid]);
            $records = $stmt->fetch(PDO::FETCH_ASSOC);
            return $records['state_name'];
        }

        public function gettherapistlga_bystate($lgaid){
            $query = "SELECT * FROM lga WHERE lga_id =?";
            $stmt = $this->dbconn->prepare($query);
            $result = $stmt->execute([$lgaid]);
            $records = $stmt->fetch(PDO::FETCH_ASSOC);
            return $records['lga_name'];
        }

        public function get_booking_sessions(){
            $query = "SELECT * FROM therapy_session JOIN patients on therapy_session.therapy_patientsid = patients.patients_id";
            $stmt = $this->dbconn->prepare($query);
            $result = $stmt->execute();
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $records;
        }

        public function get_table_details(){
            $query = "SELECT * FROM therapists";
            $stmt = $this->dbconn->prepare($query);
            $result = $stmt->execute();

            if ($result > 0) {
                return $stmt->fetchALL(PDO::FETCH_ASSOC);
            } else {
                return false;
            }
        }

        public function retrieve_msgs($user_fname, $user_lname, $user_email, $user_msg){
            try{

                $query = "INSERT INTO messages (firstname, lastname, email, messages) VALUES (?, ?, ?, ?)";
                $stmt = $this->dbconn->prepare($query);

                $result = $stmt->execute([$user_fname, $user_lname, $user_email, $user_msg]);
                    
                    if ($result) {
                        $_SESSION['guest_feedback'] = "Sent!";
                    } else {
                        $_SESSION['error_message'] = "Failed to send. Please try again.";
                    }
        
                return $result;

            }catch(PDOException $e){
                $_SESSION['error_message'] = "An error occured:" . $e->getMessage();
                return 0;
            }
        }




    }

    $therapist = new Therapist();



?>