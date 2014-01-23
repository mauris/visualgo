<?php
  require 'Everything.php';

  // while (@ob_end_flush()); // Debug mode

  $graphDb = new GraphDatabase(); // Testing database storage
  $graphDb->getSpecificTemplate(GRAPH_TEMPLATE_K5);
  $graphDb->getRandomTemplate(array("numVertex" => 3, "directed"=>false));
?>