<?php
require_once('../includes/base.php');

if (!isset($s_user))
header("Location: ../principal/startpage.php");

if (isset($_GET['Message'])) {
    print '<script> alert("' . $_GET['Message'] . '");</script>';
}

$smarty->display('principal/mainpage.tpl');
?>
