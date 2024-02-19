<?php
/* Smarty version 4.3.0, created on 2023-03-28 12:28:11
  from 'D:\Programs\wamp64\www\PROJETWEB\libs\templates\person_modify.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6422dd5b1e7c57_32760762',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd8bffcca26fa1ae462428d62a40d8c18a01d394c' => 
    array (
      0 => 'D:\\Programs\\wamp64\\www\\PROJETWEB\\libs\\templates\\person_modify.tpl',
      1 => 1680006480,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6422dd5b1e7c57_32760762 (Smarty_Internal_Template $_smarty_tpl) {
?><table>
  <tbody>
    <td>nom<input type="text" class="input" name="nom" value="<?php echo $_smarty_tpl->tpl_vars['data_for_id']->value["nom"];?>
"></td>
    <td>prenom<input type="text" class="input" name="prenom" value="<?php echo $_smarty_tpl->tpl_vars['data_for_id']->value["prenom"];?>
"></td>
    <td>dob<input type="text" class="input" name="dob" value="<?php echo $_smarty_tpl->tpl_vars['data_for_id']->value["dob"];?>
"></td>
    <td>role<input type="text" class="input" name="role" value="<?php echo $_smarty_tpl->tpl_vars['role']->value;?>
"></td>

    <tr><td><input type="button" id="confirm" data-id="<?php echo $_smarty_tpl->tpl_vars['data_for_id']->value['id'];?>
" value="confirm"></td></tr>

  </tbody>
</table>

<?php echo '<script'; ?>
 src="templates/person_modify.js">
< script ><?php }
}
