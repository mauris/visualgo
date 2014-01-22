<?php

class GraphTraversal {
	
	protected $adjList; //array of arrays of pairs (use Pair class from MST)
	protected $graphTemplate;
	protected $size;
	protected $directed;
	protected $connected;
	
	public function __construct(){
		$this->init();
    }
	
	protected function init() {
		$this->size = rand(6,10);
		$directedAngle = rand(1,360);
		$this->directed = ($directedAngle <= 90); //25% directed, 75% undirected
		$connectedAngle = rand(1,360);
		$this->connected = ($connectedAngle <= 180); //50% connected, 50% disconnected
		$this->graphTemplate = GraphTemplate::getGraph(array("numVertex" => $this->size, "directed" => $this->directed, "connected" => $this->connected));
		$this->generateAdjList($this->graphTemplate); //array of array of Pairs
	}
	
	public function clearAll() {
		$this->init();
	}
	
	public function getAllElements() {
		return array_keys($this->adjList);
	}
	
	protected function generateAdjList($graph) {
		$a = $graph["internalAdjList"];
		$e = $graph["internalEdgeList"];
	  
	  	$akeys = array_keys($a);
		for($i=0; $i<count($akeys); $i++) { //for each vertex
			$temp = array();
			foreach ($a[$akeys[$i]] as $key => $value) {
				if(!is_string($key)) {
					$new = new Pair($key, $e[$value]["weight"]);
					$temp[] = $new;
				}
			}
			$this->adjList[$akeys[$i]] = $temp;
		}
	}
	
	public function toGraphState(){
		return GraphTemplate::createState($this->graphTemplate, array("displayWeight" => false, "directed" => $this->directed));
    }
	
	//returns an array of integers - the BFS traversal order
	public function BFS($start) {
		$Q = array();
		$visited = array();
		$keys = $this->getAllElements();
		for($i=0; $i<count($keys); $i++) {
			$visited[$keys[$i]] = false;
		}
		$traversal = array();
		
		$Q[] = $start;
		while(!empty($Q)) {
			$u = array_shift($Q);
			if(!$visited[$u]) {
				$visited[$u] = true;
				$traversal[] = $u;
				$nNeighbours = count($this->adjList[$u]);
				for($i=0; $i<$nNeighbours; $i++) {
					$v = $this->adjList[$u][$i]->v();
					if(!$visited[$v]) {
						$Q[] = $v;
					}
				}
			}
		}
		return $traversal;
	}
	
	//returns an array of integers - the DFS traversal order
	public function DFS($start) {
		$stack = array();
		$visited = array();
		$keys = $this->getAllElements();
		for($i=0; $i<count($keys); $i++) {
			$visited[$keys[$i]] = false;
		}
		$traversal = array();
		
		$stack[] = $start;
		while(!empty($stack)) {
			$u = array_pop($stack);
			if(!$visited[$u]) {
				$visited[$u] = true;
				$traversal[] = $u;
				$nNeighbours = count($this->adjList[$u]);
				for($i=($nNeighbours-1); $i>=0; $i--) {
					$v = $this->adjList[$u][$i]->v();
					if(!$visited[$v]) {
						$stack[] = $v;
					}
				}
			}
		}
		return $traversal;
	}
	
}

?>