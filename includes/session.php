<?php

session_set_cookie_params(0, '/~sibd1513/'); //CHANGE ME

// start or reuse session
session_start();

// get sessions values if any

if (isset($_SESSION["s_user"])) {
  $s_user = $_SESSION["s_user"];
  $smarty->assign("s_user", $s_user);
}

if (isset($_SESSION["s_name"])) {
  $s_name = $_SESSION["s_name"];
  $smarty->assign("s_name", $s_name);
}

if (isset($_SESSION["s_type"])) {
  $s_type = $_SESSION["s_type"];
  $smarty->assign("s_type", $s_type);
}

if (isset($_SESSION["s_shopcart"])) {
  $s_shopcart = $_SESSION["s_shopcart"];
  $smarty->assign("s_shopcart", $s_shopcart);
}

if (isset($_SESSION["s_messages"])) {
  $s_messages = $_SESSION["s_messages"];
  $smarty->assign("s_messages", $s_messages);
  // clear messages
  unset($_SESSION["s_messages"]);
}

if (isset($_SESSION["s_errors"])) {
  $s_errors = $_SESSION["s_errors"];
  $smarty->assign("s_errors", $s_errors);
  // clear errors
  unset($_SESSION["s_errors"]);
}

if (isset($_SESSION["s_values"])) {
  $s_values = $_SESSION["s_values"];
  //$smarty->assign("s_values", $s_values);
  // clear values
  unset($_SESSION["s_values"]);
}

?>
