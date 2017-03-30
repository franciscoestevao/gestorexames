<?

set_include_path("../lib");

require_once('../includes/smarty.php');
require_once('../includes/session.php');

if (isset($s_user))
header("Location: ../principal/mainpage.php");

if (isset($_GET['Message'])) {
    print '<script> alert("' . $_GET['Message'] . '");</script>';
}

$smarty->display('principal/startpage.tpl');

?>
