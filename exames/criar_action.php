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

$disciplina = $_POST["disciplina"];

$id = Exames::insert($disciplina, $s_user);

if ( $id==0 ){
$_SESSION["s_messages"][] = "Nao conseguiu criar exame";
  //~ echo "NOT OK";
  header("Location: ../exames/criar.php");
}else{
  $_SESSION["s_messages"][] = "Exame criado com sucesso";
  //~ echo "OK";
  header("Location: ../exames/editar.php?id =". $id);
}

?>

