<?php /* Smarty version Smarty-3.1.5, created on 2015-12-17 16:16:13
         compiled from "../templates/exames/add_pergunta.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19789389825671fc129e7cc1-44403120%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a5cfdc02683e42a402e9847aae6735ea3a938df' => 
    array (
      0 => '../templates/exames/add_pergunta.tpl',
      1 => 1450365372,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19789389825671fc129e7cc1-44403120',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5671fc12bbe0d',
  'variables' => 
  array (
    'perguntas' => 0,
    'pergunta' => 0,
    'eid' => 0,
    'gid' => 0,
    'type' => 0,
    'pid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5671fc12bbe0d')) {function content_5671fc12bbe0d($_smarty_tpl) {?>
<!DOCTYPE html>
<html lang="pt">

	<head>
		<meta charset="utf-8" />
		<title>Gestor de Exames</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../css/print.css" media="print" />
		<link rel="stylesheet" type="text/css" href="../css/perguntas.css" />
	</head>

<style>
	html{
		overflow: -moz-scrollbars-vertical;
	}
</style>


	<body>

<?php $_smarty_tpl->smarty->loadPlugin('Smarty_Internal_Debug'); Smarty_Internal_Debug::display_debug($_smarty_tpl); ?> 

<div class="header">

		<!-- header tag -->
		<header>
			<p>Gestor de Exames</p>
		</header>

</div>

<div class="body">

  
<table class="perguntas">
			<tr>
				<td class="left"><h1>Lista de todas as Perguntas</h1></td>
			</tr>
		</table>
<table>

    <tr>
	  <th class="left">Seleccionar</th>
      <th class="left">Excerto</th>
      <th class="left">Data de Criação</th>
      <th class="left">Original</th>
      <th class="left">Tipo</th>
      <th class="right">Opções</th>
    </tr>
<?php  $_smarty_tpl->tpl_vars['pergunta'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pergunta']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['perguntas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['listp']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['pergunta']->key => $_smarty_tpl->tpl_vars['pergunta']->value){
$_smarty_tpl->tpl_vars['pergunta']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['listp']['index']++;
?>

<?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable(Perguntas::getGtype($_smarty_tpl->tpl_vars['pergunta']->value['gid']), null, 0);?>
	<?php $_smarty_tpl->tpl_vars['gid'] = new Smarty_variable($_smarty_tpl->tpl_vars['pergunta']->value['gid'], null, 0);?>
	<?php $_smarty_tpl->tpl_vars['pid'] = new Smarty_variable($_smarty_tpl->tpl_vars['pergunta']->value['pid'], null, 0);?>

    <tr<?php if (($_smarty_tpl->getVariable('smarty')->value['foreach']['listp']['index']%2)==1){?> class="alt"<?php }?>>
	  <td class="left">
		<form action="../exames/add_pergunta_action.php" method="post">
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['eid']->value;?>
">
			<input type="checkbox" name="check_list[]" value="<?php echo $_smarty_tpl->tpl_vars['gid']->value;?>
">
		
	  </td>
      <td class="left"><?php echo Perguntas::myTruncate(strtok(br2nl($_smarty_tpl->tpl_vars['pergunta']->value['texto']),"\n"),30);?>
</td>
      <td class="left"><?php echo date('d/m/y H:i:s',strtotime($_smarty_tpl->tpl_vars['pergunta']->value['datacria']));?>
</td>
			<?php if ($_smarty_tpl->tpl_vars['pergunta']->value['baseada']){?>
				<td><b><a href="get.php?id=<?php echo $_smarty_tpl->tpl_vars['pergunta']->value['baseada'];?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">Ver</a></b></td>
			<?php }else{ ?>
				<td></td>
			<?php }?>
		<td class="left"><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
</td>
		<td class="right"><b>
			<a href="add_pergunta_ver.php?id=<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">VER</a>
		</b></td>
	</tr>
<?php } ?>

	<tr>
<!--		<script language="Javascript">

			function redirect(){
				window.confirm("As perguntas foram adicionadas com sucesso!");
				window.opener.location.href="ver.php?id=<?php echo $_smarty_tpl->tpl_vars['eid']->value;?>
";
				self.close();
			}

		</script>
	
	-->	
		
			<td class="left">
				<input type="submit" value="Confirmar" <!-- OnClick="redirect()-->">
			</td>
		</form>
	</tr>

</table>


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