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

//check wether an active sort filter exists. If it is - return filtered column name
function checkActiveSort() {
    $columnName = "";
    
    if (isset($_SESSION["sortOrders"])) {
       foreach ($_SESSION["sortOrders"] as $key => $value) {
           if (!empty($value)) {
               $columnName = "sort" . ucfirst($key);
               break;
           }
       }       
    }

    
    return $columnName;
}

function sortMessages($field, $limit) {
    $messages = array();   
    
    changeSortOrders($field);
    
    $resulSet = $GLOBALS["db"]->query("SELECT * FROM messages ORDER BY ".$field." ".$_SESSION["sortOrders"][$field]." ".$limit);
        
    $i = 0;
    while ($row = $resulSet->fetch()) {
        $messages[$i]["username"] = $row["username"];
        $messages[$i]["email"] = $row["email"];
        $messages[$i]["date"] = $row["date"];
        $messages[$i]["text"] = $row["text"];
        $i++;
    }
    
    return $messages;
}

?>