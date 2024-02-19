<?php
/* Smarty version 4.3.0, created on 2023-03-28 12:09:57
  from 'D:\Programs\wamp64\www\PROJETWEB\libs\templates\select_person.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6422d91543e893_73755653',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dca26b034bffef230e6efef054106d01d4c5a91b' => 
    array (
      0 => 'D:\\Programs\\wamp64\\www\\PROJETWEB\\libs\\templates\\select_person.tpl',
      1 => 1680005396,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6422d91543e893_73755653 (Smarty_Internal_Template $_smarty_tpl) {
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
            <th><input type="button" name="create" class="<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
" value="créer"></th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'row', false, 'key');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['row']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</td>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <td><input name="modify" class=<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
 type="button" data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value["id"];?>
" value="modifier"></td>
            <td><input name="delete" class=<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
 type="button" data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value["id"];?>
" value="delete"></td>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>

<?php echo '<script'; ?>
 src="templates/select_person.js">
< script ><?php }
}
