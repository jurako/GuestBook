<?php

class Message {
    
    private $db;
    private $username;
    private $email;
    private $date;
    private $text;
    
    public function __construct($db) {
//        $this->username = $username;
//        $this->email = $email;
//        $this->date = $date;
//        $this->text = $text;      
        $this->db = $db;      
    }
    
    function getUsername() {
        return $this->username;
    }

    function getEmail() {
        return $this->email;
    }

    function getDate() {
        return $this->date;
    }

    function getText() {
        return $this->text;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setText($text) {
        $this->text = $text;
    }
    public function getMessages($limit) {
        $stmt = $this->db->query("SELECT * FROM messages ORDER BY user_id DESC " .$limit);
    
        $i = 0;
        while ($row = $stmt->fetch()) {
            $this->messages[$i]["username"] = $row["username"];
            $this->messages[$i]["email"] = $row["email"];
            $this->messages[$i]["date"] = $row["date"];
            $this->messages[$i]["text"] = $row["text"];
            $i++;
        }
        
        return $this->messages; 
    }
    private $messages = array();
    
}