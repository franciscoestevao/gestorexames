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

$id = $_GET["id"];
print_r($id);
$errors = Exames::delete($id);

if ($errors) {
  $_SESSION["s_errors"]["generic"][] = $errors;
  echo "$errors";
  header("Location: ../exames/ver.php?id=".$id);
}
else {
  $Message="Exame removido com sucesso!";
  echo "$errors";
  header("Location: ../exames/meusexames.php?Message=" . urlencode($Message));
}
