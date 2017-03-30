<?php /* Smarty version Smarty-3.1.5, created on 2015-12-17 16:17:11
         compiled from "../templates/perguntas/minhasperguntas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11022450465671e83925bce7-82457929%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '429eb2ee1d38abab507a7e087ccff553c5fc4ff6' => 
    array (
      0 => '../templates/perguntas/minhasperguntas.tpl',
      1 => 1450365429,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11022450465671e83925bce7-82457929',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5671e8393feab',
  'variables' => 
  array (
    'perguntas' => 0,
    'pergunta' => 0,
    'type' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5671e8393feab')) {function content_5671e8393feab($_smarty_tpl) {?>

<?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<table class="perguntas">
			<tr>
				<td class="left"><h1>Lista das minhas Perguntas</h1></td>
				<td class="right"><a href="../perguntas/criar.php?id=0"><b>CRIAR PERGUNTA</b></a></td>
			</tr>
		</table>
<table>

    <tr>
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
<?php if ($_smarty_tpl->tpl_vars['type']->value=="Grupo"){?>
	<?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable($_smarty_tpl->tpl_vars['pergunta']->value['gid'], null, 0);?>
<?php }else{ ?>
	<?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable($_smarty_tpl->tpl_vars['pergunta']->value['pid'], null, 0);?>
<?php }?>

    <tr<?php if (($_smarty_tpl->getVariable('smarty')->value['foreach']['listp']['index']%2)==1){?> class="alt"<?php }?>>
      <td class="left"><?php echo Perguntas::myTruncate(strtok(br2nl($_smarty_tpl->tpl_vars['pergunta']->value['texto']),"\n"),30);?>
</td>
      <td class="left"><?php echo date('d/m/y H:i:s',strtotime($_smarty_tpl->tpl_vars['pergunta']->value['datacria']));?>
</td>
			<?php if ($_smarty_tpl->tpl_vars['pergunta']->value['baseada']&&$_smarty_tpl->tpl_vars['type']->value!='Grupo'){?>
				<td><b><a href="get.php?id=<?php echo $_smarty_tpl->tpl_vars['pergunta']->value['baseada'];?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">Ver</a></b></td>
			<?php }elseif($_smarty_tpl->tpl_vars['pergunta']->value['baseado']){?>
				<td><b><a href="get.php?id=<?php echo $_smarty_tpl->tpl_vars['pergunta']->value['baseado'];?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">Ver</a></b></td>
			<?php }else{ ?>
				<td></td>
			<?php }?>
		<td class="left"><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
</td>
		<td class="right"><b>
			<?php if (Perguntas::isEditavel($_smarty_tpl->tpl_vars['pergunta']->value['gid'])){?>
				<a href="../perguntas/apagar.php?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">APAGAR</a> |
				<a href="../perguntas/editar.php?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">EDITAR</a> |
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['type']->value!="Grupo"){?>
				<a href="../perguntas/action_copiar.php?pid=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&gid=0&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">COPIAR</a> |
			<?php }else{ ?>
				<a href="../perguntas/action_copiar.php?pid=0&gid=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">COPIAR</a> |
			<?php }?>
			
			<a href="../perguntas/verQuestao.php?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">VER</a>
		</b></td>
	</tr>
<?php } ?>
</table>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>