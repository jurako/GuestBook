<?php

//stores the sorting (ASC or DESC) orders for fields
if(!isset($_SESSION["sortOrders"])) {
    $_SESSION["sortOrders"] = array (
        "date" => "",
        "username" => "",
        "email" => ""
    );
}

//changes the sorting orders of fields in $_SESSION['sortOrders']
function changeSortOrders($field) {
    if ($_SESSION["sortOrders"][$field] == "") {
        $_SESSION["sortOrders"] = array_fill_keys(array ("date", "username", "email"), "");
        $_SESSION["sortOrders"][$field] = "DESC";
    }
    else if ($_SESSION["sortOrders"][$field] == "ASC")
        $_SESSION["sortOrders"][$field] = "DESC";
    else if ($_SESSION["sortOrders"][$field] == "DESC")
        $_SESSION["sortOrders"][$field] = "ASC";
}

//performs date string conversion to timestap and sorts correctly
function sortDate($messages, $field) {
    if ($field == "date") {
        usort($messages, "sortFunction");
        //if sort is in DESC order just reverse array
        if ($_SESSION["sortOrders"]["date"] == "DESC") {
            $messages = array_reverse($messages);
        }
    }
    
    return $messages;
}

//sorting function for usort function (for date) 
function sortFunction( $a, $b ) { 
    return strtotime($a["date"]) - strtotime($b["date"]);
}

function sortMessages($field) {
    $messages = array();   
    
    changeSortOrders($field);
    
    $resulSet = $GLOBALS["db"]->query("SELECT * FROM messages ORDER BY ".$field." ".$_SESSION["sortOrders"][$field]);
        
    $i = 0;
    while ($row = $resulSet->fetch()) {
        $messages[$i]["username"] = $row["username"];
        $messages[$i]["email"] = $row["email"];
        $messages[$i]["date"] = $row["date"];
        $messages[$i]["text"] = $row["text"];
        $i++;
    }
    
    //if the sort by date needed use usort function for correct sort by date
    $messages = sortDate($messages, $field);
    
    return $messages;
}

?>