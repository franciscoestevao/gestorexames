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
// store user input values
$_SESSION["s_values"] = $_POST;

// check parameters
if ($_POST["username"] == "")
  $_SESSION["s_errors"]["username"] = 'O login não pode ser vazio';

if ($_POST["password"] == "")
  $_SESSION["s_errors"]["password"] = 'A password não pode ser vazio';

if ($_POST["password"] != $_POST["password2"])
  $_SESSION["s_errors"]["password"] = 'As passwords não coincidem';


//~ if ($_SESSION["s_errors"]) {
    //~ /* fazer popup */
 //~ //    echo "<script type='text/javascript'>alert('olá');</script>"; //devia funcionar!
 //~ msg(1, error, "erro");

  //~ header("Location: ../principal/criar.php");
  //~ die;
//~ }

$username = $_POST["username"];
$password = $_POST["password"];

$errors = Utilizadores::insert($username, $password);

if ($errors) {
  $_SESSION["s_errors"] = $errors;
  header("Location: ../principal/criar.php");
}
else {
  $_SESSION["s_messages"][] = "Utilizador criado com sucesso";
  header("Location: ../principal/editar.php?username=".$username);
}

?>
