<?php

require 'controleurAuthentification.php';

class Routeur
{
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
