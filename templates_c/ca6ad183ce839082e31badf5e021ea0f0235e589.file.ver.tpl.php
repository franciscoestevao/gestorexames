<?php /* Smarty version Smarty-3.1.5, created on 2015-12-17 10:37:15
         compiled from "../templates/principal/ver.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13736278095672824bd37370-53912723%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca6ad183ce839082e31badf5e021ea0f0235e589' => 
    array (
      0 => '../templates/principal/ver.tpl',
      1 => 1450299781,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13736278095672824bd37370-53912723',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5672824be5b46',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5672824be5b46')) {function content_5672824be5b46($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ('../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  
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
      <td style="width:1px" class="right"><b><a href="../principal/editar.php?username=<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
">EDITAR</a></b></td>
    </tr>
    <tr>
      <td style="width:1px" class="left"><b>Gabinete:</b></td>
      <td class="left"><?php echo $_smarty_tpl->tpl_vars['user']->value['gabinete'];?>
</td>
      <td style="width:1px" class="right"><b><a href="../principal/apagar.php?username=<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
">APAGAR</a></b></td>
    </tr>
  </table>

</center>

<?php echo $_smarty_tpl->getSubTemplate ('../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>