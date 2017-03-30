<?php

class Exames {

	function remFromExame($id, $type){
		if ($type != "Grupo"){
			try {
				$stmt = $dbh->prepare("SELECT pertence FROM $schema.pergunta WHERE id = :id");
				$stmt->bindParam(':id', $id);
				$stmt->execute();
				//~ $gid = $stmt->fetchall(PDO::FETCH_ASSOC)[0]["pertence"];
				$result = $stmt->fetchall(PDO::FETCH_ASSOC);
				$gid = $result[0]["pertence"];
			}
			catch(PDOException $e) {
				$_SESSION["s_errors"]["generic"][] = "ERRO[2]: ".$e->getMessage();

				echo $e->getMessage();
				die;
			}
		}
		else
			$gid = $id;
		
		try {
			$stmt = $dbh->prepare("DELETE FROM $schema.examegrupo WHERE grupo=:id");
			$stmt->bindParam(':id', $gid);
			$stmt->execute();
		}
		catch(PDOException $e) {
			echo $e->getMessage();
			die;
		}
		
	}

  // delete user
  function delete($id) {
    global $dbh, $schema;
    try {

      $stmt = $dbh->prepare("SELECT eg.grupo as egid FROM $schema.exame e, $schema.examegrupo eg WHERE eg.exame = e.id AND e.id=:id");
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      $exame = $stmt->fetchall(PDO::FETCH_ASSOC);
    }

    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO_Exame[1.1]: ".$e->getMessage();
      echo $e->getMessage();
      die;
    }
      // get array containing all of the result set rows
      
      if ($stmt->rowCount() != 0) {

        foreach ($exame as &$exame) 
        {

          Exames::deleteOption($id, $exame['egid']);
        }
      }
    try {
      $stmt = $dbh->prepare("DELETE FROM $schema.exame WHERE id = :id");
      $stmt->bindParam(':id', $id);
      $stmt->execute();
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO_EXAME[1.2]: ".$e->getMessage();
      print_r("$e");
      header("Location: ../exames/meusexames.php");
      die;
    }
  }

  function deleteOption($eid, $gid){
    global $dbh, $schema;
    try {
      $stmt = $dbh->prepare("DELETE FROM $schema.examegrupo WHERE exame = ? AND grupo = ?");
      $stmt->execute(array($eid, $gid));
      $stmt->execute();
    }
    catch(PDOException $e) {
      echo $e->getMessage();
      die;
    }

  }

// update news tuple
  function update($id, $datauso, $duracao, $sala) {
  	 global $dbh, $schema;

  	$sql = "UPDATE $schema.exame SET ";

  	if (!empty($sala))
  		$sql .= "sala=$sala, ";
  	else
  		$sql .= "sala=NULL, ";

  	if (!empty($datauso))
  		$sql .= "datauso=$datauso, ";
  	else
  		$sql .= "datauso=NULL, ";

  	if (!empty($duracao))
  		$sql .= "duracao=$duracao ";
  	else
  		$sql .= "duracao=NULL ";

  	$sql .= "WHERE id=:id";

   
    try {

      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      //$count = $stmt->rowCount();
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO_EXAME[2]: ".$e->getMessage();
      echo $e->getMessage();

      return false;
    }
    return true;
  }

  // insert user
  function insert($disciplina, $criador) {
    global $dbh, $schema;
    try {
      $sql = "INSERT INTO $schema.exame (id, disciplina, datacria, criador) VALUES (DEFAULT, ?, DEFAULT, ?)";
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($disciplina, $criador));
      $sql = "SELECT currval('$schema.exame_id_seq'::regclass)";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $eid = $stmt->fetchall(PDO::FETCH_ASSOC)[0]["currval"];
      //$count = $stmt->rowCount();
      return $eid;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO_EXAME[3]: ".$e->getMessage();
      echo $e->getMessage();
      // die;
      return 0;
    }

  }

  // get all tuples with the name of the author
  function getAllFromUser($username) {
    global $dbh, $schema;
    try {
      // using prepared statements will help protect you from SQL injection
      $stmt = $dbh->prepare("SELECT * FROM $schema.exame WHERE criador = :user ORDER BY datacria");
      $stmt->bindParam(':user', $username);
      $stmt->execute();
      // get array containing all of the result set rows 
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO_EXAME[4]: ".$e->getMessage();
      header("Location: ../principal/mainpage.php");
      die;
     }
  }

  // get all tuples
  function getAll() {
    global $dbh, $schema;
    try {
      // using prepared statements will help protect you from SQL injection
      $stmt = $dbh->prepare("SELECT e.* FROM $schema.exame e ORDER BY datacria");
      $stmt->execute();
      // get array containing all of the result set rows 
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO_EXAME[5]: ".$e->getMessage();
      header("Location: ../principal/mainpage.php");
      die;
     }
  }
  
  function getAllFromExame($eid) {
    global $dbh, $schema;
    
     // using prepared statements will help protect you from SQL injection
   $sql = "SELECT e.id AS eid, e.disciplina, e.sala, e.duracao, e.datauso, ";
   $sql .= "g.id AS gid, p.id AS pid, p.texto, ";
   $sql .= "a.resposta, o.id AS oid, o.texto AS opcao ";
   $sql .= "FROM $schema.exame e ";
   $sql .= "JOIN $schema.examegrupo eg ON e.id = eg.exame ";  
   $sql .= "JOIN $schema.grupo g ON eg.grupo = g.id ";  
   $sql .= "FULL JOIN $schema.pergunta p ON g.id=p.pertence ";
   $sql .= "FULL JOIN $schema.aberta a ON p.id = a.isa ";
   $sql .= "FULL JOIN $schema.multipla m ON p.id = m.isa ";
   $sql .= "FULL JOIN $schema.descricao d ON p.id = d.isa ";
   $sql .= "FULL JOIN $schema.opcaomulti om ON p.id=om.multi ";
   $sql .= "FULL JOIN $schema.opcao o ON om.opcao=o.id ";
   $sql .= "WHERE e.id = :id ";
   $sql .= "ORDER BY eg.ordem";
     try {
     $stmt = $dbh->prepare($sql);
     $stmt->bindParam(':id', $eid);
     $stmt->execute();
     // get array containing all of the result set rows 
     $result = $stmt->fetchall(PDO::FETCH_ASSOC);
     return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO_EXAME[6]: ".$e->getMessage();
      header("Location: ../principal/mainpage.php");
      die;
     }
}

    function getbyid_basic($eid) {
    global $dbh, $schema;
    
     // using prepared statements will help protect you from SQL injection
	   $sql = "SELECT e.id AS eid, e.disciplina, e.sala, e.duracao, e.datauso ";
	   $sql .= "FROM $schema.exame e ";
	   $sql .= "WHERE e.id = :id ";
     try {
     $stmt = $dbh->prepare($sql);
     $stmt->bindParam(':id', $eid);
     $stmt->execute();
     // get array containing all of the result set rows 
     $result = $stmt->fetchall(PDO::FETCH_ASSOC);
     return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO_EXAME[6]: ".$e->getMessage();
      echo $e->getMessage();
      die;
     }
  }
  
	function getedit($eid) {
		
		global $dbh, $schema;
    
		 // using prepared statements will help protect you from SQL injection
		   $sql = "SELECT editavel ";
		   $sql .= "FROM $schema.exame ";
		   $sql .= "WHERE id = :id ";
		 try {
		 $stmt = $dbh->prepare($sql);
		 $stmt->bindParam(':id', $eid);
		 $stmt->execute();
		 // get array containing all of the result set rows 
		 $result = $stmt->fetchall(PDO::FETCH_ASSOC);
		 return $result;
		}
		catch(PDOException $e) {
		  $_SESSION["s_errors"]["generic"][] = "ERRO_EXAME[6]: ".$e->getMessage();
		  echo $e->getMessage();
		  die;
		 }
		
		
	}


    function getbyid($eid) {
    global $dbh, $schema;
    
     // using prepared statements will help protect you from SQL injection
	   $sql = "SELECT DISTINCT ON (gid) e.id AS eid, e.disciplina, e.sala, e.duracao, e.datauso, ";
	   $sql .= "g.id AS gid, p.id AS pid, p.texto, p.datacria AS pdata, p.baseada, p.revisao, ";
	   $sql .= "eg.cotacao, eg.ordem ";
	   $sql .= "FROM $schema.exame e ";
	   $sql .= "FULL JOIN $schema.examegrupo eg ON e.id = eg.exame ";  
	   $sql .= "FULL JOIN $schema.grupo g ON eg.grupo = g.id ";  
	   $sql .= "FULL JOIN $schema.pergunta p ON g.id=p.pertence ";
	   $sql .= "WHERE e.id = :id ";
     try {
     $stmt = $dbh->prepare($sql);
     $stmt->bindParam(':id', $eid);
     $stmt->execute();
     // get array containing all of the result set rows 
     $result = $stmt->fetchall(PDO::FETCH_ASSOC);
     return $result;
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO_EXAME[6]: ".$e->getMessage();
      echo $e->getMessage();
      die;
     }
  }
  
  function insertQinE($pid, $eid){
	  global $dbh, $schema;
		try {
		  $sql = "INSERT INTO $schema.examegrupo (exame, grupo) VALUES (?, ?)";
		  $stmt = $dbh->prepare($sql);
		  $stmt->execute(array($eid, $pid));
		  return true;
		}
		catch(PDOException $e) {
		  $_SESSION["s_errors"]["generic"][] = "ERRO_EXAME[3]: ".$e->getMessage();
		  echo $e->getMessage();
		  die;
		}
  }

  function export($eid) {
    global $dbh, $schema;
    try{
      $stmt = $dbh->prepare("UPDATE $schema.exame SET editavel = FALSE, dataexport = now() WHERE id =:eid");
      $stmt->bindParam(':eid', $eid);
      $stmt->execute();
    }
    catch(PDOException $e) {
      $_SESSION["s_errors"]["generic"][] = "ERRO_EXAME[7]: ".$e->getMessage();
      echo $e->getMessage();
      // header("Location: ../principal/mainpage.php");
      //return false;
      die;
     }
  }

  function myTruncate($string, $limit, $break=" ", $pad="..."){

    // return with no change if string is shorter than $limit
    if(strlen($string) <= $limit) return $string;

    // is $break present between $limit and the end of the string?
    if(false !== ($breakpoint = strpos($string, $break, $limit))) {
      if($breakpoint < strlen($string) - 1)
        $string = substr($string, 0, $breakpoint) . $pad;

      return $string;
    }
  }
   
	function updatePergs($eid, $grups){
		global $dbh, $schema;

		$sql = "UPDATE $schema.examegrupo AS eg SET cotacao=c.cot, ordem=c.ord from (values";
		foreach ($grups as &$grup)
			$sql .= " (" . $grup["0"] . "," . $grup["1"] . "," .  $grup["2"] . "),";
		$sql = rtrim($sql, ",") . ") AS c(grupo, ord, cot) WHERE eg.exame = :id AND c.grupo=eg.grupo";

		try {
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':id', $eid);
			$stmt->execute();
		}catch(PDOException $e) {
			echo $e->getMessage();
			die;
		}
	
		return true;
	}

} /*** end of class ***/

?>
