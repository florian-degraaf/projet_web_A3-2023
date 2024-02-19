<?php
/* Smarty version 4.3.0, created on 2023-03-22 14:58:09
  from 'D:\Programs\wamp64\www\PROJETWEB\libs\templates\echeancier.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_641b1781e88205_42541615',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd70382ed083b6b3685529048e92d0b855503bf83' => 
    array (
      0 => 'D:\\Programs\\wamp64\\www\\PROJETWEB\\libs\\templates\\echeancier.tpl',
      1 => 1679496723,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_641b1781e88205_42541615 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Échéancier</title>
</head>
<body>
    <h1>Échéancier</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Ligne</th>
                <th>Description</th>
                <th>Montant</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['echeancier']->value, 'ligne');
$_smarty_tpl->tpl_vars['ligne']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ligne']->value) {
$_smarty_tpl->tpl_vars['ligne']->do_else = false;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['ligne']->value['ligne'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['ligne']->value['description'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['ligne']->value['montant'];?>
 €</td>
            </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
</body>
</html>
<?php }
}
