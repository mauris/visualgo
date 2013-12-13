<?php
  // Sync with JS file
  const QUESTION_TOPIC_BST = "BST";
  const QUESTION_TOPIC_HEAP = "Heap";

  // General in several data-structures
  const QUESTION_TYPE_DELETION = "Deletion";
  const QUESTION_TYPE_INSERTION = "Insertion";
  const QUESTION_TYPE_MIN_VALUE = "MinVal";
  const QUESTION_TYPE_MAX_VALUE = "MaxVal";

  // BST-Specific
  const QUESTION_TYPE_AVL_ROTATION_INSERT = "avlRotationInsert";
  const QUESTION_TYPE_AVL_ROTATION_DELETE = "avlRotationDelete";
  const QUESTION_TYPE_AVL_HEIGHT = "avlHeight";
  const QUESTION_TYPE_HEIGHT = "Height";
  const QUESTION_TYPE_IS_AVL = "isAvl";
  const QUESTION_TYPE_PREDECESSOR = "Predecessor";
  const QUESTION_TYPE_SEARCH = "Search";
  const QUESTION_TYPE_SUCCESSOR = "Successor";
  const QUESTION_TYPE_SWAP = "Swap";
  const QUESTION_TYPE_TRAVERSAL = "Traversal";

  // Heap-Specific
  const QUESTION_TYPE_EXTRACT = "extract";
  const QUESTION_TYPE_HEAPIFY = "heapify";
  const QUESTION_TYPE_HEAP_SORT = "heapSort";

  // General
  const QUESTION_SUB_TYPE_NONE = "";
  const QUESTION_SUB_TYPE_INSERTION = "insert";
  const QUESTION_SUB_TYPE_DELETION = "delete";

  // BST-Specific
  const QUESTION_SUB_TYPE_INORDER_TRAVERSAL = "inorder";
  const QUESTION_SUB_TYPE_POSTORDER_TRAVERSAL = "postorder";
  const QUESTION_SUB_TYPE_PREORDER_TRAVERSAL = "preorder";

  // Heap-Specific
  const QUESTION_SUB_TYPE_MAX_HEAP = "max";
  const QUESTION_SUB_TYPE_MIN_HEAP = "min";

  const ANSWER_TYPE_VERTEX = "vertex";
  const ANSWER_TYPE_VERTEX_MCQ = "vertexMcq";
  const ANSWER_TYPE_MCQ = "mcq";
  const ANSWER_TYPE_FILL_BLANKS = "fillBlanks";

  const ANSWER_AMT_ONE = 1;
  const ANSWER_AMT_MULTIPLE = 2;

  const MODE_GENERATE_SEED = 0;
  const MODE_GENERATE_QUESTIONS = 1;
  const MODE_CHECK_ANSWERS = 2;

  const UNANSWERED = "unanswered";
  const NO_ANSWER = "noAnswer";

  // Keep inside PHP
  const BST_LINKED_LIST_ASCENDING = true;
  const BST_LINKED_LIST_DESCENDING = false;

  const BST_SWAP_ANS_VALID = 0;
  const BST_SWAP_ANS_INVALID = 1;

  const BST_IS_AVL_ANS_VALID = 0;
  const BST_IS_AVL_ANS_INVALID = 1;

  const BST_RANGE_UPPER_BOUND = 99;
  const BST_RANGE_LOWER_BOUND = 1;

  const HEAP_RANGE_UPPER_BOUND = 99;
  const HEAP_RANGE_LOWER_BOUND = 1;

  const INFINITY = 1000000000;
?>