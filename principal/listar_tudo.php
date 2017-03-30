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
$users = Utilizadores::getAll();

$smarty->assign("users", $users);
$smarty->display('principal/listar_tudo.tpl');
?>
