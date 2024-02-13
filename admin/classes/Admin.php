<?php

    error_reporting(E_ALL);
    require_once('Db.php');

    class Admin extends Db
    {

        private $dbcon;

        public function __construct(){
            $this->dbcon = $this->connect();
        }

        public function login_admin($email, $password){

            $query = "SELECT * FROM admin WHERE admin_email = ? ";
            $stmt = $this->dbcon->prepare($query);
            $stmt->execute([$email]);
            $records = $stmt->fetch(PDO::FETCH_ASSOC);

            // print "<pre>";
            // print_r($records);
            // print "</pre>";
            // exit();

            if(!$records){
                $_SESSION["error_message"] = "Invalid login Credentials";
                return false;
               }
            
            if($records){
                //compare the pasword pass with hashed password
                $hashed_password = $records["admin_password"];
                $checked = password_verify($password, $hashed_password);

                // print_r($checked);
                // exit();

                if($checked){
                    return $records['admin_id'];
                }else{
                    $_SESSION["error_message"] = "Invalid login credentials";
                    return false;
                }
            }

        }

        public function getadminbyid($id){
            $query = "SELECT * FROM admin WHERE admin_id=?";
            $stmt = $this->dbcon->prepare($query);
            $result = $stmt->execute([$id]);
            $records = $stmt->fetch(PDO::FETCH_ASSOC);
            return $records;

        }

        public function upload_admin_dp($admin_dp){

            // if (!isset($admin_dp['name']) || !isset($admin_dp['type']) || !isset($admin_dp['tmp_name']) || !isset($admin_dp['size'])) {
            //     $_SESSION['error_message'] = "Invalid file data";
            //     return false;
            // }

            $f_name = $admin_dp['name'];
            $f_type = $admin_dp['type'];
            $f_tmp_name = $admin_dp['tmp_name'];
            $f_size = $admin_dp['size'];

            print "Detected File Type: " . $f_type;

            if ($f_size > (5 * 1024*1024)){
                $_SESSION['error_message'] = "File is too big, maximun of 5mb";
                return false;
            }

            $allowed = ['image/jpeg', 'image/jpg', 'image/png'];
            if(!in_array($f_type, $allowed)){
                $_SESSION['error_message'] = "File type not allowed. Please upload an image";
                return false;
            }

            if (!file_exists($f_tmp_name) || !is_uploaded_file($f_tmp_name)) {
                $_SESSION['error_message'] = "Invalid file";
                return false;
            }

            $unique_filename = "getatherapist_admin_" . time() . '_' . uniqid() . '_' . $f_name;
            
            $destination = "../upload/" . $unique_filename;

            if(move_uploaded_file($f_tmp_name, $destination)){
                return $unique_filename;
            }else{
                // $_SESSION['error_message'] = "Error uploading file: " . $_FILES['upload-dp']['error'];
                // return false;
                $_SESSION['error_message'] = "Error uploading file: " . error_get_last()['message'];
                return false;
            }
        }

        public function update_admin_profile($admin_fname, $admin_lname, $admin_dp, $admin_id){

            $resp = $this->upload_admin_dp($admin_dp);

            $query = "UPDATE admin SET admin_fname = ?, admin_lname = ?, admin_dp = ?  WHERE admin_id = ?";
            $stmt = $this->dbcon->prepare($query);
            $updated = $stmt->execute([$admin_fname, $admin_lname, $admin_dp, $admin_id]);

            if($updated){
                return true;
            }else{
                return false;
            }

        }

        public function fetch_dp_by_id($admin_id){

            try {
                $query = "SELECT admin_dp FROM admin WHERE admin_id = ?";
                $stmt = $this->dbcon->prepare($query);
        
                if (!$stmt) {
                    throw new Exception("Error preparing statement: " . $this->dbcon->error);
                }
        
                $stmt->execute([$admin_id]);
        
                if ($stmt->rowCount() > 0) {
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $result['admin_dp'];
                }
                
            } catch (PDOException $e) {
                
            }
            
        }

        public function logout_admin(){
            session_unset();
            session_destroy();
        }

        public function toggle_therapists_status($new_status, $therapist_id){

                $query = "UPDATE therapists SET therapists_status = ? WHERE therapists_id = ?";
                $stmt = $this->dbcon->prepare($query);
                $updated = $stmt->execute([$new_status, $therapist_id]);
                return $updated;
        }
        

    }

    $admin1 = new Admin();

?>