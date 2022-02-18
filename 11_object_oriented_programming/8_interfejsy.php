<?php
interface PersonalInterface{
  public function getName();
  public function setName($name);
  public function getSurname();
  public function setSurname($surname);
  public function getAddress();
  public function setAddress($address);
}

  interface UserInterface{
    public function getLogin();
    public function setLogin($login);
  }

class Person implements PersonalInterface, UserInterface{
  public string $name="";
  public function getName(){
    return $this->name;
  }
  public function setName($name){
    $this->name=$name;
  }
  public function getSurname(){
    return $this->surname;
  }
  public function setSurname($surname){
    $this->surname=$surname;
  }
  public function getAddress(){
    return $this->address;
  }
  public function setAddress($address){
    $this->address=$address;
  }
  public function getLogin(){
    return $this->login;
  }
  public function setLogin($login){
    $this->login=$login;
  }

}

$nowak=new Person;
$nowak->name="Janusz";
echo $nowak->getName();
$nowak->setLogin('Tajny');
echo $nowak->getLogin();
 ?>
