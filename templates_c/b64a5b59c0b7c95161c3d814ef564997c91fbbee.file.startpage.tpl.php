<?php /* Smarty version Smarty-3.1.5, created on 2015-12-17 00:02:26
         compiled from "../templates/principal/startpage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7309475055671ed82b25048-72272863%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b64a5b59c0b7c95161c3d814ef564997c91fbbee' => 
    array (
      0 => '../templates/principal/startpage.tpl',
      1 => 1449703766,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7309475055671ed82b25048-72272863',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5671ed82bdc1f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5671ed82bdc1f')) {function content_5671ed82bdc1f($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ('../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

 
    <!-- login form -->
<center>

	
	<div id="login">
		<div class="title">Login</div>
		<form action="../principal/login_action.php" method="post">
			<label for="uuser">Username:</label>
			<input type="text" size="15" name="uuser" id="uuser"/>
			<label for="upass">Password:</label>
			<input type="password" size="15" name="upass" id="upass"/>
			<input type="submit" value="Login" />
		</form>	
	</div>
</center>

<?php echo $_smarty_tpl->getSubTemplate ('../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>