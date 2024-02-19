<?php
/* Smarty version 4.3.0, created on 2023-03-27 12:47:37
  from 'D:\Programs\wamp64\www\PROJETWEB\libs\templates\person_modify_table.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_642190695c7cf4_92833427',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fff24cd8d9b53549d06945c14455afba2f9768f9' => 
    array (
      0 => 'D:\\Programs\\wamp64\\www\\PROJETWEB\\libs\\templates\\person_modify_table.tpl',
      1 => 1679812296,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_642190695c7cf4_92833427 (Smarty_Internal_Template $_smarty_tpl) {
?><table>
  <thead>
    <tr>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value[0], 'value', false, 'key');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
        <th><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</th>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['row']->value, 'value', false, 'key');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
          <input type="text" class=<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
 id="input" name=<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
 value=<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <input type="button" id="confirm" value="confirm">
      </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </tbody>
</table>

<?php echo '<script'; ?>
 src="templates/confirm.js">
< script ><?php }
}
