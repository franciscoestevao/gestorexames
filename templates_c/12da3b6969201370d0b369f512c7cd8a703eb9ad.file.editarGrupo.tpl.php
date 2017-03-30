<?php /* Smarty version Smarty-3.1.5, created on 2015-12-17 10:56:00
         compiled from "../templates/perguntas/editarGrupo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9768651465671e841876746-63400364%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12da3b6969201370d0b369f512c7cd8a703eb9ad' => 
    array (
      0 => '../templates/perguntas/editarGrupo.tpl',
      1 => 1450346156,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9768651465671e841876746-63400364',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5671e841a6446',
  'variables' => 
  array (
    'type' => 0,
    'grupo' => 0,
    'pergunta' => 0,
    'pid' => 0,
    'ptype' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5671e841a6446')) {function content_5671e841a6446($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<form action="../perguntas/editar_action.php?type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" method="post">
	<table class="perguntas">
			<tr>
				<td class="left"><h1>Editar Grupo</h1></td>
				<td></td>
			</tr>
			<tr>
				<td>
					<label for="tema">Tema:</label>
					<input type="text" size="80" name="tema" id="tema" value="<?php echo $_smarty_tpl->tpl_vars['grupo']->value[0]['tema'];?>
"/>
					<input type="hidden" size="80" name="gid" id="gid" value="<?php echo $_smarty_tpl->tpl_vars['grupo']->value[0]['gid'];?>
"/>
				</td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td class="right"><a href="../perguntas/criar.php?id=<?php echo $_smarty_tpl->tpl_vars['grupo']->value[0]['gid'];?>
"><b>CRIAR PERGUNTA</b></a></td>
			</tr>
		</table>


	<table>
		<tr>
		  <th class="left">Excerto</th>
		  <th class="left">Data de Criação</th>
		  <th class="left">Original</th>
		  <th class="left">Tipo</th>
		  <th class="left">Revisão</th>
		  <th class="right">Opções</th>
		</tr>
		<?php  $_smarty_tpl->tpl_vars['pergunta'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pergunta']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['grupo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['listp']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['pergunta']->key => $_smarty_tpl->tpl_vars['pergunta']->value){
$_smarty_tpl->tpl_vars['pergunta']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['listp']['index']++;
?>
			<?php $_smarty_tpl->tpl_vars['pid'] = new Smarty_variable($_smarty_tpl->tpl_vars['pergunta']->value['pid'], null, 0);?>
			<?php $_smarty_tpl->tpl_vars['ptype'] = new Smarty_variable(Perguntas::getQtype($_smarty_tpl->tpl_vars['pid']->value), null, 0);?>
			<tr<?php if (($_smarty_tpl->getVariable('smarty')->value['foreach']['listp']['index']%2)==1){?> class="alt"<?php }?>>
				<td class="left"><?php echo Perguntas::myTruncate(strtok(br2nl($_smarty_tpl->tpl_vars['pergunta']->value['texto']),"\n"),30);?>
</td>
				<td class="left"><?php echo date('d/m/y H:i:s',strtotime($_smarty_tpl->tpl_vars['pergunta']->value['pdata']));?>
</td>
					<?php if ($_smarty_tpl->tpl_vars['pergunta']->value['baseada']){?>
						<td><b><a href="get.php?id=<?php echo $_smarty_tpl->tpl_vars['pergunta']->value['baseada'];?>
&type=<?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
">Ver</a></b></td>
					<?php }else{ ?>
						<td></td>
					<?php }?>
				<td class="left"><?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
</td>
				<td class="left"><?php if ($_smarty_tpl->tpl_vars['pergunta']->value['revisao']){?>x<?php }?></td>
				<td class="right"><b>
					<a href="../perguntas/action_copiar.php?pid=<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
&gid=<?php echo $_smarty_tpl->tpl_vars['grupo']->value[0]['gid'];?>
&type=<?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
">COPIAR</a> |
					<a href="../perguntas/apagar.php?id=<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
&type=<?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
">APAGAR</a> |
					<a href="../perguntas/editar.php?id=<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
&type=<?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
">EDITAR</a> |
					<a href="../perguntas/verQuestao.php?id=<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
&type=<?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
">VER</a>
				</b></td>
			</tr>
		<?php } ?>
	</table>

	<div class="right"><input type="submit" value="Terminar" /></div>
</form>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>