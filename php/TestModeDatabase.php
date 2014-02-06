<?php
  /*
   * Table name: test
   * Schema:
   */

  class TestDatabase{
    protected $db;

    public function __construct() {
      $this->db = mysqli_connect("localhost",DB_USERNAME,DB_PASSWORD,DB_NAME);

      if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

      $this->init();
    }

    protected function init(){
      
    }

    public function login($username, $password){
      // update attempt counter
      // if test is not open don't update attempt counter
    }

    public function checkTestIsOpen(){

    }

    public function checkAnswerIsOpen(){

    }

    public function getSeed(){
      $result = mysqli_query($this->db, "SELECT `seed` FROM `test_config` WHERE `index`='"."0"."'");
      $config = mysqli_fetch_assoc($result);

      return $config["seed"];
    }

    public function getTopics(){
      $result = mysqli_query($this->db, "SELECT `seed` FROM `test_config` WHERE `index`='"."0"."'");
      $config = mysqli_fetch_assoc($result);

      return $config["seed"];
    }

    public function getTimeLimit(){
      $result = mysqli_query($this->db, "SELECT `seed` FROM `test_config` WHERE `index`='"."0"."'");
      $config = mysqli_fetch_assoc($result);

      return $config["seed"];
    }
    
?>