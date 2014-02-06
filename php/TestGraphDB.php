<?php
  require 'Everything.php';

  // while (@ob_end_flush()); // Debug mode

  // $graphDb = new GraphDatabase(); // Testing database storage
  // echo $graphDb->getSpecificTemplate(GRAPH_TEMPLATE_K5);
  // echo "|";
  // echo $graphDb->getRandomTemplate(array("numVertex" => 3, "directed"=>false, "connected"=>true));

  $userDb = new UserDatabase();
  $adminDb = new AdminDatabase();
  $testModeDb = new TestModeDatabase();
  echo $adminDb->validate("test")? 1:0;
  echo "|";
  echo json_encode($adminDb->getConfig("test"));
?>