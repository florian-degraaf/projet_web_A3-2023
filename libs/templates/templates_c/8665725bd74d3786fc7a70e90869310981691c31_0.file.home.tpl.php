<?php
/* Smarty version 4.3.0, created on 2023-03-24 09:01:20
  from 'D:\Programs\wamp64\www\PROJETWEB\libs\templates\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_641d66e0c699b9_28832662',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8665725bd74d3786fc7a70e90869310981691c31' => 
    array (
      0 => 'D:\\Programs\\wamp64\\www\\PROJETWEB\\libs\\templates\\home.tpl',
      1 => 1679648362,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_641d66e0c699b9_28832662 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>

<body>
    <p>succes</p>
    <p>ID de la personne connecté : <?php echo $_smarty_tpl->tpl_vars['person_id']->value;?>
</p>
    <p>Role de la personne connecté : <?php echo $_smarty_tpl->tpl_vars['role']->value;?>
</p>
    <input type="button" id="person" value="person">
    <p id="p">e</p>
    <div id="table_container"></div>
        <table id="person_table" border='1'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>DOB</th>
                    <th>Login</th>
                    <th>Mot de passe</th>
                    <th>Role ID</th>
                </tr>
            </thead>
    
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['nom'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['prenom'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['dob'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['login'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['mot_de_passe'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['row']->value['roles_id'];?>
</td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>

    <?php echo '<script'; ?>
 src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="templates/home.js">
    <?php echo '</script'; ?>
>
</body>


</html><?php }
}
