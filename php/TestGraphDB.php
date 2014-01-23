<?php
  require 'Everything.php';

  // while (@ob_end_flush()); // Debug mode

  $graphDb = new GraphDatabase(); // Testing database storage
  echo $graphDb->getSpecificTemplate(GRAPH_TEMPLATE_K5);
  echo "|";
  echo $graphDb->getRandomTemplate(array("numVertex" => 3, "directed"=>false, "connected"=>true));
?>