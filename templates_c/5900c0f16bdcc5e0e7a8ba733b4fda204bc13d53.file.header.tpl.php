<?php /* Smarty version Smarty-3.1.5, created on 2015-12-17 14:42:47
         compiled from "/opt/sibd/sibd1513/public_html/gestorexames/templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6696973725671e2666a8265-28058646%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5900c0f16bdcc5e0e7a8ba733b4fda204bc13d53' => 
    array (
      0 => '/opt/sibd/sibd1513/public_html/gestorexames/templates/header.tpl',
      1 => 1450359747,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6696973725671e2666a8265-28058646',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5671e26670679',
  'variables' => 
  array (
    's_user' => 0,
    's_type' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5671e26670679')) {function content_5671e26670679($_smarty_tpl) {?><!DOCTYPE html>
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