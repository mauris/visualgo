<?php

class SSSP {
	
	protected $adjList; //array of arrays of pairs (use Pair class from MST)
	protected $graphTemplate;
	protected $size;
	
	public function __construct(){
		$this->init();
    }
	
	protected function init() {
		$this->size = rand(6,10);
		$this->graphTemplate = GraphTemplate::getGraph(array("numVertex" => $this->size, "directed" => true, "connected" => true));
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
		return GraphTemplate::createState($this->graphTemplate, array("displayWeight" => true, "directed" => true));
    }
	
	//returns an array of integers
	public function sssp($start) {
		//if($this->weighted) {
			return $this->bellmanFord($start);
		//} else {
			//return $this->BFS($start);
		//}
	}
	
	//currently not being used -- needs to be debugged
	//returns an array of integers (SPs starting from $start)
	public function BFS($start) {
		$Q = array();
		$visited = array();
		$shortestPath = array(); //from $start
		
		$Q[] = $start;
		$visted[$start] = true;
		$shortestPath[$start] = 0;
		while(!empty($Q)) {
			$u = array_shift($Q);
			$nNeighbours = count($this->adjList[$u]);
			for($i=0; $i<$nNeighbours; $i++) {
				$v = $this->adjList[$u][$i]->v();
				if(!$visited[$v]) { //error originating here
					$Q[] = $v;
					$shortestPath[$v] = $shortestPath[$u]+1;
				}
			}
		}
		return $shortestPath;
	}
	
	//returns an array of integers (SPs starting from $start)
	public function bellmanFord($start) {
		$shortestPath = array(); //from $start
		$parent = array();
		
		//initialize $shortestPath to infinity
		$akeys = $this->getAllElements();
		for($i=0; $i<count($akeys); $i++) {
			$shortestPath[$akeys[$i]] = INFINITY;
		}
		$shortestPath[$start] = 0;
		
		//relax edges
		for($i=1; $i<count($akeys); $i++) { // V-1 times
			//for all edges
			for($iu=0; $iu<count($akeys); $iu++) { //iu goes from 0 to number of vertices-1
				$u = $akeys[$iu]; //u is the key of the vertex
				for($iv=0; $iv<count($this->adjList[$u]); $iv++) { //iv goes from 0 to number of adjacent vertices-1
					$v = $this->adjList[$u][$iv]->v(); //v is the key of the adjacent vertex
					$w = $this->adjList[$u][$iv]->w(); //w is the weight of edge u-->v
					if (($shortestPath[$u] + $w) < $shortestPath[$v]) {
						$shortestPath[$v] = $shortestPath[$u] + $w;
						$parent[$v] = $u;
					}
				}
			}
		}
		//this bellman ford does not look for negative cycles
		return $shortestPath;
	}
	
}

?>