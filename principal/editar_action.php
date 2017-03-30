<?php

require_once('../includes/base.php');
require_once('../database/Utilizadores.php');

if (!isset($s_user)){
	$Message="Tem que se autenticar primeiro!";
	header("Location: ../principal/startpage.php?Message=" . urlencode($Message));
}

if ($s_type > 1){
	$Message="Não tem permissões!";
	header("Location: ../principal/mainpage.php?Message=" . urlencode($Message));
}

if ($_POST["password"] != $_POST["password2"]){
	echo "<script> alert('Passwords nao coincidem!'); </script>";
}

// store user input values
$_SESSION["s_values"] = $_POST;

$username = $_POST["username"];
$nome = $_POST["nome"];
$instituicao= $_POST["instituicao"];
$email= $_POST["email"];
$permicoes= $_POST["tipo"];
$morada= $_POST["morada"];
$telemovel= $_POST["telemovel"];
$titulo= $_POST["titulo"];
$gabinete= $_POST["gabinete"];
$password=$_POST["password"];


if (Utilizadores::update($username, $nome, $instituicao, $email, $permicoes, $morada, $telemovel, $titulo, $gabinete, $password)){
  $_SESSION["s_messages"][] = "Utilizador alterado com sucesso";
  header("Location: ../principal/ver.php?username=" . $username);
}
else{
  $_SESSION["s_messages"][] = "Erro a alterar o Utilizador";
  header("Location: ../principal/editar.php?username=" . $username);
}
	

?>
