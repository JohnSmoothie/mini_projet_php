<?php

session_start();

require_once 'config/config.php';
require_once PATH_CONTROLEUR . 'routeur.php';
require_once PATH_CONTROLEUR . 'ControleurAuthentification.php';
require_once PATH_CONTROLEUR . 'ControleurPartie.php';
require_once PATH_MODELE . 'ModeleBase.php';
require_once PATH_MODELE . 'ModelePartie.php';

$routeur = new Routeur();
$routeur->routerRequete();