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

	$pid = $_GET["pid"];
	$oid = $_GET["oid"];
	
	Perguntas::copyOption($pid, $oid, $pid);
	
	header("Location: ../perguntas/editar.php?id=" . $pid . "&type=Pergunta");

?>
