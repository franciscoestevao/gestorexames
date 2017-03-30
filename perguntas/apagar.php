<?php
require_once('../includes/base.php');
require_once('../database/Perguntas.php');

if (!isset($s_user)){
	$Message="Tem que se autenticar primeiro!";
	header("Location: ../principal/startpage.php?Message=" . urlencode($Message));
}

if ($s_type < 2){
	$Message="Não tem permissões!";
	header("Location: ../principal/mainpage.php?Message=" . urlencode($Message));
}

if($_GET["type"] == "Grupo")
{
	//~ ver grupo
	$smarty->assign("gid" ,$_GET["id"]);
	$smarty->display('perguntas/apagarG.tpl');
	die;
}
 //~ ver pergunta
$smarty->assign("pid", $_GET["id"]);

$smarty->display('perguntas/apagarP.tpl');
?>
