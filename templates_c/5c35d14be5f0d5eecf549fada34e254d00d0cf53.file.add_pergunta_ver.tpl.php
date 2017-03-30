<?php /* Smarty version Smarty-3.1.5, created on 2015-12-17 16:40:40
         compiled from "../templates/exames/add_pergunta_ver.tpl" */ ?>
<?php /*%%SmartyHeaderCode:182493060956728cb0742cf9-88219788%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c35d14be5f0d5eecf549fada34e254d00d0cf53' => 
    array (
      0 => '../templates/exames/add_pergunta_ver.tpl',
      1 => 1450365307,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '182493060956728cb0742cf9-88219788',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_56728cb091295',
  'variables' => 
  array (
    's_user' => 0,
    'pergunta' => 0,
    'opcao' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56728cb091295')) {function content_56728cb091295($_smarty_tpl) {?>
<!DOCTYPE html>
<html lang="pt">

	<head>
		<meta charset="utf-8" />
		<title>Gestor de Exames</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../css/print.css" media="print" />
		<link rel="stylesheet" type="text/css" href="../css/perguntas.css" />
	</head>

	<body>

<?php $_smarty_tpl->smarty->loadPlugin('Smarty_Internal_Debug'); Smarty_Internal_Debug::display_debug($_smarty_tpl); ?> 

<div class="header">

		<!-- header tag -->
		<header>
			<p>Gestor de Exames</p>
		</header>
		
		
<!--
		
<?php if (isset($_smarty_tpl->tpl_vars['s_user']->value)){?>
		<footer class="nav"> <bar>
			
			<rspace><a href="add_pergunta.php">Minhas Perguntas</a></rspace>

		</bar></footer>

<?php }?>
-->
		
		
		

</div>

<div class="body">

<table>
	<tr>
		<td style="width:1px" class="left"><b>Tema:</b></td>
		<td class="left"><?php echo $_smarty_tpl->tpl_vars['pergunta']->value[0]['tema'];?>
</td>
	</tr>
	<tr>
		<td style="width:1px" class="left"><b>Criador:</b></td>
		<td class="left"><?php echo $_smarty_tpl->tpl_vars['pergunta']->value[0]['criador'];?>
</td>
	</tr>
	<tr>
		<td style="width:150px" class="left"><b>Data de criação:</b></td>
		<td class="left"><?php echo date('d/m/y H:i:s',strtotime($_smarty_tpl->tpl_vars['pergunta']->value[0]['datacria']));?>
</td>
	</tr>
	<tr>
		<td style="width:1px" class="left top"><b>Texto:</b></td>
		<td class="left"><?php echo $_smarty_tpl->tpl_vars['pergunta']->value[0]['texto'];?>
</td>
	</tr>

	<?php if (!empty($_smarty_tpl->tpl_vars['pergunta']->value[0]['resposta'])){?>
	<tr>
		<td style="width:1px" class="left top"><b>Resposta:</b></td>
		<td class="left"><?php echo $_smarty_tpl->tpl_vars['pergunta']->value[0]['resposta'];?>
</td>
	</tr>
	<tr>
		<td style="width:1px" class="left top"><b>Comentario:</b></td>
		<td class="left"><?php echo $_smarty_tpl->tpl_vars['pergunta']->value[0]['comentario'];?>
</td>
	</tr>
	<?php }?>

	<?php if (!empty($_smarty_tpl->tpl_vars['pergunta']->value[0]['opcao'])){?>
	<tr>
		<td style="width:1px" class="left"><b>Seleção multipla:</b></td>
		<td class="left"><?php if ($_smarty_tpl->tpl_vars['pergunta']->value[0]['selecaomultipla']){?>Sim<?php }else{ ?>Não<?php }?></td>
	</tr>
</table>  

<table>
	<tr>
		<th style="width:1px" class="left">Cotação</th>
		<th class="left">Texto</th>
	</tr>  

		<?php  $_smarty_tpl->tpl_vars['opcao'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['opcao']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pergunta']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['listo']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['opcao']->key => $_smarty_tpl->tpl_vars['opcao']->value){
$_smarty_tpl->tpl_vars['opcao']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['listo']['index']++;
?>
	<tr<?php if (($_smarty_tpl->getVariable('smarty')->value['foreach']['listo']['index']%2)==1){?> class="alt"<?php }?>>
		<td class="left"><?php echo $_smarty_tpl->tpl_vars['opcao']->value['cotacao'];?>
</td>
		<td class="left"><?php echo Perguntas::myTruncate($_smarty_tpl->tpl_vars['opcao']->value['texto'],100);?>
</td>
	</tr>
		<?php } ?>

</table>
	<?php }else{ ?>
</table>
	<?php }?>
	
<?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable($_smarty_tpl->tpl_vars['pergunta']->value[0]['pid'], null, 0);?>



</div>
  <!-- footer tag -->
		<footer class="footer">
			<div>
				<p class="right">SIBD1513 (c) 2015</p>
			</div>
		</footer>

	</body>
</html>

<?php }} ?>