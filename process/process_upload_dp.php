<?php
    
    error_reporting(E_ALL);

    $data2return = array();

    if($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_SESSION['patient_online'])){

        $filename = $_FILES['picture']['name'];
        $tmp = $_FILES['picture']['tmp_name'];
        $type = $_FILES['picture']['type'];
        $size = $_FILES['picture']['size'];
        $error = $_FILES['picture']['error'];

            $allowed_image_types = ['image/jpeg', 'image/jpg', 'image/png'];

            if (!in_array($type, $allowed_image_types)){
                $data2return = array("status" => 0, "message" => "File type not allowed. Only JPEG, PNG, and JPG are allowed.");
                return false;
            } else if (!$error){

                $max_file_size = 5 * 1024 * 1024; // 5 MB
                if ($size <= $max_file_size){
                $unique_filename = "getatherapist" . "_" . time() . '_' . uniqid() . '_' . $file_name;
                $destination = "../uploads/" . $unique_filename;
                $upload_success = move_uploaded_file($tmp, $destination);

                    if($upload_success){
                        $data2return = ["status"=>1,"message"=>$unique_filename];
                    }else{
                        $data2return = ["status"=>0,"message"=>"Failed"];
                    }

                }else{
                        $data2return = ["status"=>0,"message"=>"Error uploading image"];
                }

            }

    }
    
    print json_encode($data2return);


?>