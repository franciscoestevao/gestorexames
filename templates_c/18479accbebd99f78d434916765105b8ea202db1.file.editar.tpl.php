<?php /* Smarty version Smarty-3.1.5, created on 2015-12-17 10:37:08
         compiled from "../templates/principal/editar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:201625442256728244908f54-21914293%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18479accbebd99f78d434916765105b8ea202db1' => 
    array (
      0 => '../templates/principal/editar.tpl',
      1 => 1450231082,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201625442256728244908f54-21914293',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_56728244a854b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56728244a854b')) {function content_56728244a854b($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


		<h1>Editar Utilizador</h1>

		<form action="../principal/editar_action.php" method="post">
			<label>Username:</label>
			<input type="text" size="80"value="<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
" disabled/>
			<input type="hidden" name="username" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
"/>
			<br />
			<br />
			
			<label for="nome">Nome:</label>
			<input type="text" size="80" name="nome" id="nome" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['nome'];?>
"/>
			<br />
			<br />
			
			<label for="email">Email:</label>
			<input type="text" size="80" name="email" id="email" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
"  />
			<br />
			<br />
			
			<label for="telemovel">Telefone:</label>
			<input type="text" size="80" name="telemovel" id="telemovel" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['telemovel'];?>
" />
			<br />
			<br />
			
			<label for="instituicao">Instituição:</label>
			<input type="text" size="80" name="instituicao" id="instituicao" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['instituicao'];?>
" />
			<br />
			<br />
			
			<label for="morada">Morada:</label>
			<input type="text" size="80" name="morada" id="morada" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['morada'];?>
" />
			<br />
			<br />
			
			<label for="titulo">Titulo:</label>
			<input type="text" size="80" name="titulo" id="titulo" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['titulo'];?>
" />
			<br />
			<br />
			
			<label for="gabinete">Gabinete:</label>
			<input type="text" size="80" name="gabinete" id="gabinete" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['gabinete'];?>
" />
			<br />
			<br />
			
			<label for="password">Password:</label>
			<input type="password" size="80" name="password" id="password" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['password'];?>
" />
			<br />
			<br />			
			
			<label for="password2">Repetir:</label>
			<input type="password" size="80" name="password2" id="password2" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['password'];?>
" />
			<br />
			<br />			
			
			<label for="tipo">Permissões:</label>
			<select name="tipo" id="tipo">
				<option value="1"<?php if ($_smarty_tpl->tpl_vars['user']->value['tipo']==1){?> selected<?php }?>>Administrador</option>
				<option value="2"<?php if ($_smarty_tpl->tpl_vars['user']->value['tipo']==2){?> selected<?php }?>>Docente</option>
				<option value="3"<?php if ($_smarty_tpl->tpl_vars['user']->value['tipo']==3){?> selected<?php }?>>Monitor</option>
			</select>
			<br />
			<br />
					
			<p class="right"><input type="submit" value="Editar" /></p>
		</form>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>