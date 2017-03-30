<?php

function transpose($array) {
		array_unshift($array, null);
		return call_user_func_array('array_map', $array);
	}

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


// store user input values
$_SESSION["s_values"] = $_POST;
$eid = $_POST["eid"];
$datauso = $_POST["datauso"];
$duracao = $_POST["duracao"];

$sala = $_POST["sala"];
$gid = $_POST["gid"];
$ordem = $_POST["ordem"];
$cotacao = $_POST["cotacao"];
Exames::updatePergs($eid, transpose(array($gid, $ordem, $cotacao)));
//~ Exames::updatePergs($eid, array($gid, $ordem));
$editavel = Exames::getedit($eid);

if(!isset($datauso))
	$datauso == NULL;
if(!isset($duracao))
	$duracao == NULL;
if (!isset($sala) == NULL) {
	$sala == NULL;
}


$editavel=$editavel[0]["editavel"];


if ($editavel==1){
	if (Exames::update($id, $datauso, $duracao, $sala)){
	  $_SESSION["s_messages"][] = "Exame editado com sucesso";
	  header("Location: ../exames/ver.php?id=" . $eid);
	}
	else {
	  $_SESSION["s_messages"][] = "Erro a editar o exame";
	  print_r("$id, $datauso, $duracao, $sala");
	  header("Location: ../exames/editar.php?id=" . $eid);
	}
}

else{
	if (Exames::update($id, $datauso, $duracao, $sala)){
	  $_SESSION["s_messages"][] = "Exame editado com sucesso";
	  header("Location: ../exames/ver.php?id=" . $eid);
	}
	else{
	  $_SESSION["s_messages"][] = "Erro a editar o exame";
	  header("Location: ../exames/editar.php?id=" . $eid);
	}
}
	
?>
