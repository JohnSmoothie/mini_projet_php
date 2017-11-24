<?php

require 'controleurAuthentification.php';

class Routeur
{
    private $ctrlAuthentification;

    public function __construct()
    {
        $this->ctrlAuthentification = new ControleurAuthentification();
    }

    // Traite une requête entrante
    public function routerRequete()
    {
        if (isset($_POST["login"]) && isset($_POST["pwd"])) {
            $this->ctrlAuthentification->authentification($_POST['login'], $_POST['pwd']);
        } else {
            $this->ctrlAuthentification->accueil();
        }
    }
}

?>
