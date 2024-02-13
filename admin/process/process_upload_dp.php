<?php
    
    // error_reporting(E_ALL);

    // $data2return = array();

    

    // if($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_SESSION['admin_online'])){

    //     $filename = $_FILES['picture']['name'];
    //     $tmp = $_FILES['picture']['tmp_name'];
    //     $type = $_FILES['picture']['type'];
    //     $size = $_FILES['picture']['size'];
    //     $error = $_FILES['picture']['error'];

    //         $allowed_image_types = ['image/jpeg', 'image/jpg', 'image/png'];

    //         if (!in_array($type, $allowed_image_types)){
    //             $data2return = array("status" => 0, "message" => "File type not allowed. Only JPEG, PNG, and JPG are allowed.");
    //             return false;
    //         } else if (!$error){

    //             $max_file_size = 5 * 1024 * 1024; // 5 MB
    //             if ($size <= $max_file_size){
    //             $unique_filename = "getatherapist" . "_admin" . time() . '_' . uniqid() . '_' . $file_name;
    //             $destination = "../upload/" . $unique_filename;
    //             $upload_success = move_uploaded_file($tmp, $destination);

    //                 if($upload_success){
    //                     $data2return = ["status"=>1,"message"=>$unique_filename];
    //                 }else{
    //                     $data2return = ["status"=>0,"message"=>"Failed"];
    //                 }

    //             }else{
    //                     $data2return = ["status"=>0,"message"=>"Error uploading image"];
    //             }

    //         }

    // }
    
    // print json_encode($data2return);



    error_reporting(E_ALL);

    $data2return = array();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_SESSION['admin_online'])) {

        if (isset($_FILES['picture'])) {
            $file_name = $_FILES['picture']['name'];
            $tmp = $_FILES['picture']['tmp_name'];
            $type = $_FILES['picture']['type'];
            $size = $_FILES['picture']['size'];
            $error = $_FILES['picture']['error'];

            $allowed_image_types = ['image/jpeg', 'image/jpg', 'image/png'];

            if (!in_array($type, $allowed_image_types)) {
                $data2return = array("status" => 0, "message" => "File type not allowed. Only JPEG, PNG, and JPG are allowed.");
            } else if (!$error) {
                $max_file_size = 5 * 1024 * 1024; // 5 MB

                if ($size <= $max_file_size) {
                    $unique_filename = "getatherapist_admin_" . time() . '_' . uniqid() . '_' . $file_name;
                    $destination = "../upload/" . $unique_filename;

                    $upload_success = move_uploaded_file($tmp, $destination);

                    if ($upload_success) {
                        $data2return = ["status" => 1, "message" => $unique_filename];
                    } else {
                        $data2return = ["status" => 0, "message" => "Failed to move uploaded file"];
                    }
                } else {
                    $data2return = ["status" => 0, "message" => "File size exceeds the limit"];
                }
            } else {
                $data2return = ["status" => 0, "message" => "Error uploading file: " . $error];
            }
        } else {
            $data2return = ["status" => 0, "message" => "No file uploaded"];
        }
    }

    print json_encode($data2return);




?>