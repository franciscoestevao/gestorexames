<?php

class Perguntas{
	

	function getFirstOption($pid){
		global $dbh, $schema;
		$sql = "SELECT o.id AS oid ";
		$sql .= "FROM $schema.opcao o ";
		$sql .= "JOIN $schema.opcaomulti om ON o.id=om.opcao ";
		$sql .= "WHERE o.texto IS NULL AND om.multi=:id";
		
		try{
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':id',$pid);
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_ASSOC)["oid"];
			
		}catch(PDOException $e) {
			echo $e->getMessage();
			die;
		}
	}
	
	function insertOption($pid, $oid){
		if ($oid <0)
			return false;
		global $dbh, $schema;
		try {
			$dbh->beginTransaction();
			if ($oid == 0){
				$sql = "INSERT INTO $schema.opcao (id, texto, reutilizavel) VALUES (DEFAULT, DEFAULT, DEFAULT)";
				$stmt = $dbh->prepare($sql);
				$stmt->execute();
				$sql = "SELECT currval('$schema.opcao_id_seq'::regclass)";
				$stmt = $dbh->prepare($sql);
				$stmt->execute();
				$oid = $stmt->fetchall(PDO::FETCH_ASSOC)[0]["currval"];
			}

			$sql = "INSERT INTO $schema.opcaomulti (opcao, multi) VALUES (?, ?)";
			$stmt = $dbh->prepare($sql);
			$stmt->execute(array($oid, $pid));
			$dbh->commit();
			
		}catch(PDOException $e) {
			echo $e->getMessage();
			die;
		}
		return $oid;
	}

	function copyOption($from, $oid, $to){
		$option = Perguntas::getOption($from, $oid);
		if ($option["reutilizavel"] && $from!=$to){
			Perguntas::insertOption($to, $oid);
			return;
		}
		else
			$oid = Perguntas::insertOption($to,0);
			
		$opcao = array(array($oid,$option["cotacao"],"FALSE",$option["opcao"]));
		
		Perguntas::updateMultipla($to,$opcao,0);
	}
	
	function getOption($pid, $oid){
				global $dbh, $schema;
		$sql = "SELECT g.id AS gid, g.tema, g.criador, ";
		$sql .= "p.id AS pid, p.revisao, p.datacria, p.texto, ";
		$sql .= "a.resposta, a.comentario, ";
		$sql .= "m.selecaomultipla, om.cotacao, o.id AS oid, o.texto AS opcao, o.reutilizavel ";
		$sql .= "FROM $schema.grupo g ";
		$sql .= "FULL JOIN $schema.pergunta p ON g.id=p.pertence ";
		$sql .= "FULL JOIN $schema.aberta a ON p.id = a.isa ";
		$sql .= "FULL JOIN $schema.multipla m ON p.id = m.isa ";
		$sql .= "FULL JOIN $schema.descricao d ON p.id = d.isa ";
		$sql .= "FULL JOIN $schema.opcaomulti om ON p.id=om.multi ";
		$sql .= "FULL JOIN $schema.opcao o ON om.opcao=o.id ";
		$sql .= "WHERE p.id = ? AND o.id = ?" ;

		try {
			$stmt = $dbh->prepare($sql);
			$stmt->execute(array($pid, $oid));
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e) {
			$_SESSION["s_errors"]["generic"][] = "ERRO[8]: ".$e->getMessage();
			echo $e->getMessage();
			die;
		}
		
	}
	
	function deleteOption($oid, $pid){
		global $dbh, $schema;
		try {
			$dbh->beginTransaction();
			
			$stmt = $dbh->prepare("DELETE FROM $schema.opcaomulti WHERE multi = ? AND opcao = ?");
			$stmt->execute(array($pid, $oid));
			$stmt = $dbh->prepare("SELECT * FROM $schema.opcaomulti WHERE opcao = :id");
			$stmt->bindParam(':id', $oid);
			$stmt->execute();
			if ($stmt->rowCount() == 0){
				$stmt = $dbh->prepare("DELETE FROM $schema.opcao WHERE id = :id");
				$stmt->bindParam(':id', $oid);
				$stmt->execute();
			}
			
			$dbh->commit();
		}
		catch(PDOException $e) {
		echo $e->getMessage();

			die;
		}

	}

	function getReut($pid){
		global $dbh, $schema;		
		$sql = "SELECT DISTINCT ON (o.id) ";
		$sql .= "o.id AS oid, o.texto ";
		$sql .= "FROM $schema.opcao o ";
		$sql .= "JOIN $schema.opcaomulti om ON om.opcao=o.id ";
		$sql .= "WHERE o.reutilizavel AND om.opcao NOT IN ";
		$sql .= "(SELECT opcao FROM $schema.opcaomulti WHERE multi=:id)";
		try {
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':id', $pid);
			$stmt->execute();
			$result = $stmt->fetchall(PDO::FETCH_ASSOC);
			return $result;
		}
		catch(PDOException $e) {
			$_SESSION["s_errors"]["generic"][] = "ERRO[10]: ".$e->getMessage();
			echo $e->getMessage();
			die;
		}
	}

	function copyGrupo($gid, $type, $user){
		$tudo=Perguntas::getGroup($gid);
		
		$id = Perguntas::copyPergunta($tudo[0]["pid"], 0, Perguntas::getQtype($tudo[0]["pid"]), $user);
		$id = Perguntas::getPergunta($id)[0]["gid"];
		
		$tmp = array_slice($tudo,1);
		foreach ($tmp as &$pergunta)
			Perguntas::copyPergunta($pergunta["pid"], $id, Perguntas::getQtype($pergunta["pid"]), $user);
		return $id;
	}	

	function copyPergunta($pid, $gid, $type, $user){
		$tudo=Perguntas::getPergunta($pid);

		$id = Perguntas::insertQuestion($gid, $tudo[0]['tema'], $tudo[0]['texto'], $type, $user, $pid);

			if (!$id) {
				$_SESSION["s_messages"][] = "Nao conseguiu criar pergunta/grupo";
				  echo "NOT OK";
				  header("Location: ../perguntas/minhasperguntas.php");
				  die;
		}
		if ($type == "Aberta"){
			Perguntas::updateAberta($id,$tudo[0]['resposta'],$tudo[0]['comentario']);
		}

		if ($type == "Multipla"){
			foreach ( $tudo as &$opcao)
				Perguntas::copyOption($pid,$opcao["oid"],$id);
			$oid=Perguntas::getFirstOption($id);
			Perguntas::deleteOption($oid,$id);
		}
		
		return $id;
	}

	function insertQuestion($gid, $tema, $text, $type, $author, $pid){
		global $dbh, $schema;

		if ($gid == 0){
			try{
				$sql = "INSERT INTO $schema.grupo (id, tema, criador, datacria) VALUES (DEFAULT, ?, ?, DEFAULT)";
				$stmt = $dbh->prepare($sql);
				$stmt->execute(array($tema, $author));
				$sql = "SELECT currval('$schema.grupo_id_seq'::regclass)";
				$stmt = $dbh->prepare($sql);
				$stmt->execute();
				$gid = $stmt->fetchall(PDO::FETCH_ASSOC)[0]["currval"];
			}
			catch(PDOException $e) {
				echo $e->getMessage();
				die;
			}
		}

		try{
			$dbh->beginTransaction();
			
			if($pid == 0)
			{
				$sql = "INSERT INTO $schema.pergunta (id, texto, revisao, pertence, datacria) VALUES (DEFAULT, ?, DEFAULT, ?, DEFAULT)";
				$stmt = $dbh->prepare($sql);
				$stmt->execute(array($text, $gid));
			}
			else{
				$sql = "INSERT INTO $schema.pergunta (id, texto, revisao, pertence, datacria, baseada) VALUES (DEFAULT, ?, DEFAULT, ?, DEFAULT, ?)";
				$stmt = $dbh->prepare($sql);
				$stmt->execute(array($text, $gid, $pid));
			}
			$sql = "SELECT currval('$schema.pergunta_id_seq'::regclass)";
			$stmt = $dbh->prepare($sql);
			$stmt->execute();
			$pid = $stmt->fetchall(PDO::FETCH_ASSOC)[0]["currval"];

			switch ($type){
				case "Descricao": $table = "descricao"; break;
				case "Aberta": $table = "aberta"; break;
				case "Multipla": $table = "multipla"; break;
				default: return false;
			}

			$sql = "INSERT INTO $schema.$table (isa) VALUES (?)";
			$stmt = $dbh->prepare($sql);
			$stmt->execute(array($pid));
			$dbh->commit();
			
		}catch(PDOException $e) {
			echo $e->getMessage();
			die;
		}

		if ($type == "Multipla")
			Perguntas::insertOption($pid,0);
		
		return $pid;
	}

	function updateGrupo($gid, $tema){
		global $dbh, $schema;
		try {
			$sql = "UPDATE $schema.grupo SET tema=?WHERE id=?";
			$stmt = $dbh->prepare($sql);
			$stmt->execute(array($tema, $gid));
			//$count = $stmt->rowCount();
		}
			catch(PDOException $e) {
			echo $e->getMessage();
			die;
		}
		return true;
	}

	function updateDescricao($pid, $text, $rev){
		global $dbh, $schema;
		try {
			$sql = "UPDATE $schema.pergunta SET texto=?, revisao=? WHERE id=?";
			$stmt = $dbh->prepare($sql);
			$stmt->execute(array($text, $rev, $pid));
			//$count = $stmt->rowCount();
		}
			catch(PDOException $e) {
			echo $e->getMessage();
			die;

		}
		return true;
	}

	function updateMultipla($pid, $opts, $selec){
		global $dbh, $schema;
		
		$sql = "UPDATE $schema.opcaomulti AS om SET cotacao=c.cot from (values";
		foreach ($opts as &$opt)
			$sql .= " (" . $opt["0"] . "," . $opt["1"] . "),";
		$sql = rtrim($sql, ",") . ") AS c(opcao, cot) WHERE om.multi = :id AND c.opcao=om.opcao";
		echo $sql."<br>";
		try {
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':id', $pid);
			$stmt->execute();
		}catch(PDOException $e) {
			echo $e->getMessage();
			die;
		}
		
		$sql = "UPDATE $schema.opcao AS o SET texto=c.tex, reutilizavel=c.reu from (values";
		foreach ($opts as &$opt)
			$sql .= " (" . $opt["0"] . "," . $opt["2"] . ",'" . $opt["3"] . "'),";
		$sql = rtrim($sql, ",") . ") AS c(opcao, reu, tex) WHERE c.opcao=o.id";
		echo $sql."<br>";
		try {
			$stmt = $dbh->prepare($sql);
			$stmt->execute();
		}catch(PDOException $e) {
			echo $e->getMessage();
			die;
		}
		
		if ($selec != 0){
			$sql = "UPDATE $schema.multipla SET selecaomultipla=? WHERE isa=?";
			echo $sql."<br>";
			try {
				
				$stmt = $dbh->prepare($sql);
				$stmt->execute(array($selec, $pid));
			}catch(PDOException $e) {
				echo $e->getMessage();
				die;
			}
		}
		return true;
	}

	function updateAberta($pid, $resp, $com){
		global $dbh, $schema;
		try {

			$sql = "UPDATE $schema.aberta SET resposta=?, comentario=? WHERE isa=?";
			$stmt = $dbh->prepare($sql);
			$stmt->execute(array($resp, $com, $pid));
			//$count = $stmt->rowCount();

		}
			catch(PDOException $e) {
				echo $e->getMessage();
				die;
		}
		return true;
	}

	function deleteGrupo($gid){
		global $dbh, $schema;


		try {
			$stmt = $dbh->prepare("DELETE FROM $schema.examegrupo WHERE grupo=:id");
			$stmt->bindParam(':id', $gid);
			$stmt->execute();
		}
		catch(PDOException $e) {
			echo $e->getMessage();
			die;
		}

		try {
			$stmt = $dbh->prepare("SELECT id FROM $schema.pergunta WHERE pertence = :id");
			$stmt->bindParam(':id', $gid);
			$stmt->execute();
			$perguntas = $stmt->fetchall(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e) {
			echo $e->getMessage();
			die;
		}

		foreach ($perguntas as &$pergunta)
			Perguntas::deletePergunta($pergunta["id"]);
	}

	function deletePergunta($pid){
		global $dbh, $schema;
		

		
		try {
			$stmt = $dbh->prepare("UPDATE $schema.pergunta SET baseada=NULL WHERE baseada=:id");
			$stmt->bindParam(':id', $pid);
			$stmt->execute();
			$stmt = $dbh->prepare("SELECT pertence FROM $schema.pergunta WHERE id = :id");
			$stmt->bindParam(':id', $pid);
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
		
		try {
			$stmt = $dbh->prepare("DELETE FROM $schema.examegrupo WHERE grupo=:id");
			$stmt->bindParam(':id', $gid);
			$stmt->execute();
		}
		catch(PDOException $e) {
			echo $e->getMessage();
			die;
		}
		
		$type = Perguntas::getQtype($pid);

		switch ($type){
			case "Descricao": 	Perguntas::deleteDescricao($pid); 	break;
			case "Aberta": 		Perguntas::deteleAberta($pid); 		break;
			case "Multipla": 	Perguntas::deleteMultipla($pid); 	break;
			default: Perguntas::deleteDescricao($pid);
		}

		try {
			$stmt = $dbh->prepare("SELECT * FROM $schema.pergunta WHERE pertence = :id");
			$stmt->bindParam(':id', $gid);
			$stmt->execute();
			if ($stmt->rowCount() == 0){
				$stmt = $dbh->prepare("DELETE FROM $schema.grupo WHERE id = :id");
				$stmt->bindParam(':id', $gid);
				$stmt->execute();
			}
		}
		catch(PDOException $e) {
			echo $e->getMessage();
			die;
		}

	}

	function deteleAberta($pid){
		global $dbh, $schema;
		try {
			$stmt = $dbh->prepare("DELETE FROM $schema.aberta WHERE isa=:id");
			$stmt->bindParam(':id', $pid);
			$stmt->execute();
			$stmt = $dbh->prepare("DELETE FROM $schema.pergunta WHERE id=:id");
			$stmt->bindParam(':id', $pid);
			$stmt->execute();
		}
		catch(PDOException $e) {
			echo $e->getMessage();
			die;
		}
	}

	function deleteDescricao($pid){
		global $dbh, $schema;
		try {
			$stmt = $dbh->prepare("DELETE FROM $schema.descricao WHERE isa=:id");
			$stmt->bindParam(':id', $pid);
			$stmt->execute();
			$stmt = $dbh->prepare("DELETE FROM $schema.pergunta WHERE id=:id");
			$stmt->bindParam(':id', $pid);
			$stmt->execute();
		}
		catch(PDOException $e) {
			echo $e->getMessage();
			die;
		}

	}

	function deleteMultipla($pid){
		global $dbh, $schema;

		try {
			$stmt = $dbh->prepare("SELECT opcao AS id FROM $schema.opcaomulti WHERE multi = :id");
			$stmt->bindParam(':id', $pid);
			$stmt->execute();
			$opcoes = $stmt->fetchall(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e) {
			$_SESSION["s_errors"]["generic"][] = "ERRO[6]: ".$e->getMessage();
			echo $e->getMessage();
			die;
		}

		foreach ($opcoes as &$opcao)
			Perguntas::deleteOption($opcao["id"], $pid);

		try {
			$stmt = $dbh->prepare("DELETE FROM $schema.multipla WHERE isa=:id");
			$stmt->bindParam(':id', $pid);
			$stmt->execute();
			$stmt = $dbh->prepare("DELETE FROM $schema.pergunta WHERE id=:id");
			$stmt->bindParam(':id', $pid);
			$stmt->execute();
		}
		catch(PDOException $e) {
			echo $e->getMessage();
			die;
		}

	}

	function getGroup($gid){
		global $dbh, $schema;

		$sql = "SELECT g.id AS gid, g.criador, g.tema, g.datacria AS gdata, ";
		$sql .= "p.id AS pid, p.texto, p.revisao, p.datacria AS pdata, p.baseada ";
		$sql .= "FROM $schema.grupo g JOIN $schema.pergunta p ON g.id=p.pertence ";
		$sql .= "WHERE g.id = :id";

		try {
			// using prepared statements will help protect you from SQL injection
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':id', $gid);
			$stmt->execute();
			// get array containing all of the result set rows
			return $stmt->fetchall(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e) {
			$_SESSION["s_errors"]["generic"][] = "ERRO[8]: ".$e->getMessage();
			echo $e->getMessage();
			die;
		}

	}

	function getPergunta($pid){
		global $dbh, $schema;
		$sql = "SELECT g.id AS gid, g.tema, g.criador, ";
		$sql .= "p.id AS pid, p.revisao, p.datacria, p.texto, ";
		$sql .= "a.resposta, a.comentario, ";
		$sql .= "m.selecaomultipla, om.cotacao, o.id AS oid, o.texto AS opcao, o.reutilizavel ";
		$sql .= "FROM $schema.grupo g ";
		$sql .= "FULL JOIN $schema.pergunta p ON g.id=p.pertence ";
		$sql .= "FULL JOIN $schema.aberta a ON p.id = a.isa ";
		$sql .= "FULL JOIN $schema.multipla m ON p.id = m.isa ";
		$sql .= "FULL JOIN $schema.descricao d ON p.id = d.isa ";
		$sql .= "FULL JOIN $schema.opcaomulti om ON p.id=om.multi ";
		$sql .= "FULL JOIN $schema.opcao o ON om.opcao=o.id ";
		$sql .= "WHERE p.id = :id";

		try {
			// using prepared statements will help protect you from SQL injection
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':id', $pid);
			$stmt->execute();
			// get array containing all of the result set rows
			return $stmt->fetchall(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e) {
			$_SESSION["s_errors"]["generic"][] = "ERRO[8]: ".$e->getMessage();
			echo $e->getMessage();
			die;
		}
	}

	function isEditavel($id){
		global $dbh, $schema;

		$sql = "SELECT * FROM $schema.exame e ";
		$sql .= "FULL JOIN $schema.examegrupo eg ON e.id=eg.exame ";
		$sql .= "FULL JOIN $schema.grupo g ON eg.grupo=g.id ";
		$sql .= "FULL JOIN $schema.pergunta p ON g.id=p.pertence ";
		$sql .= "WHERE e.editavel='FALSE' AND ";
		
		//~ if ($type == "Grupo")
			$sql .= "g.id = :id";
		//~ else
			//~ $sql .= "p.id = :id";
			
		try {
			// using prepared statements will help protect you from SQL injection
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			// get array containing all of the result set rows
			if ($stmt->rowCount() != 0)
				return false;
			return true;
			
		}
		catch(PDOException $e) {
			$_SESSION["s_errors"]["generic"][] = "ERRO[10]: ".$e->getMessage();
			echo $e->getMessage();
			die;
		}
		
	}
	
	// get all tuples with the name of the author
	function getAllFromUser($username) {
		global $dbh, $schema;
		try {
			// using prepared statements will help protect you from SQL injection
			$sql = "SELECT DISTINCT ON (g.id) g.id AS gid, p.id AS pid, g.datacria, p.texto, p.baseada, g.baseado FROM $schema.grupo g, $schema.pergunta p WHERE g.id=p.pertence AND g.criador=:user";
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':user', $username);
			$stmt->execute();
			// get array containing all of the result set rows
			$result = $stmt->fetchall(PDO::FETCH_ASSOC);
			return $result;
		}
		catch(PDOException $e) {
			echo $e->getMessage();
			die;
		}
	}
	
	// get all tuples with the name of the author
	function getAll() {
		global $dbh, $schema;
		try {
			// using prepared statements will help protect you from SQL injection
			$sql = "SELECT DISTINCT ON (g.id) g.id AS gid, p.id AS pid, g.datacria, p.texto, p.baseada, g.baseado, g.criador FROM $schema.grupo g, $schema.pergunta p WHERE g.id=p.pertence";
			$stmt = $dbh->prepare($sql);
			$stmt->execute();
			// get array containing all of the result set rows
			$result = $stmt->fetchall(PDO::FETCH_ASSOC);
			return $result;
		}
		catch(PDOException $e) {
			echo $e->getMessage();
			die;
		}
	}

	// get all tuples with the name of the author
	function checkRevisao($id) {
		global $dbh, $schema;
		try {
			// using prepared statements will help protect you from SQL injection
			$sql = "SELECT p.revisao FROM $schema.grupo g, $schema.pergunta p WHERE g.id=p.pertence AND p.revisao='t' AND g.id=:id";
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			// get array containing all of the result set rows
			$result = count($stmt->fetchall(PDO::FETCH_ASSOC));
			if ($result == 0)
				return "";
			return "x";
		}
		catch(PDOException $e) {
			echo $e->getMessage();
			die;
		}
	}

	// get group type (Grupo se contiver varias perguntas, getQtype se apenas 1;
	function getGtype($id) {
		global $dbh, $schema;
		try {
			// using prepared statements will help protect you from SQL injection
			$sql = "SELECT p.id AS pid FROM $schema.grupo g, $schema.pergunta p WHERE g.id=p.pertence AND g.id=:id";
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			// get array containing all of the result set rows
			$result = $stmt->fetchall(PDO::FETCH_ASSOC);
			$resultc = $stmt->rowCount();

			switch ($resultc){
				//~ case 0: return "Empty";
				case 1: return Perguntas::getQtype($result[0]["pid"]);
				default: return "Grupo";
			}
		}
		catch(PDOException $e) {
			echo $e->getMessage();
			die;
		}
	}

	// get all tuples with the name of the author
	function getQtype($id) {
		global $dbh, $schema;
		try {
			// using prepared statements will help protect you from SQL injection
			$sql = "SELECT * FROM $schema.aberta a WHERE a.isa = :id";
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			// get array containing all of the result set rows
			$result = count($stmt->fetchall(PDO::FETCH_ASSOC));
			if ($result != 0)
				return "Aberta";

			// using prepared statements will help protect you from SQL injection
			$sql = "SELECT * FROM $schema.multipla m WHERE m.isa = :id";
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			// get array containing all of the result set rows
			$result = count($stmt->fetchall(PDO::FETCH_ASSOC));
			if ($result != 0)
				return "Multipla";

			// using prepared statements will help protect you from SQL injection
			$sql = "SELECT * FROM $schema.descricao d WHERE d.isa = :id";
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			// get array containing all of the result set rows
			$result = count($stmt->fetchall(PDO::FETCH_ASSOC));
			if ($result != 0)
				return "Descricao";

			return "None";
		}
		catch(PDOException $e) {
			echo $e->getMessage();
			die;
		}
	}

	// Original PHP code by Chirp Internet: www.chirp.com.au
	// Please acknowledge use of this code by including this header.
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
}

?>
