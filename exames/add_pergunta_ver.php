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

$type = $_GET["type"];
$smarty->assign("type", $type);

if ($type == null) {
  $_SESSION["s_errors"]["generic"][] = 'Erro a identificar tipo de pergunta';
  header("Location: ../principal/listar_tudo.php");
}

if($type == "Grupo") {
    $grupo = Perguntas::getGroup($_GET["id"]);

    if ($grupo == null) {
        $_SESSION["s_errors"]["generic"][] = 'Erro a ver grupo';
        header("Location: ../principal/listar_tudo.php");
    }
    $smarty->assign("grupo", $grupo);
    $smarty->display('perguntas/verGrupo.tpl');
}
else {
    $pergunta = Perguntas::getPergunta($_GET["id"]);


     if ($pergunta == null) {
        $_SESSION["s_errors"]["generic"][] = 'Erro a ver pergunta';
        header("Location: ../principal/listar_tudo.php");
    }

    $smarty->assign("pergunta", $pergunta);
    $smarty->display('exames/add_pergunta_ver.tpl');
}
?>
