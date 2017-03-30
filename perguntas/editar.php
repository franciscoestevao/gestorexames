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
$id = $_GET["id"];

if ($type == null) {
  $_SESSION["s_errors"]["generic"][] = 'Erro a identificar tipo de pergunta';
  header("Location: ../perguntas/minhasperguntas.php");
}

if($type == "Grupo") {
    $grupo = Perguntas::getGroup($id);
    
    if ($grupo == null) {
        $_SESSION["s_errors"]["generic"][] = 'Erro a ver grupo';
        header("Location: ../perguntas/minhasperguntas.php");
    }
    $smarty->assign("type", $type);
    $smarty->assign("grupo", $grupo);
    $smarty->display('perguntas/editarGrupo.tpl');
}
else {
    $pergunta = Perguntas::getPergunta($id);
    
     if ($pergunta == null) {
        $_SESSION["s_errors"]["generic"][] = 'Erro a ver pergunta';
        header("Location: ../perguntas/minhasperguntas.php");
    }
    $type = Perguntas::getQtype($id);
    if($type == "Multipla"){
        $reutilizaveis = Perguntas::getReut($id);
        $smarty->assign("reutilizaveis", $reutilizaveis);
    }
    
    $smarty->assign("type", $type);
    $smarty->assign("pergunta", $pergunta);
    $smarty->display('perguntas/editarPerg.tpl');
}
?>
