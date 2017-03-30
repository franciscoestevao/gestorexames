<?php /* Smarty version Smarty-3.1.5, created on 2015-12-17 00:21:16
         compiled from "../templates/principal/listar_tudo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9942624225671f1ec3ae819-12572409%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca009e25bf2fe5f4d04c3a2a39fa4973d8b9b370' => 
    array (
      0 => '../templates/principal/listar_tudo.tpl',
      1 => 1449693533,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9942624225671f1ec3ae819-12572409',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'users' => 0,
    'user' => 0,
    's_user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5671f1ec4e748',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5671f1ec4e748')) {function content_5671f1ec4e748($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ('../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<table>
			<tr>
				<td class="left"><h1>Lista de Utilizadores</h1></td>
				<td class="right"><a href="../principal/criar.php"><b>ADICIONAR</b></a></td>
			</tr>
		</table>

		<table>
			<tr>
				<th class="left">Username</th>
				<th class="left">Nome</th>
				<th class="center">Permissões</th>
				<th class="right">Opções</th>
			</tr>
			
<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['listu']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['listu']['index']++;
?>
			<tr<?php if (($_smarty_tpl->getVariable('smarty')->value['foreach']['listu']['index']%2)==1){?> class="alt"<?php }?>>
				<td style="width:1px" class="left"><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</td>
				<td class="left"><?php echo $_smarty_tpl->tpl_vars['user']->value['nome'];?>
</td>
				<td style="width:1px" class="center"><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['user']->value['tipo'];?>
<?php $_tmp1=ob_get_clean();?><?php echo Utilizadores::getPerm($_tmp1);?>
</td>
				<td style="width:190px" class="right"> <b>
<?php if (($_smarty_tpl->tpl_vars['user']->value['username']!=$_smarty_tpl->tpl_vars['s_user']->value)){?>
					<a href="../principal/apagar.php?username=<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
">APAGAR</a> | 
<?php }?>
					<a href="../principal/editar.php?username=<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
">EDITAR</a> | 
					<a href="../principal/ver.php?username=<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
">VER</a></b>
				</td>
			</tr>
<?php } ?>
		</table>

<?php echo $_smarty_tpl->getSubTemplate ('../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>