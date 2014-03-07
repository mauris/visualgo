<?php
  /*
   * PHP Class to store the graph templates inside the MySQL database and retrieve them
   */

  /*
   * Table name: graph_template
   * Schema:
   * - name: template name (unique key)
   * - template: serialized graphState (php-version)
   * - directed: boolean
   * - vertexAmount
   * - connected: boolean
   */

  class GraphDatabase{
    // TODO: Consider SQL injection issue

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
                "text" => 0,
                4 =>3
              ),
            1 => array(
                "cxPercentage" => 5.6,
                "cyPercentage" => 10,
                "text" => 1,
                3 =>1,
                4 =>0
              ),
            2 => array(
                "cxPercentage" => 18.9,
                "cyPercentage" => 24,
                "text" => 2,
                0 =>4,
                1 =>2,
                3 =>6
              ),
            3 => array(
                "cxPercentage" => 36.7,
                "cyPercentage" => 10,
                "text" => 3,
                4 =>5
              ),
            4 => array(
                "cxPercentage" => 26.7,
                "cyPercentage" => 56,
                "text" => 4,
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
                "text" => 0,
                1 =>0,
                2 =>3
              ),
            1 => array(
                "cxPercentage" => 16.7,
                "cyPercentage" => 10,
                "text" => 1,
                3 =>2
              ),
            2 => array(
                "cxPercentage" => 16.7,
                "cyPercentage" => 40,
                "text" => 2,
                3 =>4
              ),
            3 => array(
                "cxPercentage" => 27.8,
                "cyPercentage" => 25,
                "text" => 3,
                4 =>2
              ),
            4 => array(
                "cxPercentage" => 38.9,
                "cyPercentage" => 25,
                "text" => 4,
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
              "text" => 0,
              1 =>0,
              4 =>4
              ),
            1 => array(
              "cxPercentage" => 16.7,
              "cyPercentage" => 10,
              "text" => 1,
              2 =>1
              ),
            2 => array(
              "cxPercentage" => 27.8,
              "cyPercentage" => 10,
              "text" => 2,
              1 =>2,
              3 =>3
              ),
            3 => array(
              "cxPercentage" => 38.9,
              "cyPercentage" => 10,
              "text" => 3
              ),
            4 => array(
              "cxPercentage" => 16.7,
              "cyPercentage" => 25,
              "text" => 4
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
            ),
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

    protected $db;

    public function __construct() {
      $this->db = mysqli_connect("localhost",DB_USERNAME,DB_PASSWORD,DB_NAME);

      if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

      $this->initBasicTemplates();
    }

    protected function initBasicTemplates(){
      foreach(self::$graphTemplateIndex[GRAPH_TEMPLATE_TYPE_UNDIRECTED] as $templateName){
        mysqli_query($this->db, "INSERT IGNORE INTO `graph_template` (`name`, `template`, `directed`, `vertexAmount`, `connected`) 
          VALUES ('".$templateName."','".serialize(self::$graphTemplate[$templateName])."','"
          ."0"."','".count(self::$graphTemplate[$templateName]["internalAdjList"])."','"."1"."')");
        // echo mysqli_error($this->db);
      }

      foreach(self::$graphTemplateIndex[GRAPH_TEMPLATE_TYPE_DIRECTED] as $templateName){
        mysqli_query($this->db, "INSERT IGNORE INTO `graph_template` (`name`, `template`, `directed`, `vertexAmount`, `connected`) 
          VALUES ('".$templateName."','".serialize(self::$graphTemplate[$templateName])."','"
          ."1"."','".count(self::$graphTemplate[$templateName]["internalAdjList"])."','"."1"."')");
        // echo mysqli_error($this->db);
      }
      // echo mysqli_error($this->db);
    }

    public function getSpecificTemplate($templateName){
      $result = mysqli_query($this->db, "SELECT `template` FROM `graph_template` WHERE `name`='".$templateName."'");
      $template = mysqli_fetch_assoc($result);
      // echo($template["template"]);
      // echo mysqli_error($this->db);
      if(count($template) == 0) return null;
      return $template["template"];
    }

    /*
     * Pass in a variable called $params to getRandomTemplate, containing these informations =>
     * - "numVertex" => number of vertex desired
     * - "directed" => boolean, directed or undirected
     * - Optionals =>
     *   - "connected" => boolean, connected or disconnected
     *   - "negativeEdge" => boolean, contains negative edges or not
     *   - "negativeCycle" => boolean, contains negative cycles or not
     * - Optionals for directed graphs =>
     *   - "isDag" => boolean, is DAG or not
     */

    public function getRandomTemplate($params){
      $directed = $params["directed"]? 1:0;
      $connected = $params["connected"]? 1:0;

      $result = mysqli_query($this->db, "SELECT `template` FROM `graph_template` 
        WHERE `vertexAmount`>='".$params["numVertex"]."'".
        "AND `directed`='".$directed."'".
        "AND `connected`='".$connected."'"
        );
      $templateList = array();

      while(true){
        $template = mysqli_fetch_assoc($result);
        if(is_null($template)) break;
        $templateList[] = $template["template"];
        // echo $template["template"];
      }
      // echo mysqli_error($this->db);
      if(count($templateList) == 0){
        // Relax vertexAmount
        $result = mysqli_query($this->db, "SELECT `template` FROM `graph_template` 
          WHERE `directed`='".$directed."'".
          "AND `connected`='".$connected."'"
          );

        while(true){
          $template = mysqli_fetch_assoc($result);
          if(is_null($template)) break;
          $templateList[] = $template["template"];
          // echo $template["template"];
        }
      }

      if(count($templateList) == 0) return null;

      $selectedTemplate = rand(0, count($templateList)-1);
      return $templateList[$selectedTemplate];
    }

    public function insertTemplate($newTemplate, $templateName, $params){
      $directed = $params["directed"]? 1:0;
      $connected = $params["connected"]? 1:0;

      if($isConnected) $connected = 1;
      mysqli_query($this->db, "INSERT IGNORE INTO `graph_template` (`name`, `template`, `directed`, `vertexAmount`, `connected`) 
          VALUES ('".$templateName."','".serialize($newTemplate)."','".$directed."','"
          .count($newTemplate["internalAdjList"])."','".$connected."')");
        // echo mysqli_error($this->db);
    }

    public function removeTemplate($templateName){
      mysqli_query($this->db, "DELETE FROM `graph_template` WHERE `name`=".$templateName);
    }

    // Add new templates
      // Validate template, then insert

    // Remove templates

    // Query a specific template

    // Query a random template with desired property; return empty template if there is no such template
  }
?>