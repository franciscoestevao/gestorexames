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


$type = $_POST["type"];
$text = nl2br($_POST["text"]);
$gid  = $_POST["gid"];

if ($gid != 0)
	$tema = "0";
else
	$tema = $_POST["tema"];

$pid = Perguntas::insertQuestion($gid, $tema, $text, $type, $s_user, 0);
if ($pid == 0) {
$_SESSION["s_messages"][] = "Nao conseguiu criar pergunta/grupo";
  //~echo "NOT OK";
  header("Location: ../perguntas/criar.php");
}else{
  $_SESSION["s_messages"][] = "Pergunta/Grupo criada/o com sucesso";
  //~ echo "OK";
  if ($type == "Descricao")
	header("Location: ../perguntas/minhasperguntas.php");
  else
	header("Location: ../perguntas/editar.php?id=" . $pid . "&type=" . $type);

}

?>

