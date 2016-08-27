<?php
    require_once '/components/db_connection.php';
    require_once '/components/functions.php';
    
    //user input validation
    $validationErrors = false;
    
    if (checkUsername($_POST['username'])) {
        echo 'all good';
    } else 
        $errors[] = '' 
    
    
    // get browser info
    $ua=getBrowser();
    $user_browser= $ua['name'] . " " . $ua['version'];   

    $pdoStatement = $db->prepare("INSERT INTO messages (username, email, text, homepage, user_ip, user_agent) "
                                . "VALUES (:username, :email, :text, :homepage, :user_ip, :user_agent)");
    $pdoStatement->execute(array(':username' => $_POST['username'], ':email' => $_POST['email'],
                                 ':text' => $_POST['text'], ':homepage' => $_POST['homepage'],
                                 ':user_ip' => $_SERVER['REMOTE_ADDR'], ':user_agent' => $user_browser));
?>