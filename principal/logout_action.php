<?php

require_once('../includes/base.php');

if (isset($s_user))
session_destroy();
	
header("Location: ../principal/startpage.php");

?>
