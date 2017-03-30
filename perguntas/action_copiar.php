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

$type= $_GET['type'];
$gid = $_GET['gid'];

if ($type == "Grupo"){
	
	$id = Perguntas::copyGrupo($gid, $type, $s_user);
	
	$_SESSION["s_messages"][] = "Pergunta/Grupo criada/o com sucesso";
	header("Location: ../perguntas/editar.php?id=" . $id . "&type=" . $type);
	die;
}

$pid = $_GET['pid'];

$id = Perguntas::copyPergunta($pid, $gid, $type, $s_user);

$_SESSION["s_messages"][] = "Pergunta/Grupo criada/o com sucesso";
header("Location: ../perguntas/editar.php?id=" . $id . "&type=" . $type);

?>
