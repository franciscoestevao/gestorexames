<?php
require_once('../includes/base.php');
require_once('../database/Utilizadores.php');

$user = Utilizadores::getUser($_GET["username"]);

if ($s_type > 1){
	$Message="Não tem permissões!";
	header("Location: ../principal/mainpage.php?Message=" . urlencode($Message));
}

if ($user == null) {
  $_SESSION["s_errors"]["generic"][] = 'O utilizador '.$_GET["username"].' não existe!';
  header("Location: ../principal/listar_tudo.php");
}

$smarty->assign("user", $user);

$smarty->display('principal/ver.tpl');
?>
