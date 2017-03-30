<?php /* Smarty version Smarty-3.1.5, created on 2015-12-17 14:42:47
         compiled from "../templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6435607415671e2286272b6-09886629%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75a619664980ef7178e07f2c499692ae2bd0ad70' => 
    array (
      0 => '../templates/header.tpl',
      1 => 1450359747,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6435607415671e2286272b6-09886629',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5671e22868684',
  'variables' => 
  array (
    's_user' => 0,
    's_type' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5671e22868684')) {function content_5671e22868684($_smarty_tpl) {?><!DOCTYPE html>
<html lang="pt">

	<head>
		<meta charset="utf-8" />
		<title>Gestor de Exames</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../css/print.css" media="print" />
		<link rel="stylesheet" type="text/css" href="../css/perguntas.css" />
	</head>

	<body> 

<div class="header">

		<!-- header tag -->
		<header>
<?php if (isset($_smarty_tpl->tpl_vars['s_user']->value)){?>
			<p><a href="../principal/mainpage.php">Gestor de Exames</a></p>
<?php }else{ ?>
			<p><a href="../principal/startpage.php">Gestor de Exames</a></p>
<?php }?>
		</header>

<?php if (isset($_smarty_tpl->tpl_vars['s_user']->value)){?>
		<footer class="nav"> <bar>
			
<?php if (($_smarty_tpl->tpl_vars['s_type']->value>1)){?>
			<rspace><a href="../exames/meusexames.php">Meus Exames</a></rspace>

			<rspace><a href="../exames/todosexames.php">Todos os Exames</a></rspace>
<?php }?>

<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['s_type']->value;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1==2){?>
			<rspace><a href="../perguntas/minhasperguntas.php">Minhas Perguntas</a></rspace>
<?php }?>

<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['s_type']->value;?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2>1){?>
			<rspace><a href="../perguntas/todasperguntas.php">Todas as Perguntas</a></rspace>
<?php }?>

<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['s_type']->value;?>
<?php $_tmp3=ob_get_clean();?><?php if ($_tmp3<2){?>
			<rspace><a href="../principal/listar_tudo.php">Listar Utilizadores</a></rspace>
<?php }?>

			<span style="float:right;">
				<right><a href="../principal/logout_action.php">Logout</a></right>
			</span>
		</bar></footer>

<?php }?>

</div>

<div class="body">
<?php }} ?>