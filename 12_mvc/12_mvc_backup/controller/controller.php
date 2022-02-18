<?php
  require_once './model/Model.php';
  class controller{
    public $model;
    public function __construct(){
      $this->model = new Model();
    }

    public function invoke(){
      // $this->model->getBook();
      if (!isset($_GET['book'])) {
        $books=$this->model->getBookDetails();
        require_once './view/booklist.php';
      }
      else {
        $books=$this->model->getBook($_GET['book']);
        // require_once 'view/viewbook.php';
      }
    }
  }
 ?>
