<?php
class Book{
  public $title, $author, $description;
  public function __construct($pTitle, $pAuthor, $pDescription){
    $this->title=$pTitle;
    $this->author=$pAuthor;
    $this->description=$pDescription;
    echo "kutas";
  }
}
 ?>
