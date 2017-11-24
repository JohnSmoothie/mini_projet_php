<?php

require PATH_VUE . "/authentification.php";
require PATH_VUE . "/test.php";

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
        if($login == 'toto' && $pwd == 'toto') {
            $this->vue = new Test();
            $this->vue->afficherPage();
        }
        else {
            $this->vue->afficherPage();
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
