<?php

session_start();
$_SESSION['partie'] = null;
header('Location: ../index.php');

?>