<?php
/* Smarty version 4.3.0, created on 2023-03-28 11:44:36
  from 'D:\Programs\wamp64\www\PROJETWEB\libs\templates\pilot_home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6422d324ef31c0_28949606',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7d68f740c5749caa7184b9f484fa284df960d5e6' => 
    array (
      0 => 'D:\\Programs\\wamp64\\www\\PROJETWEB\\libs\\templates\\pilot_home.tpl',
      1 => 1680003845,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6422d324ef31c0_28949606 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>

<body>
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
