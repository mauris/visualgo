<?php

	require_once 'QuestionGeneratorInterface.php';

	class GraphdsQuestionGenerator implements QuestionGeneratorInterface{
		protected $checkAnswerFunctionList = array(
			QUESTION_TYPE_ADJMAT_SIZE => "checkAnswerAdjMatSize",
			);

		protected $getAnswerFunctionList = array(
			QUESTION_TYPE_ADJMAT_SIZE => "getAnswerAdjMatSize",
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
	
			$potentialQuestions[] = "generateQuestionAdjMatSize";

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

		protected function generateGraph($weighted, $directed, $connected){
			$size = rand(2,9);
			$graphTemplate = GraphTemplate::getGraph(array("numVertex" => $size, "weighted" => $weighted, "directed" => $directed, "connected" => $connected));
			return $graphTemplate;
		}

		protected function toGraphState($graphTemplate, $weighted, $directed) {
			return GraphTemplate::createState($graphTemplate, array("displayWeight" => $weighted, "directed" => $directed));
		}
		
		//each question type generator and checker
		protected function generateQuestionAdjMatSize() {
			$w = rand(0,1);
			$d = false;
			$c = rand(0,1);
			$graphTemplate = $this->generateGraph($w, $d, $c); //returns a graph template
			$qObj = new QuestionObject();
			$qObj->qTopic = QUESTION_TOPIC_GRAPH_DS;
			$qObj->qType = QUESTION_TYPE_ADJMAT_SIZE;
			$qObj->qParams = array();
			$qObj->aType = ANSWER_TYPE_FILL_BLANKS;
			$qObj->aAmt = ANSWER_AMT_ONE;
			$qObj->ordered = false;
			$qObj->allowNoAnswer = false;
			$qObj->graphState = $this->toGraphState($graphTemplate, $w, $d);
			$qObj->internalDS = $graphTemplate;
		
			return $qObj;
		}

		protected function getAnswerAdjMatSize($qObj){
			$graphTemplate = $qObj->internalDS;
			$nVertices = count(array_keys($graphTemplate["internalAdjList"]));
			$ans = $nVertices*$nVertices;
			return $ans;
		}
		
		protected function checkAnswerAdjMatSize($qObj, $userAns) {
			$ans = $this->getAnswer($qObj);

			return ($userAns[0] == $ans);
		}
		
	}
?>