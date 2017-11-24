<?php
require_once PATH_VUE . "/authentification.php";
require_once PATH_MODELE . "/crypt.php";


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
        if()
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
