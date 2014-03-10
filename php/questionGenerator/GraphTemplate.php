<?php
class GraphTemplate{
  protected static $graphTemplate = array(
    GRAPH_TEMPLATE_EMPTY => array(
        "internalAdjList" => array(),
        "internalEdgeList" => array()
      ),
    GRAPH_TEMPLATE_K5 => array(
        "internalAdjList" => array(
          0=>array(
              "cxPercentage" => 31.1,
              "cyPercentage" => 30,
              1 => 0,
              2 => 1,
              3 => 2,
              4 => 3
            ),
          1=>array(
              "cxPercentage" => 68.9,
              "cyPercentage" => 30,
              0 => 0,
              2 => 4,
              3 => 5,
              4 => 6
            ),
          2=>array(
              "cxPercentage" => 38.9,
              "cyPercentage" => 76,
              0 => 1,
              1 => 4,
              3 => 7,
              4 => 8
            ),
          3=>array(
              "cxPercentage" => 50,
              "cyPercentage" => 10,
              0 => 2,
              1 => 5,
              2 => 7,
              4 => 9
            ),
          4=>array(
              "cxPercentage" => 61.1,
              "cyPercentage" => 76,
              0 => 3,
              1 => 6,
              2 => 8,
              3 => 9
            ),
          ),
        "internalEdgeList" => array(
          0=>array(
              "vertexA" => 0,
              "vertexB" => 1,
              
            ),
          1=>array(
              "vertexA" => 0,
              "vertexB" => 2,
              
            ),
          2=>array(
              "vertexA" => 0,
              "vertexB" => 3,
              
            ),
          3=>array(
              "vertexA" => 0,
              "vertexB" => 4,
              
            ),
          4=>array(
              "vertexA" => 1,
              "vertexB" => 2,
              
            ),
          5=>array(
              "vertexA" => 1,
              "vertexB" => 3,
              
            ),
          6=>array(
              "vertexA" => 1,
              "vertexB" => 4,
              
            ),
          7=>array(
              "vertexA" => 2,
              "vertexB" => 3,
              
            ),
          8=>array(
              "vertexA" => 2,
              "vertexB" => 4,
              
            ),
          9=>array(
              "vertexA" => 3,
              "vertexB" => 4,
            )
          )
      ),
    GRAPH_TEMPLATE_TESSELLATION => array(
        "internalAdjList" => array(
          0 => array(
              "cxPercentage" => 22.2,
              "cyPercentage" => 10,
              1 => 0,
              2=>1
            ),
          1=>array(
              "cxPercentage" => 22.2,
              "cyPercentage" => 34,
              0 =>0,
              2=>2,
              3=>3,
              4=>4
            ),
          2=>array(
              "cxPercentage" => 38.9,
              "cyPercentage" => 22,
              0 =>1,
              1=>2,
              3=>5,
              6=>6
            ),
          3=>array(
              "cxPercentage" => 55.6,
              "cyPercentage" => 34,
              1 => 3,
              2 => 5,
              4 => 7,
              5 => 8,
              6 => 9,
              7 => 10,
              8 => 11
            ),
          4=>array(
              "cxPercentage" => 30.6,
              "cyPercentage" => 58,
              1 => 4,
              3 => 7,
              5 => 12
            ),
          5=>array(
              "cxPercentage" => 55.6,
              "cyPercentage" => 58,
              3 => 8,
              4 => 12,
              7 => 13
            ),
          6=>array(
              "cxPercentage" => 66.7,
              "cyPercentage" => 10,
              2 => 6,
              3 => 9,
              8 => 14
            ),
          7=>array(
              "cxPercentage" => 71.1,
              "cyPercentage" => 48,
              3 => 10,
              5 => 13,
              8 => 15
            ),
          8=>array(
              "cxPercentage" => 77.8,
              "cyPercentage" => 24,
              3 => 11,
              6 => 14,
              7 => 15
            )
          ),
        "internalEdgeList" => array(
          0=>array(
              "vertexA" => 0,
              "vertexB" => 1,
            ),
          1=>array(
              "vertexA" => 0,
              "vertexB" => 2,
            ),
          2=>array(
              "vertexA" => 1,
              "vertexB" => 2,
              
            ),
          3=>array(
              "vertexA" => 1,
              "vertexB" => 3,
              
            ),
          4=>array(
              "vertexA" => 1,
              "vertexB" => 4,
            ),
          5=>array(
              "vertexA" => 2,
              "vertexB" => 3,
            ),
          6=>array(
              "vertexA" => 2,
              "vertexB" => 6,
              
            ),
          7=>array(
              "vertexA" => 3,
              "vertexB" => 4,
              
            ),
          8=>array(
              "vertexA" => 3,
              "vertexB" => 5,
            ),
          9=>array(
              "vertexA" => 3,
              "vertexB" => 6,
              
            ),
          10=>array(
              "vertexA" => 3,
              "vertexB" => 7,
            ),
          11=>array(
              "vertexA" => 3,
              "vertexB" => 8,
            ),
          12=>array(
              "vertexA" => 4,
              "vertexB" => 5,
              
            ),
          13=>array(
              "vertexA" => 5,
              "vertexB" => 7,
              
            ),
          14=>array(
              "vertexA" => 6,
              "vertexB" => 8,
              
            ),
          15=>array(
              "vertexA" => 7,
              "vertexB" => 8,
            )
          )
      ),
    GRAPH_TEMPLATE_RAIL => array(
        "internalAdjList" => array(
          0 => array(
              "cxPercentage" =>  5.6,
              "cyPercentage" =>  20,
              1 => 0
            ),
          1 => array(
              "cxPercentage" =>  27.8,
              "cyPercentage" =>  20,
              0 => 0,
              2 => 1,
              6 => 2,
              7 => 3
            ),
          2 => array(
              "cxPercentage" =>  50,
              "cyPercentage" =>  20,
              1 => 1,
              3 => 4,
              7 => 5,
              8 => 6
            ),
          3 => array(
              "cxPercentage" =>  72.2,
              "cyPercentage" =>  20,
              2 => 4,
              4 => 7,
              8 => 8
            ),
          4 => array(
              "cxPercentage" =>  94.4,
              "cyPercentage" =>  20,
              3 => 7
            ),
          5 => array(
              "cxPercentage" =>  5.6,
              "cyPercentage" =>  50,
              6 => 9
            ),
          6 => array(
              "cxPercentage" =>  27.8,
              "cyPercentage" =>  50,
              1 => 2,
              5 => 9,
              7 => 10
            ),
          7 => array(
              "cxPercentage" =>  50,
              "cyPercentage" =>  50,
              1 => 3,
              2 => 5,
              6 => 10,
              8 => 11
            ),
          8 => array(
              "cxPercentage" =>  72.2,
              "cyPercentage" =>  50,
              2 => 6,
              3 => 8,
              7 => 11,
              9 => 12
            ),
          9 => array(
              "cxPercentage" =>  94.4,
              "cyPercentage" =>  50,
              8 => 12
            )
          ),
        "internalEdgeList" => array(
          0 => array(
              "vertexA" =>  0,
              "vertexB" =>  1,
            ),
          1 => array(
              "vertexA" =>  1,
              "vertexB" =>  2,
            ),
          2 => array(
              "vertexA" =>  1,
              "vertexB" =>  6,
              
            ),
          3 => array(
              "vertexA" =>  1,
              "vertexB" =>  7
            ),
          4 => array(
              "vertexA" =>  2,
              "vertexB" =>  3
            ),
          5 => array(
              "vertexA" =>  2,
              "vertexB" =>  7
            ),
          6 => array(
              "vertexA" =>  2,
              "vertexB" =>  8
            ),
          7 => array(
              "vertexA" =>  3,
              "vertexB" =>  4
            ),
          8 => array(
              "vertexA" =>  3,
              "vertexB" =>  8
            ),
          9 => array(
              "vertexA" =>  5,
              "vertexB" =>  6
            ),
          10 => array(
              "vertexA" =>  6,
              "vertexB" =>  7
            ),
          11 => array(
              "vertexA" =>  7,
              "vertexB" =>  8
            ),
          12 => array(
              "vertexA" =>  8,
              "vertexB" =>  9
            )
          )
      ),
    GRAPH_TEMPLATE_CP4P10 => array(
        "internalAdjList" => array(
          0 => array(
              "cxPercentage" =>  38.9,
              "cyPercentage" =>  30,
              1 => 0,
              2 => 1,
              3 => 2,
              4 => 3
            ),
          1 => array(
              "cxPercentage" =>  50,
              "cyPercentage" =>  10,
              0 => 0,
              2 => 4
            ),
          2 => array(
              "cxPercentage" =>  61.1,
              "cyPercentage" =>  30,
              0 => 1,
              1 => 4,
              3 => 5
            ),
          3 => array(
              "cxPercentage" =>  50,
              "cyPercentage" =>  50,
              0 => 2,
              2 => 5,
              4 => 6
            ),
          4 => array(
              "cxPercentage" =>  38.9,
              "cyPercentage" =>  70,
              0 => 3,
              3 => 6
            )
          ),
        "internalEdgeList" => array(
          0 => array(
              "vertexA" =>  0,
              "vertexB" =>  1
            ),
          1 => array(
              "vertexA" =>  0,
              "vertexB" =>  2
            ),
          2 => array(
              "vertexA" =>  0,
              "vertexB" =>  3
            ),
          3 => array(
              "vertexA" =>  0,
              "vertexB" =>  4
            ),
          4 => array(
              "vertexA" =>  1,
              "vertexB" =>  2
            ),
          5 => array(
              "vertexA" =>  2,
              "vertexB" =>  3
            ),
          6 => array(
              "vertexA" =>  3,
              "vertexB" =>  4
            )
          )
      ),
    GRAPH_TEMPLATE_CP3_4_17 => array(
        "internalAdjList" => array(
          0 => array(
              "cxPercentage" => 23.3,
              "cyPercentage" => 38,
              4 =>3
            ),
          1 => array(
              "cxPercentage" => 5.6,
              "cyPercentage" => 10,
              3 =>1,
              4 =>0
            ),
          2 => array(
              "cxPercentage" => 18.9,
              "cyPercentage" => 24,
              0 =>4,
              1 =>2,
              3 =>6
            ),
          3 => array(
              "cxPercentage" => 36.7,
              "cyPercentage" => 10,
              4 =>5
            ),
          4 => array(
              "cxPercentage" => 26.7,
              "cyPercentage" => 56,
            )
          ),
        "internalEdgeList" => array(
          0 => array(
              "vertexA" => 1,
              "vertexB" => 4
            ),
          1 => array(
              "vertexA" => 1,
              "vertexB" => 3
            ),
          2 => array(
              "vertexA" => 2,
              "vertexB" => 1
            ),
          3 => array(
              "vertexA" => 0,
              "vertexB" => 4
            ),
          4 => array(
              "vertexA" => 2,
              "vertexB" => 0
            ),
          5 => array(
              "vertexA" => 3,
              "vertexB" => 4
            ),
          6 => array(
              "vertexA" => 2,
              "vertexB" => 3
            )
          )
      ),
    GRAPH_TEMPLATE_CP3_4_18 => array(
        "internalAdjList" => array(
          0 => array(
              "cxPercentage" => 5.6,
              "cyPercentage" => 25,
              1 =>0,
              2 =>3
            ),
          1 => array(
              "cxPercentage" => 16.7,
              "cyPercentage" => 10,
              3 =>2
            ),
          2 => array(
              "cxPercentage" => 16.7,
              "cyPercentage" => 40,
              3 =>4
            ),
          3 => array(
              "cxPercentage" => 27.8,
              "cyPercentage" => 25,
              4 =>2
            ),
          4 => array(
              "cxPercentage" => 38.9,
              "cyPercentage" => 25,
            )
          ),
        "internalEdgeList" => array(
          0 => array(
              "vertexA" => 0,
              "vertexB" => 1
            ),
          1 => array(
              "vertexA" => 1,
              "vertexB" => 3
            ),
          2 => array(
              "vertexA" => 3,
              "vertexB" => 4
            ),
          3 => array(
              "vertexA" => 0,
              "vertexB" => 2
            ),
          4 => array(
              "vertexA" => 2,
              "vertexB" => 3
            )
          )
      ),
    GRAPH_TEMPLATE_CP3_4_19 => array(
        "internalAdjList" => array(
          0 => array(
            "cxPercentage" => 5.6,
            "cyPercentage" => 10,
            1 =>0,
            4 =>4
            ),
          1 => array(
            "cxPercentage" => 16.7,
            "cyPercentage" => 10,
            2 =>1
            ),
          2 => array(
            "cxPercentage" => 27.8,
            "cyPercentage" => 10,
            1 =>2,
            3 =>3
            ),
          3 => array(
            "cxPercentage" => 38.9,
            "cyPercentage" => 10,
            ),
          4 => array(
            "cxPercentage" => 16.7,
            "cyPercentage" => 25
            )
          ),
        "internalEdgeList" => array(
          0 => array(
              "vertexA" => 0,
              "vertexB" => 1
            ),
          1 => array(
              "vertexA" => 1,
              "vertexB" => 2
            ),
          2 => array(
              "vertexA" => 2,
              "vertexB" => 1
            ),
          3 => array(
              "vertexA" => 2,
              "vertexB" => 3
            ),
          4 => array(
              "vertexA" => 0,
              "vertexB" => 4
            )
          )
      ),
    GRAPH_TEMPLATE_BIDIRECTED_1 => array(
        "internalAdjList" => array(
          0 => array(
            "cxPercentage" => 50,
            "cyPercentage" => 20,
            1 =>0,
            5 =>7,
            6 =>9,
            7 =>8
            ),
          1 => array(
            "cxPercentage" => 62.5,
            "cyPercentage" => 40,
            2 =>1
            ),
          2 => array(
            "cxPercentage" => 50,
            "cyPercentage" => 60,
            3 =>2,
            4 =>5
            ),
          3 => array(
            "cxPercentage" => 37.5,
            "cyPercentage" => 40,
            0 =>3
            ),
          4 => array(
            "cxPercentage" => 87.5,
            "cyPercentage" => 40,
            0 =>4
            ),
          5 => array(
            "cxPercentage" => 12.5,
            "cyPercentage" => 40,
            2 =>6
            ),
          6 => array(
            "cxPercentage" => 25,
            "cyPercentage" => 10,
            0 =>11
            ),
          7 => array(
            "cxPercentage" => 75,
            "cyPercentage" => 10,
            0 =>10
            )
          ),
        "internalEdgeList" => array(
          0 => array(
              "vertexA" => 0,
              "vertexB" => 1
            ),
          1 => array(
              "vertexA" => 1,
              "vertexB" => 2
            ),
          2 => array(
              "vertexA" => 2,
              "vertexB" => 3
            ),
          3 => array(
              "vertexA" => 3,
              "vertexB" => 0
            ),
          4 => array(
              "vertexA" => 4,
              "vertexB" => 0
            ),
          5 => array(
              "vertexA" => 2,
              "vertexB" => 4
            ),
          6 => array(
              "vertexA" => 5,
              "vertexB" => 2
            ),
          7 => array(
              "vertexA" => 0,
              "vertexB" => 5
            ),
          8 => array(
              "vertexA" => 0,
              "vertexB" => 7
            ),
          9 => array(
              "vertexA" => 0,
              "vertexB" => 6
            ),
          10 => array(
              "vertexA" => 7,
              "vertexB" => 0
            ),
          11 => array(
              "vertexA" => 6,
              "vertexB" => 0
            )
          )
      ),
    GRAPH_TEMPLATE_DIRECTED_1 => array(
        "internalAdjList" => array(
          0 => array(
            "cxPercentage" => 60,
            "cyPercentage" => 5,
            3 =>0
            ),
          1 => array(
            "cxPercentage" => 40,
            "cyPercentage" => 5,
            0 =>26
            ),
          2 => array(
            "cxPercentage" => 50,
            "cyPercentage" => 35,
            1 =>2
            ),
          3 => array(
            "cxPercentage" => 65,
            "cyPercentage" => 20,
            2 =>1,
            5 =>19
            ),
          4 => array(
            "cxPercentage" => 35,
            "cyPercentage" => 20,
            1 =>3,
            2 =>4,
            12 =>5
            ),
          5 => array(
            "cxPercentage" => 80,
            "cyPercentage" => 25,
            6 =>20,
            8 =>27
            ),
          6 => array(
            "cxPercentage" => 90,
            "cyPercentage" => 45,
            7 =>24,
            8 =>21,
            10 =>23
            ),
          7 => array(
            "cxPercentage" => 85,
            "cyPercentage" => 75,
            10 =>25
            ),
          8 => array(
            "cxPercentage" => 65,
            "cyPercentage" => 55,
            10 =>22
            ),
          9 => array(
            "cxPercentage" => 55,
            "cyPercentage" => 42.5,
            5 => 18,
            11 =>16
            ),
          10 => array(
            "cxPercentage" => 60,
            "cyPercentage" => 77,
            9 =>17,
            11 =>15,
            14 =>14
            ),
          11 => array(
            "cxPercentage" => 39,
            "cyPercentage" => 50,
            12 =>8,
            14 =>13
            ),
          12 => array(
            "cxPercentage" => 22,
            "cyPercentage" => 25,
            13 =>7
            ),
          13 => array(
            "cxPercentage" => 11,
            "cyPercentage" => 50,
            11 =>9,
            15 =>11
            ),
          14 => array(
            "cxPercentage" => 39,
            "cyPercentage" => 70,
            13 =>10
            ),
          15 => array(
            "cxPercentage" => 16,
            "cyPercentage" => 78,
            14 =>12
            ),
          ),
        "internalEdgeList" => array(
          0 => array(
              "vertexA" => 0,
              "vertexB" => 3
            ),
          1 => array(
              "vertexA" => 3,
              "vertexB" => 2
            ),
          2 => array(
              "vertexA" => 2,
              "vertexB" => 1
            ),
          3 => array(
              "vertexA" => 4,
              "vertexB" => 1
            ),
          4 => array(
              "vertexA" => 4,
              "vertexB" => 2
            ),
          5 => array(
              "vertexA" => 4,
              "vertexB" => 12
            ),
          7 => array(
              "vertexA" => 12,
              "vertexB" => 13
            ),
          8 => array(
              "vertexA" => 11,
              "vertexB" => 12
            ),
          9 => array(
              "vertexA" => 13,
              "vertexB" => 11
            ),
          10 => array(
              "vertexA" => 14,
              "vertexB" => 13
            ),
          11 => array(
              "vertexA" => 13,
              "vertexB" => 15
            ),
          12 => array(
              "vertexA" => 15,
              "vertexB" => 14
            ),
          13 => array(
              "vertexA" => 11,
              "vertexB" => 14
            ),
          14 => array(
              "vertexA" => 10,
              "vertexB" => 14
            ),
          15 => array(
              "vertexA" => 10,
              "vertexB" => 11
            ),
          16 => array(
              "vertexA" => 9,
              "vertexB" => 11
            ),
          17 => array(
              "vertexA" => 10,
              "vertexB" => 9
            ),
          18 => array(
              "vertexA" => 9,
              "vertexB" => 5
            ),
          19 => array(
              "vertexA" => 3,
              "vertexB" => 5
            ),
          20 => array(
              "vertexA" => 5,
              "vertexB" => 6
            ),
          21 => array(
              "vertexA" => 6,
              "vertexB" => 8
            ),
          22 => array(
              "vertexA" => 8,
              "vertexB" => 10
            ),
          23 => array(
              "vertexA" => 6,
              "vertexB" => 10
            ),
          24 => array(
              "vertexA" => 6,
              "vertexB" => 7
            ),
          25 => array(
              "vertexA" => 7,
              "vertexB" => 10
            ),
          26 => array(
              "vertexA" => 1,
              "vertexB" => 0
            ),
          27 => array(
              "vertexA" => 5,
              "vertexB" => 8
            )
          )
      )
    );
  protected static $graphTemplateIndex = array(
    GRAPH_TEMPLATE_TYPE_DIRECTED => array(
      GRAPH_TEMPLATE_CP3_4_17, GRAPH_TEMPLATE_CP3_4_18, GRAPH_TEMPLATE_CP3_4_19, GRAPH_TEMPLATE_BIDIRECTED_1, GRAPH_TEMPLATE_DIRECTED_1
      ),
    GRAPH_TEMPLATE_TYPE_UNDIRECTED => array(
      GRAPH_TEMPLATE_K5, GRAPH_TEMPLATE_TESSELLATION, GRAPH_TEMPLATE_RAIL, GRAPH_TEMPLATE_CP4P10
      )
    );

  public function __construct(){

  }

  /*
   * Pass in a variable called $params to getGraph, containing these informations =>
   * - "numVertex" => number of vertex desired
   * - "directed" => boolean, directed or undirected
   * - Optionals =>
   *   - "connected" => boolean, connected or disconnected
   *   - "negativeEdge" => boolean, contains negative edges or not
   *   - "negativeCycle" => boolean, contains negative cycles or not
   * - Optionals for directed graphs =>
   *   - "isDag" => boolean, is DAG or not
   *   - "directionChangeChance" => int between 0 and 100, chance (in percent) of changing direction of non-bidirectional edges compared to the one in the DB
   *   - "bidirectionChangeChance" => int between 0 and 100, chance (in percent) of turning a certain non-bidirectional edge AMONG THE EDGES CHANGED to bidirectional (so the actual chance is directionChangeChance*bidirectionChangeChance)
   */

  public static function getGraph($params){
    $template = array_copy(self::$graphTemplate[GRAPH_TEMPLATE_EMPTY]);
    $templateBank;
    $loopBreaker = 0;
    $loopLimit = 10;

    if(!array_key_exists("directionChangeChance", $params)) $params["directionChangeChance"] = GRAPH_TEMPLATE_EDGE_DIRECTION_CHANGE_DEFAULT_CHANCE;
    if(!array_key_exists("bidirectionChangeChance", $params)) $params["bidirectionChangeChance"] = GRAPH_TEMPLATE_EDGE_BIDIRECTION_CHANGE_DEFAULT_CHANCE;

    $graphDb = new GraphDatabase();
    $template = $graphDb->getRandomTemplate($params);
    $template = unserialize($template);

    // if($params["directed"]) $templateBank = self::$graphTemplateIndex[GRAPH_TEMPLATE_TYPE_DIRECTED];
    // else $templateBank = self::$graphTemplateIndex[GRAPH_TEMPLATE_TYPE_UNDIRECTED];

    while(count($template["internalAdjList"]) < $params["numVertex"] && $loopBreaker < $loopLimit){
      $templateName = $templateBank[rand(0, count($templateBank)-1)];
      $template = array_copy(self::$graphTemplate[$templateName]);
      $loopBreaker++;
    }

    $weightList = array(0);
    $connected = false;
    if($params["connected"]) $connected = true;

    self::reduceVertex($template, $params["numVertex"], $connected, $params["directed"]);
    if(!$connected && self::isConnected($template, $params["directed"])) self::disconnect($template, $params["directed"]);
    self::randomizeDirection($template, $params["directionChangeChance"], $params["bidirectionChangeChance"]);
    self::randomizeWeight($template);
    self::randomizeVertexNumber($template);

    return $template;
  }

  /*
   * Pass in a variable called $params to createState, containing these informations =>
   * - "displayWeight" => boolean, display or hide weight
   * - "directed" => boolean, directed or undirected
   */

  public static function createState($graphTemplate, $params){
    $internalAdjListObject = $graphTemplate["internalAdjList"];
    $internalEdgeListObject = $graphTemplate["internalEdgeList"];

    $state = array(
      "vl"=>array(),
      "el"=>array()
    );

    foreach ($internalAdjListObject as $key => $value){
      $state["vl"][$key] = array();

      $state["vl"][$key]["cxPercentage"] = $internalAdjListObject[$key]["cxPercentage"];
      $state["vl"][$key]["cyPercentage"] = $internalAdjListObject[$key]["cyPercentage"];
      $state["vl"][$key]["text"] = $key;
    }
    foreach ($internalEdgeListObject as $key => $value){
      $state["el"][$key] = array();

      $state["el"][$key]["vertexA"] = $internalEdgeListObject[$key]["vertexA"];
      $state["el"][$key]["vertexB"] = $internalEdgeListObject[$key]["vertexB"];
      $state["el"][$key]["weight"] = $internalEdgeListObject[$key]["weight"];
      if($params["displayWeight"]) $state["el"][$key]["displayWeight"] = true;
      if($params["directed"]) $state["el"][$key]["type"] = EDGE_TYPE_DE;
    }

    return $state;
  }

  protected static function reduceVertex(&$template, $numVertex, $connected, $directed){
    $tempTemplate = array_copy($template);
    $indexList = array_keys($template["internalAdjList"]);
    $loopLimit = 10*(count($indexList) - $numVertex);
    if($loopLimit < 0) $loopLimit = 0;
    $loopBreaker = 0;

    while(count($indexList) > 0 && $loopBreaker < $loopLimit){
      if(count($tempTemplate["internalAdjList"]) <= $numVertex) break;
      $indexChosen = rand(0, count($indexList)-1);
      $index = $indexList[$indexChosen];
      $templateCopy = array_copy($tempTemplate);
      $adjacent = $tempTemplate["internalAdjList"][$index];
      unset($adjacent["cxPercentage"]);
      unset($adjacent["cyPercentage"]);

      foreach($adjacent as $key => $value){
        if($directed) unset($templateCopy["internalEdgeList"][$templateCopy["internalAdjList"][$key][$index]]);
        unset($templateCopy["internalAdjList"][$key][$index]);
        unset($templateCopy["internalEdgeList"][$value]);
      }

      if($directed){
        foreach($templateCopy["internalAdjList"] as $key => $value){
          if(isset($value[$index])){
            unset($templateCopy["internalEdgeList"][$value[$index]]);
            unset($templateCopy["internalAdjList"][$key][$index]);
          }
        }
      }

      unset($templateCopy["internalAdjList"][$index]);
      if(!$connected || self::isConnected($templateCopy, $directed)){
        $tempTemplate = $templateCopy;
      }
      unset($indexList[$indexChosen]);
      $indexList = array_values($indexList);
      $loopBreaker++;
    }

    // echo "<br/><br/>";
    //   echo json_encode($template);
    //   echo "<br/>";
    //   echo json_encode($tempTemplate);
    // echo "<br/><br/>";
    // echo "aaa";
    // echo "<br/><br/>";

    $template = $tempTemplate;
  }

  protected static function randomizeVertexNumber(&$template){
    $originalKeys = array_keys($template["internalAdjList"]);
    $modifiedKeys = array();

    for($i = 0; count($originalKeys) > 0; $i++){
      $selectedKey = rand(0, count($originalKeys)-1);
      $modifiedKeys[$originalKeys[$selectedKey]] = $i;
      unset($originalKeys[$selectedKey]);
      $originalKeys = array_values($originalKeys);
    }

    $tempAdjList = array();

    foreach($modifiedKeys as $oldKey => $newKey){
      $tempAdjList[$newKey] = $template["internalAdjList"][$oldKey];

      // echo json_encode($template)."<br/>";

      $tempConnectivity = array();

      foreach($tempAdjList[$newKey] as $key => $value){
        if($key === "cxPercentage" || $key === "cyPercentage"){
          $tempConnectivity[$key] = $tempAdjList[$newKey][$key];
          continue;
        }
        $tempConnectivity[$modifiedKeys[$key]] = $tempAdjList[$newKey][$key];
      }

      $tempAdjList[$newKey] = $tempConnectivity;
    }

    $template["internalAdjList"] = $tempAdjList;

    foreach($template["internalEdgeList"] as $key => $value){
      $template["internalEdgeList"][$key]["vertexA"] = $modifiedKeys[$value["vertexA"]];
      $template["internalEdgeList"][$key]["vertexB"] = $modifiedKeys[$value["vertexB"]];
    }

    // echo json_encode($template);
    // echo "<br/><br/>";
  }

  protected static function randomizeWeight(&$template){
    $weightList = array(0);

    foreach($template["internalEdgeList"] as $key => $value){
      $weight = 0;

      while(in_array($weight, $weightList)){
        $weight = rand(1, 99);
      }
      $weightList[] = $weight;

      $template["internalEdgeList"][$key]["weight"] = $weight;
    }
  }

  /*
   * directionChangeChance: number between 0 and 100
   * bidirectionChangeChance: number between 0 and 100
   */

  protected static function randomizeDirection(&$template, $directionChangeChance, $bidirectionChangeChance){
    foreach($template["internalEdgeList"] as $key => $value){
      if(rand(1,100) > $directionChangeChance) continue;
      $vertexA = $value["vertexA"];
      $vertexB = $value["vertexB"];
      if(array_key_exists($vertexB, $template["internalAdjList"][$vertexA]) && array_key_exists($vertexA, $template["internalAdjList"][$vertexB]))
        continue;
      $template["internalEdgeList"][$key]["vertexA"] = $vertexB;
      $template["internalEdgeList"][$key]["vertexB"] = $vertexA;
      $template["internalAdjList"][$vertexB][$vertexA] = $key;
      unset($template["internalAdjList"][$vertexA][$vertexB]);
      if(rand(1,100) > $bidirectionChangeChance){
        $edgeList = array_keys($template["internalEdgeList"]);
        sort($edgeList);
        $lastKey = $edgeList[count($edgeList)-1];
        $template["internalEdgeList"][$lastKey+1] = array(
          "vertexA" => $vertexA,
          "vertexB" => $vertexB,
          );
        $template["internalAdjList"][$vertexA][$vertexB] = $lastKey+1;
      }
    }
  }

  protected static function disconnect(&$template, $directed){
    while(self::isConnected($template, $directed) && count($template["internalEdgeList"]) > 0){
        $edgeListId = array_keys($template["internalEdgeList"]);
        $edgeToBeRemoved = $edgeListId[rand(0, count($edgeListId)-1)];
        $vertexA = $template["internalEdgeList"][$edgeToBeRemoved]["vertexA"];
        $vertexB = $template["internalEdgeList"][$edgeToBeRemoved]["vertexB"];
        unset($template["internalAdjList"][$vertexA][$vertexB]);
        if($directed){
          if(isset($template["internalAdjList"][$vertexB][$vertexA]))
            unset($template["internalEdgeList"][$template["internalAdjList"][$vertexB][$vertexA]]);
        } 
        unset($template["internalAdjList"][$vertexB][$vertexA]);
        unset($template["internalEdgeList"][$edgeToBeRemoved]);
    }
  }

  protected static function isConnected($template, $directed){
    $visited = array();

    if(!$directed){
      $arr = array_keys($template["internalAdjList"]);
      $initVertex = $arr[0];
      $queue = array();
      $visited[] = $initVertex;
      $adjacent = $template["internalAdjList"][$initVertex];
      unset($adjacent["cxPercentage"]);
      unset($adjacent["cyPercentage"]);

  	  if(!is_array($adjacent)) {
  		  $temp = $adjacent;
  		  $adjacent = array();
  		  $adjacent[] = $temp;
  	  }
      foreach($adjacent as $key => $value){
        $queue[] = $key;
      }

      while(count($queue) > 0){
        $currVertex = $queue[0];
        array_shift($queue);
        if(!in_array($currVertex, $visited)){
          $visited[] = $currVertex;
          $adjacent = $template["internalAdjList"][$currVertex];
          unset($adjacent["cxPercentage"]);
          unset($adjacent["cyPercentage"]);
          foreach($adjacent as $key => $value){
            $queue[] = $key;
          }
        }
      }

      return count($visited) == count($template["internalAdjList"]);
    }
    else{
      // Weakly connected check
      // Convert AdjList to undirected version, then call the function again
      foreach($template["internalEdgeList"] as $key => $value){
        $template["internalAdjList"][$value["vertexA"]][$value["vertexB"]] = $key;
        $template["internalAdjList"][$value["vertexB"]][$value["vertexA"]] = $key;
      }

      return self::isConnected($template, false);
    }
  }

  protected static function isDag($template, $directed){
    if(!$directed) return false;

    $vertexAmt = count($template["internalAdjList"]);
    $toposort = array();
    $noIncomingEdge = array_keys($template["internalAdjList"]);

    foreach($template["internalEdgeList"] as $key => $value){
      $noIncomingEdge = array_diff($noIncomingEdge, array($value["vertexB"]));
    }

    while(count($noIncomingEdge) > 0){
      $currVertex = array_shift($noIncomingEdge);
      foreach($template["internalAdjList"] as $key=>$value){
        if($key == "cxPercentage" || $key == "cyPercentage") continue;

        unset($template["internalEdgeList"][$value]);
        $noIncomingEdge[] = $key;
      }

      foreach($template["internalEdgeList"] as $key => $value){
        $noIncomingEdge = array_diff($noIncomingEdge, array($value["vertexB"]));
      }
    }

    if(count($toposort) != $vertexAmt) return false;
    else return true;
  }
}
?>