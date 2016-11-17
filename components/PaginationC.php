<?php

class Pagination {
  private $db;
  
  //display messages per page
  const MESSAGES_PER_PAGE = 5;
  
  //row count in messages table
  private $rowCount;
  
  //current page you are on (1 by default)
  private $pageNumber = 1;
  
  //last page of pagination
  private $lastPage;
  
  //limit query string
  private $limit;
  
  //displays total amount of pages
  private $textline1;
  
  //displays what page user is on
  private $textline2;
  
  //displays pagination controlls
  private $paginationCtrls = "";
  
  public function __construct($db) {
    $this->db = $db;
  }
  
  public function init() {
    //getRowCount();
    //setLastPage();
    //setPageNumber();
    //
  }
  
  private function setRowCount() {
    //get number of messages in table
    $result = $this->db->query("SELECT COUNT(user_id) FROM messages");
    $this->rowCount = $result->fetch();
    $this->rowCount = $this->rowCount[0];
  }
  
  private function setLastPage() {
    //find out how many pages will there be
    $this->lastPage = ceil($this->rowCount/$this->MESSAGES_PER_PAGE);
    
    //make sure last is not lesser than 1
    if ($this->lastPage < 1)
        $this->lastPage = 1;
  }
  
  private function setPageNumber() {
    //get page number from URL (GET), or set it to 1
    if (isset($_GET["pageNumber"])) 
      $this->pageNumber = preg_replace("#[^0-9]#", "", $_GET["pageNumber"]); //SANITAZE $_GET VEFORE ASSIGN!!!
    
    //make sure $pageNumber is not below 1 or not bigger than $lastPage
    if ($this->pageNumber < 1)
        $this->pageNumber = 1;
    else if ($this->pageNumber > $lastPage)
        $this->pageNumber = $lastPage;
  }
  
  private function setLimitQuery() {
    //set $messagesPerPage to query for choosen $pageNumber
    $this->limit = "LIMIT " .($this->pageNumber - 1) * $this->MESSAGES_PER_PAGE ."," .$this->MESSAGES_PER_PAGE;
  }
  
  private function setTextline1() {
    $this->textline1 = "Total: " .$this->rowCount ." messages.";
  }
  
  public function getTextline1() {
    return $this->textline1;
  }
  
  private function setTextline2() {
    $this->textline2 = "Page <b>" .$this->pageNumber ."</b> of <b>" .$this->lastPage ."</b>";
  }
  
  public function getTextline2() {
    return $this->textline2;
  }

  private function setPaginationCtrls() {
    //if there is more than 1 page worth of result
    if ($this->lastPage != 1) {
      //First we check if we are on page 1. If we are, we don"t need previous link
      //If we are, we generate previous link
      if ($this->pageNumber > 1) {
        $this->previous = $this->pageNumber - 1;
        $this->paginationCtrls .= "<a href='" .$_SERVER["PHP_SELF"] ."?pageNumber=" .$this->previous .$activeSort ."'>Previous</a> &nbsp; &nbsp; ";
        //Render clickable number links which appear to the left of the target page number
        for ($i = $this->pageNumber - 4; $i < $this->pageNumber; $i++) {
          if ($i > 0) {
            $this->paginationCtrls .= "<a href='" .$_SERVER["PHP_SELF"] ."?pageNumber=" .$i .$activeSort ."'>" .$i ."</a> &nbsp; ";  
          }                     
        }
      }        
      //Render target page number withou it beeing a link
      $this->paginationCtrls .= "" .$this->pageNumber ." &nbsp; ";

      //Render clickable number links which appear to the right of the target page number
      for ($i = $this->pageNumber + 1; $i <= $this->lastPage; $i++) {
        $this->paginationCtrls .= "<a href='" .$_SERVER["PHP_SELF"] ."?pageNumber=" .$i .$activeSort ."'>" .$i ."</a> &nbsp; "; 
          if ($i >= $this->pageNumber + 4) {
            break;
          }                     
      }
        
      //Render link to next page only if we are NOT on the last page
      if ($this->pageNumber != $this->lastPage) {
        $next = $this->pageNumber + 1;
        $this->paginationCtrls .= " &nbsp; &nbsp; <a href='" .$_SERVER["PHP_SELF"] ."?pageNumber=" .$next .$activeSort ."'>Next</a> ";
      }
    }
  } 
  
  public function getPaginationCtrls() {
    return $this->paginationCtrls;
  }
    
}

?>
