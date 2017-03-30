<?php
	require_once('../includes/base.php');
	require_once('../database/Perguntas.php');

	if (!isset($s_user)){
		$Message="Tem que se autenticar primeiro!";
		header("Location: ../principal/startpage.php?Message=" . urlencode($Message));
	}

	if ($s_type > 2){
		$Message="Não tem permissões!";
		header("Location: ../principal/mainpage.php?Message=" . urlencode($Message));
	}
	$perguntas = Perguntas::getAllFromUser($s_user);

	$smarty->assign("perguntas", $perguntas);
	$smarty->display('perguntas/minhasperguntas.tpl');
?>
