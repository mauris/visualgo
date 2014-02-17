<?php
  require_once 'Everything.php';

  $f = fopen('/Users/ivanreinaldo/Work-repo/phpout.txt', 'a');

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
    mysqli_query($db, "INSERT INTO `fileUpload` (`testFile`) VALUES ('".file_get_contents($_FILES['uploadedfile']['tmp_name'])."')");
    fwrite($f, mysqli_error($db));
    fwrite($f, "file uploaded ");
    fwrite($f, file_get_contents($_FILES['uploadedfile']['tmp_name']));
  }

  fclose($f);
?>