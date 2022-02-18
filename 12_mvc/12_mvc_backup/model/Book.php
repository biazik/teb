<?php
class Book{
  public $title, $author, $description;
  public function __construct($pTitle, $pAuthor, $pdescription){
    $this->title=$pTitle;
    $this->author=$pAuthor;
    $this->description=$pdescription;
  }
}
 ?>
