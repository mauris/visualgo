<?php
  /*
   * Table name: test
   * Schema:
   * - index: 0 (primary key) (just an identifier)
   * - seed
   * - arrayOfTopics (serialized array)
   * - questionAmount
   * - timeLimit (in seconds, int)
   * - testIsOpen (boolean)
   * - answerIsOpen (boolean)
   */

  class AdminDatabase{
    protected $db;

    public function __construct() {
      $this->db = mysqli_connect("localhost","ivan","fyp","visualgo");

      if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

      $this->init();
    }

    protected function init(){
      mysqli_query($this->db, "INSERT IGNORE INTO `test` (`index`, `seed`, `arrayOfTopics`, `questionAmount`, `timeLimit`) 
        VALUES ('".0."','".0."','".serialize(array("BST"))."','".10."','".60."','".0."','".0."')");
    }

    public function validate($password){
      return $password == ADMIN_PASSWORD;
    }

    /*
     * parameters (all optional):
     * - seed
     * - arrayOfTopics
     * - questionAmount
     * - timeLimit (in seconds, int)
     * - testIsOpen (boolean)
     * - answerIsOpen (boolean)
     */

    public function changeSettings($params, $password){
      if(!$this->validate($password)) return false;

      if(array_key_exists("seed", $params)) mysqli_query($this->db, "UPDATE `test` SET `seed` = ".$params["seed"].
        " WHERE `index` = ".0."')");

      if(array_key_exists("arrayOfTopics", $params)) mysqli_query($this->db, "UPDATE `test` SET `arrayOfTopics` = ".
        serialize($params["arrayOfTopics"])." WHERE `index` = ".0."')");

      if(array_key_exists("questionAmount", $params)) mysqli_query($this->db, "UPDATE `test` SET `questionAmount` = ".
        $params["questionAmount"]." WHERE `index` = ".0."')");

      if(array_key_exists("timeLimit", $params)) mysqli_query($this->db, "UPDATE `test` SET `timeLimit` = ".
        $params["timeLimit"]." WHERE `index` = ".0."')");

      if(array_key_exists("testIsOpen", $params)) mysqli_query($this->db, "UPDATE `test` SET `testIsOpen` = ".
        ($params["testIsOpen"]? 1:0)." WHERE `index` = ".0."')");

      if(array_key_exists("answerIsOpen", $params)) mysqli_query($this->db, "UPDATE `test` SET `answerIsOpen` = ".
        ($params["answerIsOpen"]? 1:0)." WHERE `index` = ".0."')");

      return true;
    }

    public function getSettings($password){
      
    }
  }
?>