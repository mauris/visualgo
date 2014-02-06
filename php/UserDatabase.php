<?php
  /*
   * Table name: user
   * Schema:
   * - name
   * - username (primary key)
   * - password
   * - trainingModeTableNamen (currently not used)
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

      $this->init();
    }

    protected function init(){
      mysqli_query($this->db, "INSERT IGNORE INTO `user` (`name`, `username`, `password`)
        VALUES ('"."Ivan"."','"."ivan"."','"."test1"."')");
      mysqli_query($this->db, "INSERT IGNORE INTO `user` (`name`, `username`, `password`)
        VALUES ('"."Rose"."','"."rose"."','"."test2"."')");
      mysqli_query($this->db, "INSERT IGNORE INTO `user` (`name`, `username`, `password`)
        VALUES ('"."Steven"."','"."steven"."','"."test3"."')");
    }

    // TODO: secure this against SQL injection
    public function register($username, $password, $name){
      mysqli_query($this->db, "INSERT IGNORE INTO `user` (`name`, `username`, `password`)
        VALUES ('".$name."','".$username."','".$password."')");
    }
  }
?>