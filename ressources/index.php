<?php

require "config/config.php";
require PATH_VUE."/Jeux.php";
require PATH_CONTROLEUR."/routeur.php";

<<<<<<< HEAD
if(isset($_POST['login'])) {
  setCookie("cookiePseudo", $_POST['login']);
}

//$routeur=new Routeur();
$jeux=new Jeux();
$jeux->afficherPage();
//$routeur->routerRequete();
=======
$routeur=new Routeur();
$routeur->routerRequete();
>>>>>>> 58257ceae04a44d7b460e549f3cc78c2a56c5c4c

?>
