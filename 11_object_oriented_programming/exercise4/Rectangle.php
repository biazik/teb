<?php
class Animal{
  public $masa, $wiek, $patrz, $oddychaj;
}
class Ryba extends Animal{
  public $płyń;
}
class Ssak extends Animal{
  private $biegnij;
  public function getProtectedSsak(){
    return $this->biegnij;  }
}
class Ptak extends Animal{
  public $leć;
}
class Pies_domowy extends Ssak{
  public $rasa, $kolor_sierści, $szczekaj, $aportuj;
}







$pies = new Pies_domowy();
$pies->rasa="Owczarek niemiecki";
$pies->szczekaj="False";
$pies->masa="30KG";
$pies->wiek="1 Rok";
$pies->biegnij="True";


echo "Dane o psiaku:<br>
Rasa: $pies->rasa<br>
Masa: $pies->masa<br>
Wiek: $pies->wiek<br>
Czy szczeka: $pies->szczekaj<br>
Czy biega $pies->biegnij";
 ?>
 <!-- Czy biega: $pies->getProtectedSsak()<br> -->
