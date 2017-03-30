<?php

require_once('../includes/base.php');
require_once('../database/Utilizadores.php');

$username = $_POST["uuser"];
$password = $_POST["upass"];



if (Utilizadores::existsUsernamePassword($username, $password) && $username!="") {

  $_SESSION["s_messages"][] = 'Autenticação com sucesso';
  $_SESSION["s_user"] = $username;
  $_SESSION["s_type"] = Utilizadores::getType($username);
  $_SESSION["s_name"] = Utilizadores::getName($username);
  
  $Message="Bem-vindo!";
	header("Location: mainpage.php?Message=" . urlencode($Message));
    
    
	//$smarty->display('principal/mainpage.tpl');
	exit;
}

else{
	
	  // store user input values
	$_SESSION["s_values"] = $_POST;
	$_SESSION["s_errors"]["generic"][] = 'Username ou password errados!';
	
	$Message="Username e/ou Password errados!";
	header("Location: startpage.php?Message=" . urlencode($Message));
	exit;
}

?>
