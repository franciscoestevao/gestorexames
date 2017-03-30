<?php /* Smarty version Smarty-3.1.5, created on 2015-12-17 12:50:08
         compiled from "../templates/exames/criar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32471119256729d03af1926-44641204%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'daa0042e5e1bf5a90fd424d7c9a303d35ce1c2d6' => 
    array (
      0 => '../templates/exames/criar.tpl',
      1 => 1450353006,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32471119256729d03af1926-44641204',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_56729d03ba113',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56729d03ba113')) {function content_56729d03ba113($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  

<table class="perguntas">
			<tr>
				<td class="left"><h1>Criar Novo Exame</h1></td>
			</tr>
</table>
	
	<form action="criar_action.php" method="post">
		<label for="disciplina">Disciplina:</label>
		<input type="text" name="disciplina" id="disciplina" required="required" />
		<br />
		<p class="right"><input type="submit" value="Inserir" /></p>
	</form>



<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>