<?php /* Smarty version Smarty-3.1.5, created on 2015-12-17 08:58:25
         compiled from "../templates/perguntas/apagarP.tpl" */ ?>
<?php /*%%SmartyHeaderCode:38356012656726b219f8f02-20201995%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7eace0939b259ce0acb9c33cae955ebc2b977368' => 
    array (
      0 => '../templates/perguntas/apagarP.tpl',
      1 => 1450296119,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '38356012656726b219f8f02-20201995',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_56726b21aa2a8',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56726b21aa2a8')) {function content_56726b21aa2a8($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<table class="perguntas">
			<tr>
				<td class="left"><h1>Remover Pergunta</h1></td>
			</tr>
</table>

  <p>Tem a certeza que quer remover a seguinte pergunta? 
    [<a class="navtext" href="apagar_action.php?id=<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
&type=Pergunta">Sim</a>]
    [<a class="navtext" href="minhasperguntas.php">Não</a>]
  </p>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>