<?php
  require_once 'Everything.php';

  // while (@ob_end_flush()); // Debug mode

  $bstQuestionGen = new BstQuestionGenerator();
  $heapQuestionGen = new HeapQuestionGenerator();
  $bitmaskQuestionGen = new BitmaskQuestionGenerator();
  $ufdsQuestionGen = new UfdsQuestionGenerator();
  $mstQuestionGen = new MstQuestionGenerator();
  $ssspQuestionGen = new SsspQuestionGenerator();
  $graphTraversalQuestionGen = new GraphTraversalQuestionGenerator();

  $questionGenerator = array(
    QUESTION_TOPIC_BST => $bstQuestionGen,
    QUESTION_TOPIC_HEAP => $heapQuestionGen,
    QUESTION_TOPIC_BITMASK => $bitmaskQuestionGen,
    QUESTION_TOPIC_UFDS => $ufdsQuestionGen,
    QUESTION_TOPIC_MST => $mstQuestionGen,
    QUESTION_TOPIC_SSSP => $ssspQuestionGen,
    QUESTION_TOPIC_GRAPH_TRAVERSAL => $graphTraversalQuestionGen
  );

  function generateQuestions($qAmt, $qSeed, $qTopics){
    global $questionGenerator;

    srand((int)$qSeed);

    $qTopics = explode(",", $qTopics);

    $qArr = array();
    $qAmtTopic = array();

    for($i = 0; $i < count($qTopics); $i++){
      $qAmtTopic[] = 1;
      $qAmt--;
    }

    for($i = 0; $qAmt > 0; $i = ($i+1)%count($qAmtTopic)){
      $addition = rand(1, $qAmt);
      $qAmt -= $addition;
      $qAmtTopic[$i] += $addition;
    }

    for($i = 0; $i < count($qTopics); $i++){
      if(array_key_exists($qTopics[$i], $questionGenerator))
        $qArr = array_merge($qArr, $questionGenerator[$qTopics[$i]]->generateQuestion($qAmtTopic[$i]));
    }
    // End of question generator

    return $qArr;
  }

  function checkAnswers($qAmt, $qSeed, $qTopics, $aArr){
    global $questionGenerator;

    $qArr = generateQuestions($qAmt, $qSeed, $qTopics);

    for($i = 0; $i < count($qArr);$i++){
      if($aArr[$i][0] == UNANSWERED){
        $aCorrectness[$i] = false;
        continue;
      }
      else if($aArr[$i][0] == NO_ANSWER){
        $aArr[$i] = array();
      }

      $aCorrectness[$i] = $questionGenerator[$qArr[$i]->qTopic]->checkAnswer($qArr[$i],$aArr[$i]);
      if($aCorrectness[$i]){
        $score++;
      }
    }

    return $score;
  }

  function getAnswers($qAmt, $qSeed, $qTopics){
      global $questionGenerator;

      $qArr = generateQuestions($qAmt, $qSeed, $qTopics);

      for($i = 0; $i < count($qArr);$i++){
      if($aArr[$i][0] == UNANSWERED){
        $aCorrectness[$i] = false;
        $aList[] = $questionGenerator[$qArr[$i]->qTopic]->getAnswer($qArr[$i],$aArr[$i]);
        continue;
      } else if($aArr[$i][0] == NO_ANSWER){
        $aArr[$i] = array();
      }
      $aCorrectness[$i] = $questionGenerator[$qArr[$i]->qTopic]->checkAnswer($qArr[$i],$aArr[$i]);
      if($aCorrectness[$i]){
        $aList[] = CORRECT;
      } else {
        $aList[] = $questionGenerator[$qArr[$i]->qTopic]->getAnswer($qArr[$i],$aArr[$i]);
      }
    }
  }

  $qSeed = 0;
  $qArr = array();
  $aArr = array();
  $aCorrectness = array();
  $score = 0;

  $mode = $_GET["mode"];

  if($mode == MODE_GENERATE_SEED){
    echo(rand());
  }

  if($mode == MODE_GENERATE_QUESTIONS){
    $qAmt = $_GET["qAmt"];
    $qSeed = $_GET["seed"];
    $qTopics = $_GET["topics"];
    
    $qArr = generateQuestions($qAmt, $qSeed, $qTopics);
    // End of question generator

    $qArrJson = array();

    for($i = 0; $i < count($qArr);$i++){
      $qArrJson[] = $qArr[$i]->toJsonObject();
    }

    echo arrayOfJsonStringEncoder($qArrJson);
  }

  else if($mode == MODE_CHECK_ANSWERS){
    $aArrCsv = $_GET["ans"];
    $qSeed = $_GET["seed"];
    $qAmt = $_GET["qAmt"];
    $qTopics = $_GET["topics"];
    // echo implode("|",$aArrCsv);
    for($i = 0; $i < count($aArrCsv); $i++){
      $aArr[] = explode(",",$aArrCsv[$i]);
    }
    $score = 0;

    // Question generator

    $qTopics = explode(",", $qTopics);

    $qArr = array();
    $qAmtTopic = array();

    for($i = 0; $i < count($qTopics); $i++){
      $qAmtTopic[] = 1;
      $qAmt--;
    }

    for($i = 0; $qAmt > 0; $i = ($i+1)%count($qAmtTopic)){
      $addition = rand(1, $qAmt);
      $qAmt -= $addition;
      $qAmtTopic[$i] += $addition;
    }

    for($i = 0; $i < count($qTopics); $i++){
      if(array_key_exists($qTopics[$i], $questionGenerator))
        $qArr = array_merge($qArr, $questionGenerator[$qTopics[$i]]->generateQuestion($qAmtTopic[$i]));
    }
    // End of question generator

    for($i = 0; $i < count($qArr);$i++){
      if($aArr[$i][0] == UNANSWERED){
        $aCorrectness[$i] = false;
        continue;
      }
      else if($aArr[$i][0] == NO_ANSWER){
        $aArr[$i] = array();
      }
      // echo($i);
      $aCorrectness[$i] = $questionGenerator[$qArr[$i]->qTopic]->checkAnswer($qArr[$i],$aArr[$i]);
      if($aCorrectness[$i]){
        $score++;
        // echo 1;
      }
      // else echo 0;
      // else echo $i.",";
    }

    echo $score;
  }

  else if($mode == MODE_GET_ANSWERS){

  }

  else if($mode == MODE_GET_STUDENT_ANSWERS){
    echo "Currently unavailable";
  }

  else if($mode == MODE_LOGIN){
    // only verification
    $username = $_GET["username"];
    $password = $_GET["password"];
    $testModeDb = new TestModeDatabase();

    echo $testModeDb->validate($username, $password)? 1:0;
  }

  else if($mode == MODE_TEST_BEGIN){
    $username = $_GET["username"];
    $password = $_GET["password"];
    $testModeDb = new TestModeDatabase();

    if($testModeDb->validate($username, $password)){
      echo json_encode($testModeDb->getTestParams());
      $testModeDb->begin($username, $password);
    }

    else echo 0;
  }

  else if($mode == MODE_TEST_SUBMIT){
    $username = $_GET["username"];
    $password = $_GET["password"];
    $aArrCsv = $_GET["ans"];

    $testModeDb = new TestModeDatabase();
    $params = $testModeDb->getTestParams();


    $qSeed = $params["seed"];
    $qAmt = $params["questionAmount"];
    $qTopics = $params["topics"];

    for($i = 0; $i < count($aArrCsv); $i++){
      $aArr[] = explode(",",$aArrCsv[$i]);
    }
    $score = 0;

    // Question generator
    srand((int)$qSeed);

    // foreach($questionGenerator as $key => $value){
    //   $value->seedRng(rand());
    // }

    $qArr = array();
    $qAmtTopic = array();

    // $qArr += $questionGenerator[QUESTION_TOPIC_HEAP]->generateQuestion($qAmt);

    for($i = 0; $i < count($qTopics); $i++){
      $qAmtTopic[] = 1;
      $qAmt--;
    }

    for($i = 0; $qAmt > 0; $i = ($i+1)%count($qAmtTopic)){
      $addition = rand(1, $qAmt);
      $qAmt -= $addition;
      $qAmtTopic[$i] += $addition;
    }

    for($i = 0; $i < count($qTopics); $i++){
      if(array_key_exists($qTopics[$i], $questionGenerator))
        $qArr = array_merge($qArr, $questionGenerator[$qTopics[$i]]->generateQuestion($qAmtTopic[$i]));
    }
    // End of question generator

    for($i = 0; $i < count($qArr);$i++){
      if($aArr[$i][0] == UNANSWERED){
        $aCorrectness[$i] = false;
        continue;
      }
      else if($aArr[$i][0] == NO_ANSWER){
        $aArr[$i] = array();
      }
      // echo($i);
      $aCorrectness[$i] = $questionGenerator[$qArr[$i]->qTopic]->checkAnswer($qArr[$i],$aArr[$i]);
      if($aCorrectness[$i]){
        $score++;
        // echo 1;
      }
      // else echo 0;
      // else echo $i.",";
    }

    $submissionParams = array();
    $submissionParams["answer"] = $aArr;
    $submissionParams["grade"] = $score;
    $testModeDb->submit($username, $password, $submissionParams);

    echo $score;

  }

  else if($mode == MODE_TEST_GET_INFO){
    $username = $_GET["username"];
    $password = $_GET["password"];
    $testModeDb = new TestModeDatabase();
    $userDb = new UserDatabase();

    $info = array();
    $info["timeElapsed"] = $testModeDb->getTimeElapsed($username, $password);
    $info["name"] = $userDb->getName($username, $password);

    echo json_encode($info);
  }

  else if($mode == MODE_TEST_GET_ANSWERS){
    $username = $_GET["username"];
    $password = $_GET["password"];

    $testModeDb = new TestModeDatabase();
    $params = $testModeDb->getTestParams();
    $aList = array();

    if($params["answerIsOpen"] != 0){
      $qSeed = $params["seed"];
      $qAmt = $params["questionAmount"];
      $qTopics = $params["topics"];

      // Question generator
      srand((int)$qSeed);

      // foreach($questionGenerator as $key => $value){
      //   $value->seedRng(rand());
      // }

      $qArr = array();
      $qAmtTopic = array();
	  $retrievedA = $testModeDb->getUserAnswer($username, $password);
	  for($n=0; $n<count($retrievedA);$n++) {
		$aArr[$n] = $retrievedA[$n];
	  }

      // $qArr += $questionGenerator[QUESTION_TOPIC_HEAP]->generateQuestion($qAmt);

      for($i = 0; $i < count($qTopics); $i++){
        $qAmtTopic[] = 1;
        $qAmt--;
      }

      for($i = 0; $qAmt > 0; $i = ($i+1)%count($qAmtTopic)){
        $addition = rand(1, $qAmt);
        $qAmt -= $addition;
        $qAmtTopic[$i] += $addition;
      }

      for($i = 0; $i < count($qTopics); $i++){
        if(array_key_exists($qTopics[$i], $questionGenerator))
          $qArr = array_merge($qArr, $questionGenerator[$qTopics[$i]]->generateQuestion($qAmtTopic[$i]));
      }
      // End of question generator
	  
      for($i = 0; $i < count($qArr);$i++){
		if($aArr[$i][0] == UNANSWERED){
			$aCorrectness[$i] = false;
			$aList[] = $questionGenerator[$qArr[$i]->qTopic]->getAnswer($qArr[$i],$aArr[$i]);
			continue;
		} else if($aArr[$i][0] == NO_ANSWER){
			$aArr[$i] = array();
		}
		$aCorrectness[$i] = $questionGenerator[$qArr[$i]->qTopic]->checkAnswer($qArr[$i],$aArr[$i]);
		if($aCorrectness[$i]){
			$aList[] = CORRECT;
		} else {
	        $aList[] = $questionGenerator[$qArr[$i]->qTopic]->getAnswer($qArr[$i],$aArr[$i]);
		}
      }
    }

    echo json_encode($aList);
  }

  else if($mode == MODE_TEST_GET_STUDENT_ANSWERS){
    $username = $_GET["username"];
    $password = $_GET["password"];

    $testModeDb = new TestModeDatabase();

    echo json_encode($testModeDb->getUserAnswer($username, $password));
  }

  else if($mode == MODE_ADMIN){
    $password = $_GET["password"];

    $adminDb = new AdminDatabase();

    echo $adminDb->validate($password)? 1:0;
  }

  else if($mode == MODE_ADMIN_GET_CONFIG){
    $password = $_GET["password"];

    $adminDb = new AdminDatabase();

    $config = json_encode($adminDb->getConfig($password));

    echo $config;
  }

  else if($mode == MODE_ADMIN_EDIT_CONFIG){
    $password = $_GET["password"];
    $params = array();

    $adminDb = new AdminDatabase();

    if(isset($_GET["seed"])) $params["seed"] = $_GET["seed"];
    if(isset($_GET["topics"])) $params["topics"] = explode(",", $_GET["topics"]);
    if(isset($_GET["questionAmount"])) $params["questionAmount"] = $_GET["questionAmount"];
    if(isset($_GET["timeLimit"])) $params["timeLimit"] = $_GET["timeLimit"];
    if(isset($_GET["maxAttemptCount"])) $params["maxAttemptCount"] = $_GET["maxAttemptCount"];
    if(isset($_GET["testIsOpen"])) $params["testIsOpen"] = $_GET["testIsOpen"];
    if(isset($_GET["answerIsOpen"])) $params["answerIsOpen"] = $_GET["answerIsOpen"];

    $adminDb->editConfig($params, $password);
  }

  else if($mode == MODE_ADMIN_RESET_ATTEMPT){
    $password = $_GET["password"];
    $username = $_GET["username"];

    $adminDb = new AdminDatabase();

    echo $adminDb->resetAttempt($username, $password)? 1:0;
  }

  else{
    echo "Your request will be processed shortly...";
  }
?>