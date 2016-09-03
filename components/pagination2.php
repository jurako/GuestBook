<?php
    //establish $paginationControls
    $paginationCtrls = "";
    
    //check if there are any active sort filters. If there are, we need to add onclick events to our links, to trigger button click event
    $res = checkActiveSort();
    if ($res == "") {
        $activeSort = "";
    } else {
        $activeSort = "&activeSort=" .$res;
    }
    
    //if there is more than 1 page worth of result
    if ($lastPage != 1) {
        //First we check if we are on page 1. If we are, we don"t need previous link
        //If we are, we generate previous link
        if ($pageNumber > 1) {
            $previous = $pageNumber - 1;
            $paginationCtrls .= "<a href='" .$_SERVER["PHP_SELF"] ."?pageNumber=" .$previous .$activeSort ."'>Previous</a> &nbsp; &nbsp; ";
            //Render clickable number links which appear to the left of the target page number
            for ($i = $pageNumber - 4; $i < $pageNumber; $i++) {
                if ($i > 0) {
                    $paginationCtrls .= "<a href='" .$_SERVER["PHP_SELF"] ."?pageNumber=" .$i .$activeSort ."'>" .$i ."</a> &nbsp; ";  
                }                     
            }
        }        
        //Render target page number withou it beeing a link
        $paginationCtrls .= "" .$pageNumber ." &nbsp; ";

        //Render clickable number links which appear to the right of the target page number
        for ($i = $pageNumber + 1; $i <= $lastPage; $i++) {
            $paginationCtrls .= "<a href='" .$_SERVER["PHP_SELF"] ."?pageNumber=" .$i .$activeSort ."'>" .$i ."</a> &nbsp; "; 
            if ($i >= $pageNumber + 4) {
                break;
            }                     
        }
        
        //Render link to next page only if we are NOT on the last page
        if ($pageNumber != $lastPage) {
            $next = $pageNumber + 1;
            $paginationCtrls .= " &nbsp; &nbsp; <a href='" .$_SERVER["PHP_SELF"] ."?pageNumber=" .$next .$activeSort ."'>Next</a> ";
        }
    }         
?>