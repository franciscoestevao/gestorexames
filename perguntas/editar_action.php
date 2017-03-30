<?php

	function transpose($array) {
		array_unshift($array, null);
		return call_user_func_array('array_map', $array);
	}

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

	$_SESSION["s_values"] = $_POST;

	$type	= $_GET["type"];
	$gid	= $_POST["gid"];
	$tema	= $_POST["tema"];
	
	Perguntas::updateGrupo($gid, $tema);
	
	if ($type == "Grupo"){
		header("Location: ../perguntas/verQuestao.php?id=" . $gid . "&type=" . $type);
		die;
	}
		
	$pid	= $_POST["pid"];
	$text	= nl2br($_POST["text"]);
	
	if (isset($_POST["revisao"]))
		$rev	= "TRUE";
	else
		$rev = "FALSE";


	Perguntas::updateDescricao($pid, $text, $rev);

	if ($type == "Aberta"){
		$resposta	= nl2br($_POST["resposta"]);
		$comentario	= nl2br($_POST["comentario"]);
		
		if (Perguntas::updateAberta($pid, $resposta, $comentario)){
			$_SESSION["s_messages"][] = "Utilizador alterado com sucesso";
			header("Location: ../perguntas/verQuestao.php?id=" . $pid . "&type=" . $type);
		}
	}

	else if ($type == "Multipla"){
		if (isset($_POST["selecaomultipla"]))
			$sel	= "TRUE";
		else
			$sel = "FALSE";
			
		$new = $_POST["new"];
		$oid = $_POST["oid"];
		$cotacao = $_POST["cotacao"];
		$reutilizavel = $_POST["reutilizavel"];
		$texto = $_POST["texto"];
		
		$opcoes=transpose(array($oid,$cotacao,$reutilizavel,$texto));
		Perguntas::updateMultipla($pid, $opcoes, $sel);
		Perguntas::insertOption($pid,$new);
		$_SESSION["s_messages"][] = "Utilizador alterado com sucesso";
		header("Location: ../perguntas/editar.php?id=" . $pid . "&type=" . $type);

	}
	
	header("Location: ../perguntas/verQuestao.php?id=" . $pid . "&type=" . $type);
?>
