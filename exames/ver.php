<?php
require_once('../includes/base.php');
require_once('../database/Exames.php');
require_once('../database/Perguntas.php');

if (!isset($s_user)){
	$Message="Tem que se autenticar primeiro!";
	header("Location: ../principal/startpage.php?Message=" . urlencode($Message));
}

if ($s_type < 2){
	$Message="Não tem permissões!";
	header("Location: ../principal/mainpage.php?Message=" . urlencode($Message));
}

	$id = $_GET["id"];
    $exame = Exames::getAllFromExame($id);

	

    if ($exame == null) {
        $_SESSION["s_errors"]= 'Este exame não tem perguntas!';
		header("Location: ../exames/meusexames.php?Message=" . urlencode($_SESSION["s_errors"]));
    }



    $smarty->assign("exame", $exame);
    $smarty->assign("eid", $id);
    $smarty->display('exames/ver.tpl');

?>
