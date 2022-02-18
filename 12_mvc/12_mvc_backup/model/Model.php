<?php
  require_once 'Book.php';
  class Model{
    public function getBookDetails(){
      return array(
        "test1" => new Book('php8', 'Jan Kowalski', 'php 8 w praktyce'),
        "test2" => new Book('laravel8', 'Bogusław Kowalski', 'laravel 8 w praktyce')
      );
    }
    public function getBook($title){
      $allBooks=$this->getBookDetails();
      // $bookTitle=array();
        foreach ($allBooks as $book) {
          if ($book->title == $title) {
            // $bookTitle[] = $book;
            echo $book->title;
            echo $book->author;
            echo "<br>";
          }
        }
        // return $bookTitle;
    }
    // public function getBook($title){
    //   $allBooks=$this->getBookDetails();
    //   // return $allBooks[$title];
    //     foreach ($allBooks as $value) {
    //       if ($value->title == $title) {
    //         echo $value->title;
    //       }
    //     }
    // }
  }
 ?>
