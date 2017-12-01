<?php

  setCookie("login", $_POST['login']);
  setCookie("password", $_POST['password']);

  require "config/config.php";
  require PATH_CONTROLEUR."/routeur.php";

  $routeur=new Routeur();
  $routeur->routerRequete();

?>
