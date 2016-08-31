<?php

//stores the sorting orders for fields
if(!isset($_SESSION["sortOrders"])) {
    $_SESSION["sortOrders"] = array (
        "date" => "ASC"
    );
}
//sorting function for date
function sortFunction( $a, $b ) { 
    return strtotime($a["date"]) - strtotime($b["date"]);
}

function sortMessages($field) {
    $messages = array();
 
    if ($_SESSION["sortOrders"][$field] == "ASC")
        $_SESSION["sortOrders"][$field] = "DESC";
    else if ($_SESSION["sortOrders"][$field] == "DESC")
        $_SESSION["sortOrders"][$field] = "ASC";
    
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
    if ($field == "date") {
        usort($messages, "sortFunction");
        //if sort is in DESC order just reverse array
        if ($_SESSION["sortOrders"]["date"] == "DESC") {
            $messages = array_reverse($messages);
        }
    }
    return $messages;
}

?>