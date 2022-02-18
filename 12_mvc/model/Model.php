<?php
  require_once 'Book.php';
  class Model{
    public function getBookDetails(){
      require_once './controller/connect.php';
      $sql="SELECT * FROM `book`";
      $result=$con->query($sql);
      // var_dump($result->fetch_assoc());
      // $data=mysqli_fetch_array($result, MYSQL_ASSOC);
      // var_dump($data);
      // return array(
      //   "test1" => new Book($data['title'], $data['author'])
      // );
      $showDBBooks = array();
      while ($row = $result->fetch_assoc()) {
        $showDBBooks[] = new Book($row['title'], $row['author'], $row['description']);
      }
      return $showDBBooks;
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
