<?php
    //get number of messages in table
    $result = $GLOBALS["db"]->query("SELECT COUNT(user_id) FROM messages");
    $rowCount = $result->fetch();
    $rowCount = $rowCount[0];
    
    //display messages per page
    $messagesPerPage = 5;
    
    //find out how many pages will there be
    $lastPage = ceil($rowCount/$messagesPerPage);
    
    //make sure last is not lesser than 1
    if ($lastPage < 1)
        $lastPage = 1;
    
    //current page you are on (1 by default)
    $pageNumber = 1;
    
    //get page number from URL (GET), or set it to 1
    if (isset($_GET['pageNumber'])) 
        $pageNumber = preg_replace("#[^0-9]#", "", $_GET["pageNumber"]); //SANITAZE $_GET VEFORE ASSIGN!!!
    
    //make sure $pageNumber is not below 1 or not bigger than $lastPage
    if ($pageNumber < 1)
        $pageNumber = 1;
    else if ($pageNumber > $lastPage)
        $pageNumber = $lastPage;
    
    //set $messagesPerPage to query for choosen $pageNumber
    $limit = "LIMIT " .($pageNumber - 1) * $messagesPerPage ."," .$messagesPerPage;
    
    //Shows what page user is on and total amount of pages
    $textline1 = "Total: " .$rowCount ." messages.";
    $textline2 = "Page <b>" .$pageNumber ."</b> of <b>" .$lastPage ."</b>";
    
    //establish $paginationControls
    $paginationCtrls = "";
    
    //if there is more than 1 page worth of result
    if ($lastPage != 1) {
        //First we check if we are on page 1. If we are, we don't need previous link
        //If we are, we generate previous link
        if ($pageNumber > 1) {
            $previous = $pageNumber - 1;
            $paginationCtrls .= "<a href='" .$_SERVER["PHP_SELF"] ."?pageNumber=" .$previous ."'>Previous</a> &nbsp; &nbsp; ";
            //Render clickable number links which appear to the left of the target page number
            for ($i = $pageNumber - 4; $i < $pageNumber; $i++) {
                if ($i > 0) {
                    $paginationCtrls .= "<a href='" .$_SERVER["PHP_SELF"] ."?pageNumber=" .$i ."'>" .$i ."</a> &nbsp; ";  
                }                     
            }
        }        
        //Render target page number withou it beeing a link
        $paginationCtrls .= "" .$pageNumber ." &nbsp; ";

        //Render clickable number links which appear to the right of the target page number
        for ($i = $pageNumber + 1; $i <= $lastPage; $i++) {
            $paginationCtrls .= "<a href='" .$_SERVER["PHP_SELF"] ."?pageNumber=" .$i ."'>" .$i ."</a> &nbsp; "; 
            if ($i >= $pageNumber + 4) {
                break;
            }                     
        }
        
        //Render link to next page only if we are NOT on the last page
        if ($pageNumber != $lastPage) {
            $next = $pageNumber + 1;
            $paginationCtrls .= " &nbsp; &nbsp; <a href='" .$_SERVER["PHP_SELF"] ."?pageNumber=" .$next ."'>Previous</a> ";
        }
    }         
    
?>