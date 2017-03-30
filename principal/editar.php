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

//~ if ($s_values)
  //~ $user = $s_values;
//~ else
  $user = Utilizadores::getUser($_GET["username"]);

if ($user == null) {
  $_SESSION["s_errors"]["generic"][] = 'O utilizador '.$_GET["username"].' não existe!';
  header("Location: ../principal/listar_tudo.php");
  die;
}

// celar the password
$user["password"] = "**********";

$smarty->assign("user", $user);

$smarty->display('principal/editar.tpl');

?>
