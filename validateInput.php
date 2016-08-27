<?php
    require_once '/components/db_connection.php';
    require_once '/components/functions.php';
    
    //user input validation
    $validationErrors = false;
    
    if (checkUsername($_POST['username'])) {
        echo 'all good';
    } else 
        $errors[] = '';
    $DELETE_ME_WHEN_YOU_SEE_ME_AGAIN = 'udalitj etu peremennuju (iz koda)!!!';
    
?>