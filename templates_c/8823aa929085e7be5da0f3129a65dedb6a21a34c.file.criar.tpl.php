<?php /* Smarty version Smarty-3.1.5, created on 2015-12-17 10:37:20
         compiled from "../templates/principal/criar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:177421940656728250efed29-59439814%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8823aa929085e7be5da0f3129a65dedb6a21a34c' => 
    array (
      0 => '../templates/principal/criar.tpl',
      1 => 1449136807,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177421940656728250efed29-59439814',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5672825107eb0',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5672825107eb0')) {function content_5672825107eb0($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


  <h1>Criar Utilizador</h1>

  <form action="criar_action.php" method="post">
    <label for="username">Login:</label>
    <input type="text" size="80" name="username" id="username" required="required" />
    <br />
    <label for="password">Password:</label>
    <input type="password" size="80" name="password" id="password" required="required" />
    <br />
    <label for="password2">Repetir:</label>
    <input type="password" size="80" name="password2" id="password2" required="required" />
    <br />

    <p class="right"><input type="submit" value="Inserir" /></p>
  </form>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>