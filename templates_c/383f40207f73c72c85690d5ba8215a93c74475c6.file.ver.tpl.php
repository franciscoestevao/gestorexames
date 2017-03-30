<?php /* Smarty version Smarty-3.1.5, created on 2015-12-21 00:45:28
         compiled from "../templates/exames/ver.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11168037045671ee1b3360e3-49704682%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '383f40207f73c72c85690d5ba8215a93c74475c6' => 
    array (
      0 => '../templates/exames/ver.tpl',
      1 => 1450655092,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11168037045671ee1b3360e3-49704682',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_5671ee1b3fc14',
  'variables' => 
  array (
    'exame' => 0,
    'pergunta' => 0,
    'type' => 0,
    'lastg' => 0,
    'lastp' => 0,
    'id' => 0,
    'eid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5671ee1b3fc14')) {function content_5671ee1b3fc14($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<!-- <pre><?php echo print_r($_smarty_tpl->tpl_vars['exame']->value);?>
</pre>  -->
<table>
 <tr>
    <td class="left"><h1>Ver Exame</h1></td>
   </tr>
   </table>
    <h2>Disciplina : <?php echo $_smarty_tpl->tpl_vars['exame']->value[0]['disciplina'];?>
</h2>

    <h3> Perguntas </h3>
    
    <?php $_smarty_tpl->tpl_vars['lastp'] = new Smarty_variable(0, null, 0);?>
    <?php $_smarty_tpl->tpl_vars['lastg'] = new Smarty_variable(0, null, 0);?>
    <table>

        <?php  $_smarty_tpl->tpl_vars['pergunta'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pergunta']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['exame']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pergunta']->key => $_smarty_tpl->tpl_vars['pergunta']->value){
$_smarty_tpl->tpl_vars['pergunta']->_loop = true;
?>
        
            <?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable(Perguntas::getGtype($_smarty_tpl->tpl_vars['pergunta']->value['gid']), null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['type']->value=="Grupo"){?>
                <?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable($_smarty_tpl->tpl_vars['pergunta']->value['gid'], null, 0);?>
            <?php }else{ ?>
                <?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable($_smarty_tpl->tpl_vars['pergunta']->value['pid'], null, 0);?>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['lastg']->value!=$_smarty_tpl->tpl_vars['pergunta']->value['gid']){?>
                <?php $_smarty_tpl->tpl_vars['lastg'] = new Smarty_variable($_smarty_tpl->tpl_vars['pergunta']->value['gid'], null, 0);?>

                <?php if ($_smarty_tpl->tpl_vars['lastp']->value!=$_smarty_tpl->tpl_vars['pergunta']->value['pid']){?>
                    <?php $_smarty_tpl->tpl_vars['lastp'] = new Smarty_variable($_smarty_tpl->tpl_vars['pergunta']->value['pid'], null, 0);?>
                   
                    <tr style="border-top: solid 2px #C0C0C0 ">
                        <td> <?php echo $_smarty_tpl->tpl_vars['pergunta']->value['texto'];?>
 </td>
                        <td></td>
                        <td class="right"><b><a href="../perguntas/verQuestao.php?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">VER</a></b></td>
                    </tr>
                <?php }?>
                <?php if (!empty($_smarty_tpl->tpl_vars['pergunta']->value['resposta'])){?>
                    <tr>
                        <td> R:___________________________ </td>
                        <td></td>
                    </tr>
                <?php }?>
                <?php if (!empty($_smarty_tpl->tpl_vars['pergunta']->value['opcao'])){?>
                    <tr>
                        <td><rspace> </rspace>&square; <?php echo $_smarty_tpl->tpl_vars['pergunta']->value['opcao'];?>
 </td>
                        <td></td>
                    </tr>
                <?php }?>
            <?php }?>

        <?php } ?>
</table>

<div class="right">



<b><a href="../exames/editar.php?id=<?php echo $_smarty_tpl->tpl_vars['eid']->value;?>
">EDITAR</a></b>
<br>
<b><a href="../exames/apagar.php?id=<?php echo $_smarty_tpl->tpl_vars['eid']->value;?>
">APAGAR</a></b>
</div>
<br>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>