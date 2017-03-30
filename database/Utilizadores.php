<?php

class Utilizadores {

  // insert user
  function insert($username, $pass) {
    global $dbh, $schema;
    try {
      $sql = "INSERT INTO $schema.utilizador (username, password, tipo) VALUES (?, ?, 3)";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($username, md5($pass)));
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $errmsg = $e->getMessage();
      // parse errmsg
      if (strpos($errmsg, 'users_pkey')) 
	$errors["uuser"] = "Login Repetido!";
      else
	$errors["generic"] = "ERRO[34]: ".$errmsg;
      return $errors;
    }
  }
	
  // delete user
  function delete($username) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("DELETE FROM $schema.utilizador WHERE username = :user");
      $stmt->bindParam(':user', $username);
      $stmt->execute();
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[35]: ".$e->getMessage();
      header("Location: ../principal/listar_tudo.php");
      die;
    }
  }

  function update($username, $nome, $instituicao, $email, $permicoes, $morada, $telemovel, $titulo, $gabinete, $password) {
    global $dbh, $schema;
    try {
		if ($password == "**********"){
		  $sql = "UPDATE $schema.utilizador SET nome = ?, instituicao = ?,email = ?, tipo = ?,morada = ?, telemovel = ?,titulo = ?, gabinete = ? WHERE username = ?";
		  $stmt = $dbh->prepare($sql);
		  $stmt->execute(array($nome, $instituicao, $email, $permicoes, $morada, $telemovel, $titulo, $gabinete, $username));
	  }else{
		  $sql = "UPDATE $schema.utilizador SET nome = ?, instituicao = ?, email = ?, tipo = ?, morada = ?, telemovel = ?, titulo = ?, gabinete = ?, password = ? WHERE username = ?";
		  $stmt = $dbh->prepare($sql);
		  $stmt->execute(array($nome, $instituicao, $email, $permicoes, $morada, $telemovel, $titulo, $gabinete, md5($password), $username));
	  }
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      return false;
    }
    return true;
  }
	
  function getUser($username) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT * FROM $schema.utilizador WHERE username = :user");
      $stmt->bindParam(':user', $username);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[32]: ".$e->getMessage();
      header("Location: ../principal/listar_tudo.php");
      die;
    }
  }

  function getType($username){
	  global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT tipo FROM $schema.utilizador WHERE username = :user");
      $stmt->bindParam(':user', $username);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result['tipo'];
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[32]: ".$e->getMessage();
      header("Location: list.php");
      die;
    }
  }
  
  function getName($username){
	 global $dbh, $schema;
	 try{
		 $stmt = $dbh->prepare("SELECT nome FROM $schema.utilizador WHERE username = :user");
		  $stmt->bindParam(':user', $username);
		  $stmt->execute();
		  // get next row as an array indexed by column name
		  $result = $stmt->fetch(PDO::FETCH_ASSOC);
		  return $result['nome'];
		 
	 }
	  catch(PDOException $e) {
	  $_SESSION["s_errors"]["generic"][] = "ERRO[32]: ".$e->getMessage();
	  header("Location: list.php");
	  die;
	 }
  }

  function getPerm($tipo){
	  switch ($tipo){
		  case 1: return 'Administrador';
		  case 2: return 'Docente';
		  case 3: return 'Monitor';
	  }
  }
	
	// get all tuples of users
  function getAll() {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT * FROM $schema.utilizador WHERE tipo != 0");
      $stmt->execute();
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[31]: ".$e->getMessage();
      header("Location: ../main/index.php");
      die;
    }
  }	
	
  // authenticate user
  function existsUsernamePassword($username, $password) {
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("SELECT * FROM $schema.utilizador WHERE username = :user");
      $stmt->bindParam(':user', $username);
      $stmt->execute();
      // get next row as an array indexed by column name
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($result["username"] != $username)
		return false;
      if ($result["password"] == md5($password)) 
		return true;
      else 
		return false;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO[36]: ".$e->getMessage();
      
      echo $e->getMessage();
      //header("Location: list.php");
      die;
    }
  }

}
 
?>
