<?php
  /*
   * Table name: test
   * Schema:
   * - username: primary key, foreign key to user table
   * - answer (serialized array)
   * - grade
   * - timeTaken
   * - startTime (datetime data structure)
   * - attemptCount: boolean
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

    public function getTestParams(){
      $result = mysqli_query($this->db, "SELECT * FROM `test_config` WHERE `index`='"."0"."'");
      $config = mysqli_fetch_assoc($result);

      return $config;
    }

    /*
     * params (all fields compulsory):
     * - answer: student's answer
     * - grade: student's grade
     * - timeTaken: time taken by student to complete the test
     * - startTime: starting time of the test
     */

    public function submit($username, $password, $params){
      // validate username and password

      // validate attempt count is > 0 and less than max allowed
      

      // validate submission params
      if(!array_key_exists("answer", $params) || !array_key_exists("grade", $params) || !array_key_exists("timeTaken", $params) ||
        !array_key_exists("startTime", $params)){
        return false;
      }       

      mysqli_query($this->db, "UPDATE `test` SET `answer` = '".serialize($params["answer"])."' WHERE `username` = ".$username);
      mysqli_query($this->db, "UPDATE `test` SET `grade` = '".$params["grade"]."' WHERE `username` = ".$username);
      mysqli_query($this->db, "UPDATE `test` SET `grade` = '".$params["timeTaken"]."' WHERE `username` = ".$username);
      mysqli_query($this->db, "UPDATE `test` SET `grade` = '".$params["startTime"]."' WHERE `username` = ".$username);
    }
    
?>