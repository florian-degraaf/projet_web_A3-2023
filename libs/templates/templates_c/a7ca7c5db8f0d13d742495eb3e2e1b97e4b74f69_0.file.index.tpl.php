<?php
/* Smarty version 4.3.0, created on 2023-03-24 08:47:31
  from 'D:\Programs\wamp64\www\PROJETWEB\libs\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_641d63a3ad65d6_55757575',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7ca7c5db8f0d13d742495eb3e2e1b97e4b74f69' => 
    array (
      0 => 'D:\\Programs\\wamp64\\www\\PROJETWEB\\libs\\templates\\index.tpl',
      1 => 1679593494,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_641d63a3ad65d6_55757575 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
	<form method="POST" action="index.php">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username" required><br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required><br><br>
		<input type="submit" value="Login" name="submit">
	</form>
</body>
</html>


<?php }
}
