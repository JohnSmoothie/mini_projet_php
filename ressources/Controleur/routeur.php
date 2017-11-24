<?php

require_once 'controleurAuthentification.php';
require_once "modele/modele.php";

class Routeur {

  private $ctrlAuthentification;
  private $modele;



  public function __construct(){
    $this->ctrlAuthentification= new ControleurAuthentification();
    $this->modele = new Modele();

  }

  // Traite une requête entrante
  public function routerRequete(){
    if(isset($_POST['pseudo'])){
      $this->ctrlAuthentification->message($_POST['pseudo']);
    }else if(isset($_POST['message'])) {
      $this->ctrlAuthentification->nouvMessage($_POST['message']);
    } else {
      $this->ctrlAuthentification->accueil();
    }


 }
}
?>
