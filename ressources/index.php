<?php

require "config/config.php";
require PATH_VUE."/Jeux.php";
require PATH_CONTROLEUR."/routeur.php";

if(isset($_POST['login'])) {
  setCookie("cookiePseudo", $_POST['login']);
}

//$routeur=new Routeur();
$jeux=new Jeux();
$jeux->afficherPage();
//$routeur->routerRequete();

?>
