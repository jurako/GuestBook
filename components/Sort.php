<?php

  class Sort {
    public function __construct() {
      //stores the sorting (ASC or DESC) orders for fields
      if(!isset($_SESSION["activeSort"])) {
        $_SESSION["activeSort"] = array ();
      }
    }
    
    public function removeActiveSort() {
      unset($_SESSION["activeSort"]);
    }
    
    public function sortActive() {
      if ($this->sortButtonPressed() || $this->sortAlreadySet()) {
        //getSortCokumnname();
        //setSortOrder();
        return true;
      } 
      else
        return false;
    }
    
    private function sortAlreadySet() {
      empty($_SESSION["activeSort"]) ? false : true;
    }
    
    private function sortButtonPressed() {
      isset($_POST["activeSort"]) ? true : false;
    }
    
    private function getSortColumnName() {
      if (isset($_POST["sortName"])) {
          
        //SANITAZI $_POST["sortName"] HERE!!!
          
        $columnName = $_POST["sortName"];     
      }
        return $columnName;
    }
    
    private function setSortOrder($field) {
      if (empty($_SESSION["activeSort"]))
        $_SESSION["activeSort"][$field] = "DESC";
      else if ($_SESSION["activeSort"][$field] = "ASC")
        $_SESSION["activeSort"][$field] = "DESC";
      else if ($_SESSION["activeSort"][$field] = "DESC")
        $_SESSION["activeSort"][$field] = "ASC";
    }
    
    private function generateSortLinks() {
      //SANITAZI $_SERVER["REQUEST_URI"] HERE!!!!
      $uri = $_SERVER["REQUEST_URI"];
      
      if (isset($_POST["activeSort"]))
        //SANITAZI $_POST["activeSort"] HERE!!!!
        $uri .= "&activeSort=" . $_POST["activeSort"];    
          
      
//      $resultUri = "";
//    
//      if(strpos($uri, "&") !== false) {
//        $resultUri = substr($uri, 0, strpos($uri, "&"));
//      }
    
      return $uri;
    }
  }
  
?>
