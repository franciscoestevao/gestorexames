<?php /* Smarty version Smarty-3.1.5, created on 2015-12-17 14:22:33
         compiled from "../templates/exames/apagar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12625746775672b71950aa59-67724539%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb88f4b60095c7776a9e12b26161b3d9a0ce706d' => 
    array (
      0 => '../templates/exames/apagar.tpl',
      1 => 1450296145,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12625746775672b71950aa59-67724539',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'exame' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5672b7195c2bc',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5672b7195c2bc')) {function content_5672b7195c2bc($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<table class="perguntas">
			<tr>
				<td class="left"><h1>Remover Exame</h1></td>
			</tr>
</table>

  <p>Tem a certeza que quer apagar o exame? 
    [<a class="navtext" href="apagar_action.php?id=<?php echo $_smarty_tpl->tpl_vars['exame']->value;?>
">Sim</a>]
    [<a class="navtext" href="ver.php?id=<?php echo $_smarty_tpl->tpl_vars['exame']->value;?>
">Não</a>]
  </p>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>