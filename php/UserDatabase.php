<?php
  /*
   * Table name: user
   * Schema:
   * - name
   * - username (primary key)
   * - password
   * - trainingModeTableName
   * - isLoggedIn
   */

  /*
   * Each user will have one training mode table
   * Schema:
   * - session (we need to decide how much session to store)
   * - seed (to generate the questions again)
   * - answer: serialized array of answers
   * - grade
   * - timeTaken
   */

  class UserDatabase{
    protected $db;

    public function __construct() {
      $this->db = mysqli_connect("localhost",DB_USERNAME,DB_PASSWORD,DB_NAME);

      if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

      $this->initBasicTemplates();
    }

    public function logIn(username, password){

    }

    public function isLoggedIn(username){

    }

    public function logOut(username){

    }

    public function setGrade(tableName){
      
    }

    public function storeAnswers(){

    }

    public function retrieveAnswers(){

    }
  }
?>