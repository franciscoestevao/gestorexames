<?php /* Smarty version Smarty-3.1.5, created on 2015-12-17 08:57:07
         compiled from "../templates/perguntas/apagarG.tpl" */ ?>
<?php /*%%SmartyHeaderCode:176993737256726ad3d1baf2-61682923%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '769fe39e95920ab76b00935bca4713d8a8697523' => 
    array (
      0 => '../templates/perguntas/apagarG.tpl',
      1 => 1450296056,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176993737256726ad3d1baf2-61682923',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'gid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_56726ad3dce89',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56726ad3dce89')) {function content_56726ad3dce89($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<table class="perguntas">
			<tr>
				<td class="left"><h1>Remover Grupo</h1></td>
			</tr>
</table>
<table>

  <p>Tem a certeza que quer remover o seguinte grupo? 
    [<a class="navtext" href="apagar_action.php?id=<?php echo $_smarty_tpl->tpl_vars['gid']->value;?>
&type=Grupo">Sim</a>]
    [<a class="navtext" href="minhasperguntas.php">Não</a>]
  </p>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>