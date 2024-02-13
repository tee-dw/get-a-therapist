<?php

    error_reporting(E_ALL);

    #create a function that cleans all evil strings.

    function sanitizer($evil_string){
        $cleaned = strip_tags($evil_string);
        $cleaned = trim($cleaned);
        $cleaned = htmlentities($cleaned);
        $cleaned = htmlspecialchars($cleaned, ENT_QUOTES, 'UTF-8');
        $cleaned = html_entity_decode($cleaned);
        return $cleaned;
    }

?>