<?php

require_once PATH_VUE . "/authentification.php";

class ControleurAuthentification
{
    private $vue;

    function __construct()
    {
        $this->vue = new Authentification();
    }

    function accueil()
    {
        $this->vue->afficherPage();
    }

    function authentification($login, $pwd) {
        $toto_salt = '$6$VsDCW/kqInRv$/bkDT4rmkNLGo704srZE1riI4u7IUUcSuuEqrdkeBJ.3RcsnEO.ihAnWvIWJ0fSoP3hVa/OpWTbhi50xQhzEk1';
       // $titi_crypte = crypt('titi');

        if (crypt($login, $toto_salt) == $pwd) {
            echo "Vous êtes identifié !";
            ?><meta http-equiv="Location" content="../Vue/test.html"><?php
        } else {
            echo "Mot de passe incorrect !";
            ?><meta http-equiv="Location" content="../index.php"><?php
        }
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
//}


}

?>
