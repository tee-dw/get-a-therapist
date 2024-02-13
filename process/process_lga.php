<?php

    error_reporting(E_ALL);
    session_start();
    require_once("../classes/Patient.php");

    $stateid = $_GET['stateid'];

    $lgas = $patient->getlga_bystate($stateid);

        print "<select name='lga' class='form-select'>";

        foreach($lgas as $lga){
            $str = $str . "<option value='" . $lga['lga_id'] . "'>" . $lga['lga_name'] . "</option>"; 
        }
        
        $str = $str . "</select>";

    print $str;

?>