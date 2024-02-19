<?php
/* Smarty version 4.3.0, created on 2023-03-28 23:56:28
  from 'D:\Programs\wamp64\www\PROJETWEB\libs\templates\offers_home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64237eac017418_75415502',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0d81ac3895df96fbc3232371ce8c9c43532bd17b' => 
    array (
      0 => 'D:\\Programs\\wamp64\\www\\PROJETWEB\\libs\\templates\\offers_home.tpl',
      1 => 1680047775,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64237eac017418_75415502 (Smarty_Internal_Template $_smarty_tpl) {
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

    <button id="offer" data-id="7" type="button">tableau offres</button>
    <div id="table_container"></div>

    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="templates/offers_home.js"><?php echo '</script'; ?>
>
</body>


</html><?php }
}
