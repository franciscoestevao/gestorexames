<?php /* Smarty version Smarty-3.1.5, created on 2015-12-17 15:20:57
         compiled from "../templates/perguntas/editarPerg.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7541936305671e2283895d3-50407311%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d18b6049b3f4d07e1bba65efc0266ef31a093fb' => 
    array (
      0 => '../templates/perguntas/editarPerg.tpl',
      1 => 1450362055,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7541936305671e2283895d3-50407311',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5671e22861d8d',
  'variables' => 
  array (
    'type' => 0,
    'pergunta' => 0,
    'opcao' => 0,
    'reutilizaveis' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5671e22861d8d')) {function content_5671e22861d8d($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<table class="perguntas">
			<tr>
				<td class="left"><h1>Editar Pergunta</h1></td>
			</tr>
</table>


<form action="../perguntas/editar_action.php?type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" method="post">
	<input type="hidden" name="gid" value="<?php echo $_smarty_tpl->tpl_vars['pergunta']->value[0]['gid'];?>
"/>
	<input type="hidden" name="pid" value="<?php echo $_smarty_tpl->tpl_vars['pergunta']->value[0]['pid'];?>
"/>

<?php if (Perguntas::getGtype($_smarty_tpl->tpl_vars['pergunta']->value[0]['gid'])!="Grupo"){?>
	<label for="tema">Tema:</label>
	<input type="text" size="80" name="tema" id="tema" value="<?php echo $_smarty_tpl->tpl_vars['pergunta']->value[0]['tema'];?>
"/>
	<br />
	<br />
<?php }else{ ?>
	<input type="hidden" size="80" name="tema" id="tema" value="<?php echo $_smarty_tpl->tpl_vars['pergunta']->value[0]['tema'];?>
"/>
<?php }?>

	<label for="text">Texto:</label>
	<textarea rows="7" cols="90" name="text" ><?php echo br2nl($_smarty_tpl->tpl_vars['pergunta']->value[0]['texto']);?>
</textarea>
	<br />
	<br />

	<?php if ($_smarty_tpl->tpl_vars['type']->value=="Aberta"){?>
		<label for="resposta">Resposta:</label>
		<textarea rows="7" cols="90" name="resposta" ><?php echo br2nl($_smarty_tpl->tpl_vars['pergunta']->value[0]['resposta']);?>
</textarea>
		<br />
		<br />

		<label for="comentario">Comentário:</label>
		<textarea rows="7" cols="90" name="comentario"><?php echo br2nl($_smarty_tpl->tpl_vars['pergunta']->value[0]['comentario']);?>
</textarea>
		<br />
		<br />
	<?php }?>
	
	<input type="checkbox"  name="revisao" id="revisao" value="TRUE" <?php if ($_smarty_tpl->tpl_vars['pergunta']->value[0]['revisao']){?>checked="checked"<?php }?>> Revisão
	<br />
	<br />

	<?php if ($_smarty_tpl->tpl_vars['type']->value=="Multipla"){?>
		<input type="checkbox" name="multipla" value="TRUE" <?php if ($_smarty_tpl->tpl_vars['pergunta']->value[0]['selecaomultipla']){?>checked="checked"<?php }?>> Seleção multipla
		<br />
		<br />

		<table>
			<tr>
				<th style="width:1px" class="left">Reutilizavel</th>
				<th style="width:1px" class="left">Cotação</th>
				<th class="left">Texto</th>
				<th class="left">Opções</th>
			</tr>  

			<?php  $_smarty_tpl->tpl_vars['opcao'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['opcao']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pergunta']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['listo']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['opcao']->key => $_smarty_tpl->tpl_vars['opcao']->value){
$_smarty_tpl->tpl_vars['opcao']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['listo']['index']++;
?>    
				<input type="hidden" name="oid[<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['listo']['index'];?>
]" id="oid[<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['listo']['index'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['opcao']->value['oid'];?>
"/>

				<tr<?php if (($_smarty_tpl->getVariable('smarty')->value['foreach']['listo']['index']%2)==1){?> class="alt"<?php }?>>
					<td class="center">
						<input type="hidden" name="reutilizavel[<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['listo']['index'];?>
]" id="reutilizavel[<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['listo']['index'];?>
]" value="FALSE"/>
						<input type="checkbox" name="reutilizavel[<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['listo']['index'];?>
]" id="reutilizavel[<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['listo']['index'];?>
]" value="TRUE" <?php if ($_smarty_tpl->tpl_vars['opcao']->value['reutilizavel']){?>checked="checked"<?php }?> />
					</td>
					<td class="left"><input type="number" style="width:50px" name="cotacao[<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['listo']['index'];?>
]" id="cotacao[<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['listo']['index'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['opcao']->value['cotacao'];?>
"/></td>
					<td class="left"><input type="text" size="70" name="texto[<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['listo']['index'];?>
]" id="texto[<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['listo']['index'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['opcao']->value['opcao'];?>
"/></td>
					<td class="right"><b>
						<?php if (count($_smarty_tpl->tpl_vars['pergunta']->value)!=1){?>
							<a href="../perguntas/apagar_opcao_action.php?pid=<?php echo $_smarty_tpl->tpl_vars['pergunta']->value[0]['pid'];?>
&oid=<?php echo $_smarty_tpl->tpl_vars['opcao']->value['oid'];?>
">Apagar</a> |
						<?php }?>
						<a href="../perguntas/copiar_opcao_action.php?pid=<?php echo $_smarty_tpl->tpl_vars['pergunta']->value[0]['pid'];?>
&oid=<?php echo $_smarty_tpl->tpl_vars['opcao']->value['oid'];?>
">Duplicar</a>
					</b></td>
				</tr>
			<?php } ?>
		
			<tr>
				<td class="left" style="position:absolute; left:0; bottom:150px"><br><br><b>Adicionar: </b>

					<select name="new" id="new">
					<option value="-1">Nenhum</option>
					<option value="0">Nova</option>
					<?php if (isset($_smarty_tpl->tpl_vars['reutilizaveis']->value)){?>
						<option value="-1">---------- Opções Reutilizaveis: </option>
						<?php  $_smarty_tpl->tpl_vars['opcao'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['opcao']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['reutilizaveis']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['opcao']->key => $_smarty_tpl->tpl_vars['opcao']->value){
$_smarty_tpl->tpl_vars['opcao']->_loop = true;
?>
							<option value=<?php echo $_smarty_tpl->tpl_vars['opcao']->value['oid'];?>
><?php echo $_smarty_tpl->tpl_vars['opcao']->value['texto'];?>
</option>
						<?php } ?>
					<?php }?>
					</select>

				</td>
			</tr>
	<?php }else{ ?>
		<table>
	<?php }?>
			<tr>
				<td class="left"><input style="position:absolute; left:1; bottom:100px" type="submit" value="Guardar Alterações" />
					<?php if ($_smarty_tpl->tpl_vars['type']->value=="Multipla"){?>
					<td class="right"><b>
						<a href="../perguntas/minhasperguntas.php" style="position:absolute; right:5px">Terminar</a>
					</b></td>
					<?php }?>
				</td>
			</tr>
		</table>
	</form>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php }} ?>