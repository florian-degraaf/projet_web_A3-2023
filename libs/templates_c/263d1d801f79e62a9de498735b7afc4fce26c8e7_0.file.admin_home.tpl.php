<?php
/* Smarty version 4.3.0, created on 2023-03-28 21:13:07
  from 'D:\Programs\wamp64\www\PROJETWEB\libs\templates\admin_home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_642358639d1e54_62934258',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '263d1d801f79e62a9de498735b7afc4fce26c8e7' => 
    array (
      0 => 'D:\\Programs\\wamp64\\www\\PROJETWEB\\libs\\templates\\admin_home.tpl',
      1 => 1680037970,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_642358639d1e54_62934258 (Smarty_Internal_Template $_smarty_tpl) {
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
    <button id="offer" type="button">tableau offres</button>
    <a id="offers" type="button" href="offers_home.php">offres</a>

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
