<?php /* Smarty version Smarty-3.1.5, created on 2015-12-17 12:40:01
         compiled from "../templates/principal/mainpage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17269744485671e2665b1c56-96614106%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd1a68eb8d9518a9debf5f6865579666bc998f07' => 
    array (
      0 => '../templates/principal/mainpage.tpl',
      1 => 1450352400,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17269744485671e2665b1c56-96614106',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5671e2666a0ce',
  'variables' => 
  array (
    's_name' => 0,
    's_type' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5671e2666a0ce')) {function content_5671e2666a0ce($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ('../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  
  <head>
		<title>Gestor de Exames</title>
		<meta charset="UTF-8">
	</head>
  
<center>
	
	<p class="login">
		
			<h2>Bem-vindo<?php if (!empty($_smarty_tpl->tpl_vars['s_name']->value)){?>, <u><?php echo $_smarty_tpl->tpl_vars['s_name']->value;?>
<?php }?></u>!</h2> 
			<h5>(As suas permissões são de <b><?php if ($_smarty_tpl->tpl_vars['s_type']->value==0){?> Super Admin)<?php }?>
										<?php if ($_smarty_tpl->tpl_vars['s_type']->value==1){?> Administrador)<?php }?>
										<?php if ($_smarty_tpl->tpl_vars['s_type']->value==2){?> Docente)<?php }?>
										<?php if ($_smarty_tpl->tpl_vars['s_type']->value==3){?> Monitor)<?php }?></b></h5>
	</p>
	
</center>

<?php echo $_smarty_tpl->getSubTemplate ('../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>