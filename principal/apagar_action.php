<?php

require_once('../includes/base.php');
require_once('../database/Utilizadores.php');

if (!isset($s_user)){
	$Message="Tem que se autenticar primeiro!";
	header("Location: ../principal/startpage.php?Message=" . urlencode($Message));
}

if ($s_type > 1){
	$Message="Não tem permissões!";
	header("Location: ../principal/mainpage.php?Message=" . urlencode($Message));
}
$username = $_GET["username"];

$errors = Utilizadores::delete($username);

if ($errors) {
  $_SESSION["s_errors"]["generic"][] = $errors;
  header("Location: ../principal/ver.php?username=".$username);
}
else {
  $_SESSION["s_messages"][] = 'Utilizador '.$username.' removido com sucesso';
  header("Location: ../principal/listar_tudo.php");
}
