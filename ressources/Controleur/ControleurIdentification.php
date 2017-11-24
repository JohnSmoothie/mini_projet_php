<?php
require_once PATH_VUE."/authentification.php";


class ControleurIdentification{

private $vue;
//private $modele;


function __construct(){
$this->vue=new Authentification();
//$this->modele=new Modele();

}

function accueil(){
  $this->vue->afficherPage();
}

function authentification($pseudo) {

}

//function message($pseudo){
  //if($this->modele->exists($pseudo)){
    //$tabResult=$this->modele->get10RecentMessage();
    //$this->vue->afficherMassages($tabResult);
//  } else {
  //  $this->ctrlAuthentification->accueil();
  //}
//}

//function nouvMessage($message){
  //$this->modele->majSalon($_COOKIE['cookiePseudo'], $message);
  //$tabResult=$this->modele->get10RecentMessage();
  //$this->vue->afficherMassages($tabResult);
}



}
