<?php /* Smarty version Smarty-3.1.5, created on 2015-12-17 08:12:19
         compiled from "../templates/perguntas/verGrupo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1836231995671f09492fb32-52720415%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18ed26b5b11ad2e024c10eb70f7aa49a97937066' => 
    array (
      0 => '../templates/perguntas/verGrupo.tpl',
      1 => 1450336337,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1836231995671f09492fb32-52720415',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5671f094ae5b9',
  'variables' => 
  array (
    'grupo' => 0,
    'pergunta' => 0,
    'ptype' => 0,
    'id' => 0,
    'type' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5671f094ae5b9')) {function content_5671f094ae5b9($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable($_smarty_tpl->tpl_vars['grupo']->value[0]['gid'], null, 0);?>
<center>
  <table>
    <tr>
      <td style="width:1px" class="left"><b>Criador:</b></td>
      <td class="left"><?php echo $_smarty_tpl->tpl_vars['grupo']->value[0]['criador'];?>
</td>
    </tr>
    <tr>
      <td style="width:1px" class="left"><b>Tema:</b></td>
      <td class="left"><?php echo $_smarty_tpl->tpl_vars['grupo']->value[0]['tema'];?>
</td>
    </tr>
    <tr>
      <td style="width:1px" class="left"><b>Data de criacão:</b></td>
      <td class="left"><?php echo date('d/m/y H:i:s',strtotime($_smarty_tpl->tpl_vars['grupo']->value[0]['gdata']));?>
</td>
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
	<?php $_smarty_tpl->tpl_vars['ptype'] = new Smarty_variable(Perguntas::getQtype($_smarty_tpl->tpl_vars['pergunta']->value['pid']), null, 0);?>
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
			<a href="../perguntas/verQuestao.php?id=<?php echo $_smarty_tpl->tpl_vars['pergunta']->value['pid'];?>
&type=<?php echo Perguntas::getQtype($_smarty_tpl->tpl_vars['pergunta']->value['pid']);?>
">VER</a>
		</b></td>
	</tr>
<?php } ?>
</table>
 
 <div class="right"><b>
	<a href="../perguntas/action_copiar.php?pid=0&gid=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">COPIAR</a><br>
	<a href="../perguntas/apagar.php?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">APAGAR</a><br>
	<a href="../perguntas/editar.php?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">EDITAR</a><br>
</b></div>

</center>

<?php echo $_smarty_tpl->getSubTemplate ('../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>