<?php
    //get number of messages in table
    $result = $db->query("SELECT COUNT(user_id) FROM messages");
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

?>