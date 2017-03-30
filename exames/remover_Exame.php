<?php

require_once('../includes/base.php');
require_once('../database/Exame.php');
require_once('../database/Perguntas.php');

if (!isset($s_user)){
	$Message="Tem que se autenticar primeiro!";
	header("Location: ../principal/startpage.php?Message=" . urlencode($Message));
}

if ($s_type < 2){
	$Message="Não tem permissões!";
	header("Location: ../principal/mainpage.php?Message=" . urlencode($Message));
}

  Perguntas::remFromExame($_GET["id"], $_GET["type"] );

	
  header("Location: ../exames/meus");

?>