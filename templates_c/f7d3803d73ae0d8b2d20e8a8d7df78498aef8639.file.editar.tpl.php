<?php /* Smarty version Smarty-3.1.5, created on 2015-12-20 19:11:47
         compiled from "../templates/exames/editar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9346121505671ed826c6e46-35203905%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7d3803d73ae0d8b2d20e8a8d7df78498aef8639' => 
    array (
      0 => '../templates/exames/editar.tpl',
      1 => 1450635106,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9346121505671ed826c6e46-35203905',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5671ed8281afa',
  'variables' => 
  array (
    'exame' => 0,
    'id' => 0,
    'pergunta' => 0,
    'gid' => 0,
    'ptype' => 0,
    'gtype' => 0,
    'pid' => 0,
    'grupo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5671ed8281afa')) {function content_5671ed8281afa($_smarty_tpl) {?>

<?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


		<table>
			<tr>
				<td class="left"><h1>Editar Exame</h1></td>
				
			</tr>
		</table>

		<form action="../exames/editar_action.php" method="post">
			
			
		</form>
	 
	 	 
	<form action="../exames/editar_action.php" method="post">
		<label>Disciplina:</label>
			<input type="text" size="80" value="<?php echo $_smarty_tpl->tpl_vars['exame']->value[0]['disciplina'];?>
">
			<input type="hidden" name="disciplina" value="<?php echo $_smarty_tpl->tpl_vars['exame']->value[0]['disciplina'];?>
"/>
			<br />
			<br />
		<label>Duração (minutos):</label>
			<input type="number" size="8"value="<?php echo $_smarty_tpl->tpl_vars['exame']->value[0]['duracao'];?>
">
			<input type="hidden" name="duracao" value="<?php echo $_smarty_tpl->tpl_vars['exame']->value[0]['duracao'];?>
"/>
			<br />
			<br />
		<label>Sala:</label>
			<input type="text" size="8"value="<?php echo $_smarty_tpl->tpl_vars['exame']->value[0]['sala'];?>
">
			<input type="hidden" name="sala" value="<?php echo $_smarty_tpl->tpl_vars['exame']->value[0]['sala'];?>
"/>
			<br />
			<br />
		<label>Data Uso:</label>
			<input type="date" size="80"value="<?php echo $_smarty_tpl->tpl_vars['exame']->value[0]['datauso'];?>
">
			<input type="hidden" name="datauso" value="<?php echo $_smarty_tpl->tpl_vars['exame']->value[0]['datauso'];?>
"/>
			<br />
			<br />
<!--
			<input type="hidden" name="editavel" value="<?php echo $_smarty_tpl->tpl_vars['exame']->value['editavel'];?>
"/>
-->
			<input type="hidden" name="eid" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">

	 
	 
	 
	<button onclick="myFunction()">Adicionar pergunta</button> 
	
	<table>
		<tr>
		  <th class="left">Ordem</th>
		  <th class="left">Cotação</th>
		  <th class="left">Excerto</th>
		  <th class="left">Data de Criação</th>
		  <th class="left">Original</th>
		  <th class="left">Tipo</th>
		  <th class="right">Opções</th>
		</tr>
		<?php  $_smarty_tpl->tpl_vars['pergunta'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pergunta']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['exame']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['listp']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['pergunta']->key => $_smarty_tpl->tpl_vars['pergunta']->value){
$_smarty_tpl->tpl_vars['pergunta']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['listp']['index']++;
?>
			<?php $_smarty_tpl->tpl_vars['gid'] = new Smarty_variable($_smarty_tpl->tpl_vars['pergunta']->value['gid'], null, 0);?>
			<?php $_smarty_tpl->tpl_vars['pid'] = new Smarty_variable($_smarty_tpl->tpl_vars['pergunta']->value['pid'], null, 0);?>
			<?php $_smarty_tpl->tpl_vars['gtype'] = new Smarty_variable(Perguntas::getGtype($_smarty_tpl->tpl_vars['gid']->value), null, 0);?>
			
			<input type="hidden" name="gid[<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['listp']['index'];?>
]" id="gid[<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['listp']['index'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['gid']->value;?>
"/>
			
			<tr<?php if (($_smarty_tpl->getVariable('smarty')->value['foreach']['listp']['index']%2)==1){?> class="alt"<?php }?>>
				
				<td class="left"><input type="number" style="width:50px" name="ordem[<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['listp']['index'];?>
]" id="ordem[<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['listp']['index'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['pergunta']->value['ordem'];?>
"/></td>



				<td class="left"><input type="number" style="width:50px" name="cotacao[<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['listp']['index'];?>
]" id="cotacao[<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['listp']['index'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['pergunta']->value['cotacao'];?>
"/></td>

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
				<td class="left"><?php echo $_smarty_tpl->tpl_vars['gtype']->value;?>
</td>
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
	 
	 		<p class="left"><input type="submit" value="Editar" /></p>
	</form> 
	<script>
		function myFunction() {
			
			newwindow=window.open("add_pergunta.php?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
", "_blank", "scrollbars=yes, top=500, left=500, width=900, height=600");
			if (window.focus){
				newwindow.focus();
			}
		}
	</script>
	
	 
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>