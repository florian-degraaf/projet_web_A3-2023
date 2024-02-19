<?php
/* Smarty version 4.3.0, created on 2023-03-25 09:23:40
  from 'D:\Programs\wamp64\www\PROJETWEB\libs\templates\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_641ebd9c300d19_06434996',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a85fe142e23ce8ada6c639a82552f9b8ca13e44' => 
    array (
      0 => 'D:\\Programs\\wamp64\\www\\PROJETWEB\\libs\\templates\\home.tpl',
      1 => 1679736218,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_641ebd9c300d19_06434996 (Smarty_Internal_Template $_smarty_tpl) {
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
    <button id="person" type="button">tableau personne</button>
    <button id="company" type="button">tableau entreprise</button>
    <div id="table_container"></div>

    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="templates/home.js"><?php echo '</script'; ?>
>
</body>


</html><?php }
}
