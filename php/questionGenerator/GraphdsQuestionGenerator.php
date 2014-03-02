<?php

	require_once 'QuestionGeneratorInterface.php';

	class GraphdsQuestionGenerator implements QuestionGeneratorInterface{
		protected $checkAnswerFunctionList = array(
			QUESTION_TYPE_DUMMY => "checkAnswerDummy",
			);

		protected $getAnswerFunctionList = array(
			QUESTION_TYPE_DUMMY => "getAnswerDummy",
			);

		//constructor
		public function __construct(){
		}
		
		//interface functions
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
	
			$potentialQuestions[] = "generateQuestionDummy";

			return $potentialQuestions;
		}
		
		public function getAnswer($qObj){
      if(array_key_exists($qObj->qType, $this->getAnswerFunctionList)){
        $answerFunc = $this->getAnswerFunctionList[$qObj->qType];
        return $this->$answerFunc($qObj);
      }
      else return false;
    }

    public function checkAnswer($qObj, $userAns){
      if(array_key_exists($qObj->qType, $this->checkAnswerFunctionList)){
        $verifierFunc = $this->checkAnswerFunctionList[$qObj->qType];
        return $this->$verifierFunc($qObj, $userAns);
      }
      else return false;
    }
		
		//each question type generator and checker
		protected function generateQuestionDummy() {
			$qObj = new QuestionObject();
			$qObj->qTopic = QUESTION_TOPIC_GRAPH_DS;
			$qObj->qType = QUESTION_TYPE_DUMMY;
			$qObj->qParams = array();
			$qObj->aType = ANSWER_TYPE_MCQ;
			$qObj->aAmt = ANSWER_AMT_ONE;
			$qObj->ordered = false;
			$qObj->allowNoAnswer = false;
			$qObj->graphState = array("vl" => array(), "el" => array()); //empty graph
		
			return $qObj;
		}

		protected function getAnswerDummy($qObj){
			$ans = 0;
			return $ans;
		}
		
		protected function checkAnswerDummy($qObj, $userAns) {
			$ans = $this->getAnswer($qObj);

			return ($userAns[0] == $ans);
		}
		
	}
?>