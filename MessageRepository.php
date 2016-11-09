<?php

class MessageRepository {
    
    private $db;
    
    public function __construct($db) {
        $this->db = $db;      
    }
    
    public function getMessages($limit) {
        $stmt = $this->db->query("SELECT * FROM messages ORDER BY user_id DESC " .$limit);
    
        return $this->messages; 
    }
    
    public function saveMessage()
    {
    // get browser info
    $ua=getBrowser();
    $user_browser= $ua['name'] . " " . $ua['version'];   

    $pdoStatement = $this->db->prepare("INSERT INTO messages (username, email, text, homepage, user_ip, user_agent) "
                                 . "VALUES (:username, :email, :text, :homepage, :user_ip, :user_agent)");
    $pdoStatement->execute(array(':username' => $_POST['username'], ':email' => $_POST['email'],
                                  ':text' => $_POST['text'], ':homepage' => $_POST['homepage'],
                                  ':user_ip' => $_SERVER['REMOTE_ADDR'], ':user_agent' => $user_browser));

    }
    
    
}


?>