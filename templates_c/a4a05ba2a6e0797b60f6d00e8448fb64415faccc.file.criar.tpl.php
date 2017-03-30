<?php /* Smarty version Smarty-3.1.5, created on 2015-12-17 15:34:17
         compiled from "../templates/perguntas/criar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:643467498567260593cd314-23758720%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4a05ba2a6e0797b60f6d00e8448fb64415faccc' => 
    array (
      0 => '../templates/perguntas/criar.tpl',
      1 => 1450362856,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '643467498567260593cd314-23758720',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_56726059495b0',
  'variables' => 
  array (
    'gid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56726059495b0')) {function content_56726059495b0($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  

		<table>
			<tr>
				<td class="left"><h1>Criar Nova Pergunta</h1></td>
				
			</tr>
		</table>
	
	<form action="criar_action.php" method="post">
		
		<input type="hidden" name="gid" id="gid" value="<?php echo $_smarty_tpl->tpl_vars['gid']->value;?>
"/>
		<?php if ($_smarty_tpl->tpl_vars['gid']->value==0){?>
		<label for="tema">Tema:</label>
		<input type="text" name="tema" id="tema" required="required" />
		<br />
		<br />
		<?php }?>
		<label for="text">Texto:</label>
                <textarea rows="7" cols="70" name="text" id="text" required="required" ></textarea>
		<br />
                <br />
		<label for="type">Tipo:</label>
                <select name="type" id="type">
                    <option value="Descricao" selected>Descrição</option>
                    <option value="Aberta">Aberta</option>
                    <option value="Multipla">Múltipla</option>
		</select>
		<br />
                <br />
		<p class="right"><input type="submit" value="Inserir" /></p>
	</form>



<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>