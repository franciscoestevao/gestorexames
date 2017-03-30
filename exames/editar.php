<?php
require_once('../includes/base.php');
require_once('../database/Exames.php');
require_once('../database/Perguntas.php');

if (!isset($s_user)){
	$Message="Tem que se autenticar primeiro!";
	header("Location: ../principal/startpage.php?Message=" . urlencode($Message));
}

if ($s_type < 2){
	$Message="Não tem permissões!";
	header("Location: ../principal/mainpage.php?Message=" . urlencode($Message));
}

$id = $_GET["id"];
$exame = Exames::getbyid($id);


if ($exame == null) {
	
	$exame = Exames::getbyid_basic($id);
	if ($exame == null){
		  $_SESSION["s_errors"]["generic"][] = 'O exame não existe!';
		  header("Location: ../exames/meusexames.php");
		  die;
	}
}

$smarty->assign("exame", $exame);
$smarty->assign("id", $id);
$smarty->display('exames/editar.tpl');

?>
