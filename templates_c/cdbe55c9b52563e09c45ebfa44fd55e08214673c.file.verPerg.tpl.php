<?php /* Smarty version Smarty-3.1.5, created on 2015-12-17 15:42:45
         compiled from "../templates/perguntas/verPerg.tpl" */ ?>
<?php /*%%SmartyHeaderCode:425026065671e8a4814984-50151147%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cdbe55c9b52563e09c45ebfa44fd55e08214673c' => 
    array (
      0 => '../templates/perguntas/verPerg.tpl',
      1 => 1450363361,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '425026065671e8a4814984-50151147',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5671e8a4a0c35',
  'variables' => 
  array (
    'pergunta' => 0,
    'opcao' => 0,
    'id' => 0,
    'type' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5671e8a4a0c35')) {function content_5671e8a4a0c35($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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
		<td style="width:1px" class="left"><b>Revisao:</b></td>
		<td class="left"><?php if ($_smarty_tpl->tpl_vars['pergunta']->value[0]['revisao']){?>Sim<?php }else{ ?>Não<?php }?></td>
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
		<td class="left"><?php echo Perguntas::myTruncate($_smarty_tpl->tpl_vars['opcao']->value['opcao'],100);?>
</td>
	</tr>
		<?php } ?>

</table>
	<?php }else{ ?>
</table>
	<?php }?>
	
<?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable($_smarty_tpl->tpl_vars['pergunta']->value[0]['pid'], null, 0);?>
<div class="right"><b>
	
	<?php if (Perguntas::getGtype($_smarty_tpl->tpl_vars['id']->value)=="Grupo"){?>
		<a href="../perguntas/verQuestao.php?id=<?php echo $_smarty_tpl->tpl_vars['pergunta']->value[0]['gid'];?>
&type=Grupo">VER GRUPO<?php }else{ ?>
		<a href="../perguntas/editar.php?id=<?php echo $_smarty_tpl->tpl_vars['pergunta']->value[0]['gid'];?>
&type=Grupo">CRIAR GRUPO<?php }?></a><br>
	<a href="../perguntas/action_copiar.php?pid=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&gid=0&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">COPIAR</a><br>
	<a href="../perguntas/apagar.php?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">APAGAR</a><br>
	<a href="../perguntas/editar.php?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">EDITAR</a><br>
</b></div>

<?php echo $_smarty_tpl->getSubTemplate ('../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>