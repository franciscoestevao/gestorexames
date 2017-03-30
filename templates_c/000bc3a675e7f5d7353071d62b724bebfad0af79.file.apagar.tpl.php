<?php /* Smarty version Smarty-3.1.5, created on 2015-12-17 16:32:34
         compiled from "../templates/principal/apagar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7765584385672d592ea8d23-43931250%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '000bc3a675e7f5d7353071d62b724bebfad0af79' => 
    array (
      0 => '../templates/principal/apagar.tpl',
      1 => 1450299749,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7765584385672d592ea8d23-43931250',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5672d5930a3ce',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5672d5930a3ce')) {function content_5672d5930a3ce($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


  <h1>Remover Utilizador</h1>

  <p>Tem a certeza que quer remover o seguinte utilizador? 
    [<a class="navtext" href="apagar_action.php?username=<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
">Sim</a>]
    [<a class="navtext" href="ver.php?username=<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
">Não</a>]
  </p>

<center>
	
  <table>
    <tr>
      <td style="width:1px" class="left"><b>Username:</b></td>
      <td class="left"><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</td>
    </tr>
    <tr>
      <td style="width:1px" class="left"><b>Nome:</b></td>
      <td class="left"><?php echo $_smarty_tpl->tpl_vars['user']->value['nome'];?>
</td>
    </tr>
    <tr>
      <td style="width:1px" class="left"><b>Instituição:</b></td>
      <td class="left"><?php echo $_smarty_tpl->tpl_vars['user']->value['instituicao'];?>
</td>
    </tr>
    <tr>
      <td style="width:1px" class="left"><b>Email:</b></td>
      <td class="left"><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</td>
    </tr>
    <tr>
      <td style="width:1px" class="left"><b>Permissões:</b></td>
      <td class="left"><?php echo Utilizadores::getPerm($_smarty_tpl->tpl_vars['user']->value['tipo']);?>
</td>
    </tr>
    <tr>
      <td style="width:1px" class="left"><b>Morada:</b></td>
      <td class="left"><?php echo $_smarty_tpl->tpl_vars['user']->value['morada'];?>
</td>
    </tr>
    <tr>
      <td style="width:1px" class="left"><b>Telemóvel:</b></td>
      <td class="left"><?php echo $_smarty_tpl->tpl_vars['user']->value['telemovel'];?>
</td>
    </tr>
    <tr>
      <td style="width:1px" class="left"><b>Título:</b></td>
      <td class="left"><?php echo $_smarty_tpl->tpl_vars['user']->value['titulo'];?>
</td>
    </tr>
    <tr>
      <td style="width:1px" class="left"><b>Gabinete:</b></td>
      <td class="left"><?php echo $_smarty_tpl->tpl_vars['user']->value['gabinete'];?>
</td>
    </tr>
  </table>

</center>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>