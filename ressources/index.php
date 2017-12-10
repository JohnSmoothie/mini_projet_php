<?php

require_once 'config/config.php';
require_once PATH_CONTROLEUR . 'routeur.php';

session_start();

$routeur = new Routeur();
$routeur->routerRequete();
