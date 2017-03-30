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


$eid = $_POST["id"];

if(!empty($_POST['check_list'])) {
    foreach($_POST['check_list'] as $check) {
            Exames::insertQinE($check, $eid);
    }
}

echo "

<script>
				window.confirm('As perguntas foram adicionadas com sucesso!');
				window.opener.location.href='editar.php?id={$eid}';
				self.close();
		
		</script>

";

?>

