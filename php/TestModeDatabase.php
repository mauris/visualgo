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
      // Check whether test is open
    }

    public function login($username, $password){
      // update attempt counter
    }

    
?>