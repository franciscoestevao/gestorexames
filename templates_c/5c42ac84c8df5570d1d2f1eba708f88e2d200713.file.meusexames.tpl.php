<?php /* Smarty version Smarty-3.1.5, created on 2015-12-17 15:25:20
         compiled from "../templates/exames/meusexames.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18020348395671ee0e5b19b5-17454325%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c42ac84c8df5570d1d2f1eba708f88e2d200713' => 
    array (
      0 => '../templates/exames/meusexames.tpl',
      1 => 1450362318,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18020348395671ee0e5b19b5-17454325',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5671ee0e7136c',
  'variables' => 
  array (
    'exames' => 0,
    'exame' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5671ee0e7136c')) {function content_5671ee0e7136c($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<table>
			<tr>
				<td class="left"><h1>Lista dos Meus Exames</h1></td>
				<td class="right"><a href="../exames/criar.php"><b>CRIAR EXAME</b></a></td>
			</tr>
		</table>

		<table>
			<tr>
				<th class="left">Disciplina</th>
				<th class="center">Data do exame</th>
				<th class="center">Data de exportação</th>
				<th class="center">Data de criação</th>
				<th class="right">Opções</th>
			</tr>
			
<?php  $_smarty_tpl->tpl_vars['exame'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['exame']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['exames']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['liste']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['exame']->key => $_smarty_tpl->tpl_vars['exame']->value){
$_smarty_tpl->tpl_vars['exame']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['liste']['index']++;
?>
			<tr<?php if (($_smarty_tpl->getVariable('smarty')->value['foreach']['liste']['index']%2)==1){?> class="alt"<?php }?>>
				<td style="width:1px" class="left"><?php echo $_smarty_tpl->tpl_vars['exame']->value['disciplina'];?>
</td>
				<?php if ($_smarty_tpl->tpl_vars['exame']->value['datauso']){?>
				<td class="center"><?php echo date('d/m/y H:i:s',strtotime($_smarty_tpl->tpl_vars['exame']->value['datauso']));?>
</td>
				<?php }else{ ?> <td /><?php }?>
				<?php if ($_smarty_tpl->tpl_vars['exame']->value['dataexport']){?>
				<td class="center"><?php echo date('d/m/y H:i:s',strtotime($_smarty_tpl->tpl_vars['exame']->value['dataexport']));?>
</td>
				<?php }else{ ?> <td /><?php }?>
				<td class="center"><?php echo date('d/m/y H:i:s',strtotime($_smarty_tpl->tpl_vars['exame']->value['datacria']));?>
</td>
				<td style="width:300px" class="right"> <b>
<?php if (($_smarty_tpl->tpl_vars['exame']->value['editavel']==true)){?>
					<a href="../exames/exportar.php?id=<?php echo $_smarty_tpl->tpl_vars['exame']->value['id'];?>
">EXPORTAR</a> |
					<a href="../exames/apagar.php?id=<?php echo $_smarty_tpl->tpl_vars['exame']->value['id'];?>
">APAGAR</a> | 
					<a href="../exames/editar.php?id=<?php echo $_smarty_tpl->tpl_vars['exame']->value['id'];?>
">EDITAR</a> | 
<?php }?>	
					<a href="../exames/ver.php?id=<?php echo $_smarty_tpl->tpl_vars['exame']->value['id'];?>
">VER</a></b>
					 </b></td>
			</tr> 
<?php } ?>
		</table>

<?php echo $_smarty_tpl->getSubTemplate ('../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>