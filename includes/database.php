<?php

//database constants
$user = 'sibd1513';	 //CHANGE ME
$pass = 'rahulbhadana';	 //CHANGE ME
$dbname = 'sibd1513';	 //CHANGE ME

$host = 'db.fe.up.pt';
$dsn = 'pgsql:host='.$host.';dbname='.$dbname;

$schema = "gestorexames";

// get a database connection (not persistent)
try {
  $dbh = new PDO($dsn, $user, $pass);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  $_SESSION["s_errors"]["generic"][] = "ERRO[00]: ".$e->getMessage();
  header("Location: ../principal/startpage.php");
  die;
}

?>
