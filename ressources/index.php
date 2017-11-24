<?php

require "config/config.php";
require PATH_CONTROLEUR."/routeur.php";

if(isset($_POST['login'])) {
  setCookie("cookiePseudo", $_POST['login']);
}

$routeur=new Routeur();
$routeur->routerRequete();

?>
