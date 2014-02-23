<?php
  require_once 'Everything.php';

  $userDb = new UserDatabase();

  $f = fopen('/Users/ivanreinaldo/Work-repo/phpout.txt', 'w');

  fwrite($f, "Test!");

  if ($_FILES["file"]["error"] > 0){
    fwrite($f, "Error: " . $_FILES["file"]["error"]);
  }
  else{
    fwrite($f, "Upload: " . $_FILES["file"]["name"]);
    fwrite($f, "Type: " . $_FILES["file"]["type"]);
    fwrite($f, "Size: " . ($_FILES["file"]["size"] / 1024));
    fwrite($f, "Stored in: " . $_FILES["file"]["tmp_name"]);
    $db = mysqli_connect("localhost",DB_USERNAME,DB_PASSWORD,DB_NAME);
    mysqli_query($db, "INSERT INTO `fileUpload` (`testFile`) VALUES ('".file_get_contents($_FILES['file']['tmp_name'])."')");
    fwrite($f, mysqli_error($db));
    fwrite($f, "file uploaded ");
    fwrite($f, file_get_contents($_FILES['file']['tmp_name']));

    $filename = $_FILES['file']['tmp_name'];
    $rows = explode(";", file_get_contents($filename));
    // Data: name, username, password
    $dataTitle = explode(",", $rows[0]);
    if($dataTitle[0] != "name" || $dataTitle[1] != "username" || $dataTitle[2] != "password"){
      echo "Error: file doesn't contain proper information. The correct format is 'name', 'username', 'password'";
      return;
    }
    $userDb->removeAllUsers(ADMIN_PASSWORD);
    for($i = 1; $i < count($rows)-1; $i++){ // Assume data contains title
      $data = explode(",", $rows[$i]);
      $userDb->register($data[0], $data[1], $data[2]);
    }

    echo "Success";

  }

  fclose($f);
?>