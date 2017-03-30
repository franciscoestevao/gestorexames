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

Exames::export($_GET["id"]);
$Message="Exame exportado com successo!";
header("Location: ../exames/meusexames.php?Message=" . urlencode($Message));
die;


?>
