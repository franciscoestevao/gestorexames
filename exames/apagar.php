<?php

require_once('../includes/base.php');
require_once('../database/Exames.php');

if (!isset($s_user)){
	$Message="Tem que se autenticar primeiro!";
	header("Location: ../principal/startpage.php?Message=" . urlencode($Message));
}

if ($s_type < 2){
	$Message="Não tem permissões!";
	header("Location: ../principal/mainpage.php?Message=" . urlencode($Message));
}

$exame = $_GET["id"];


$smarty->assign("exame", $exame);

$smarty->display('exames/apagar.tpl');
?>
