<?php
class SsspQuestionGenerator{
  protected $answerFunctionList = array(
      QUESTION_TYPE_GREATER_LESS => "checkAnswerGreaterLess",
    );

    public function __construct(){
    }

    public function generateQuestion($amt){
      $questions = array();
      $potentialQuestions = $this->generatePotentialQuestions();

      for($i = 0; $i < $amt; $i++){
        if(count($potentialQuestions) == 0) $potentialQuestions = $this->generatePotentialQuestions();

        $questionIndex = rand(0, count($potentialQuestions) - 1);
        $questionFunc = $potentialQuestions[$questionIndex];

        $questions[] = $this->$potentialQuestions[$questionIndex]();

        unset($potentialQuestions[$questionIndex]);
        $potentialQuestions = array_values($potentialQuestions);
      }

      return $questions;
    }

    protected function generatePotentialQuestions(){
      $potentialQuestions = array();

      $potentialQuestions[] = "generateQuestionGreaterLess";

      return $potentialQuestions;
    }

    public function checkAnswer($qObj, $userAns){
      if(array_key_exists($qObj->qType, $this->answerFunctionList)){
        $verifierFunc = $this->answerFunctionList[$qObj->qType];
        return $this->$verifierFunc($qObj, $userAns);
      }
      else return false;
    }

    protected function generateSSSP(){
      $sssp = new SSSP();
      return $sssp;
    }

    protected function generateQuestionGreaterLess(){
      $sssp = $this->generateSSSP();
	  $greaterLess = array("greater", "less");
	  $greaterLessIndex = rand(0,1);
	  $ssspContent = $sssp->getAllElements();
      $startValue = $ssspContent[rand(0, count($ssspContent)-1)];
	  //echo("source: ".$startValue." ");
	  //echo(implode($sssp->sssp($startValue))."<br/>");
	  $longestSP = 0;
	  $ssspAns = $sssp->sssp($startValue);
	  for($i=0; $i<count($ssspAns); $i++) {
	    if($ssspAns[$i] != INFINITY && $ssspAns[$i]>$longestSP) {
		  $longestSP = $ssspAns[$i];
		}
	  }
	  $bound = floor($longestSP/2);
	  
      $qObj = new QuestionObject();
      $qObj->qTopic = QUESTION_TOPIC_SSSP;
      $qObj->qType = QUESTION_TYPE_GREATER_LESS;
      $qObj->qParams = array("greaterless" => $greaterLess[$greaterLessIndex], "value" => $bound, "source" => $startValue);
      $qObj->aType = ANSWER_TYPE_VERTEX;
      $qObj->aAmt = ANSWER_AMT_MULTIPLE;
      $qObj->ordered = false;
      $qObj->allowNoAnswer = true;
      $qObj->graphState = $sssp->toGraphState();
      $qObj->internalDS = $sssp;

      return $qObj;
    }

    protected function checkAnswerGreaterLess($qObj, $userAns){
      $sssp = $qObj->internalDS;
	  $greaterLess = $qObj->qParams["greaterless"];
	  $bound = $qObj->qParams["value"];
	  $startValue = $qObj->qParams["source"];
	  
      $ssspAns = $sssp->sssp($startValue);
	  $ans = array();
	  for($i=0; $i<count($ssspAns); $i++) {
		if($greaterLess == "greater" && $ssspAns[$i] > $bound) {
		  $ans[] = $i;
		} else if ($greaterLess == "less" && $ssspAns[$i] < $bound) {
		  $ans[] = $i;
		}
	  }

      sort($userAns);
      sort($ans);
	  
	  //echo(implode($ans)."<br/>");
	  
      $correctness = true;
      if(count($ans) != count($userAns)) $correctness = false;
      else{
        for($i = 0; $i < count($ans); $i++){
          if($ans[$i] != $userAns[$i]){
            $correctness = false;
            break;
          }
        }
      }

      return $correctness;
    }
}

?>