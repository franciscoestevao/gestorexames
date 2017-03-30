<?php
require_once('../includes/base.php');
require_once('../database/Perguntas.php');
require_once('../database/Exames.php');

if (!isset($s_user)){
	$Message="Tem que se autenticar primeiro!";
	header("Location: ../principal/startpage.php?Message=" . urlencode($Message));
}

if ($s_type < 2){
	$Message="Não tem permissões!";
	header("Location: ../principal/mainpage.php?Message=" . urlencode($Message));
}

$eid = $_GET["id"];

$perguntas = Perguntas::getAll();


$smarty->assign("perguntas", $perguntas);
$smarty->assign("eid", $eid);
$smarty->display('exames/add_pergunta.tpl');
?>
