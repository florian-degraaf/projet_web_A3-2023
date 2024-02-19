<?php
/* Smarty version 4.3.0, created on 2023-03-28 07:23:00
  from 'D:\Programs\wamp64\www\PROJETWEB\libs\templates\company_modify.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_642295d4caeb02_01108516',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5cd1a2855fd3bffa53f8ff750180d2dbdb8acca5' => 
    array (
      0 => 'D:\\Programs\\wamp64\\www\\PROJETWEB\\libs\\templates\\company_modify.tpl',
      1 => 1679987923,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_642295d4caeb02_01108516 (Smarty_Internal_Template $_smarty_tpl) {
?><table>
    <tbody>
        <table>
            <tr>
                <td>Nom<input type="text" class="input" name="nom" value="<?php echo $_smarty_tpl->tpl_vars['data']->value["nom"];?>
"></td>
                <td>Evaluation stagaire<input type="text" class="input" name="evaluation_stagaire" value="<?php echo $_smarty_tpl->tpl_vars['data']->value["evaluation_stagaire"];?>
"></td>
                <td>Confiance pilote<input type="text" class="input" name="confiance_pilote" value="<?php echo $_smarty_tpl->tpl_vars['data']->value["confiance_pilote"];?>
"></td>
                <td>Description<input type="text" class="input" name="description_entreprise" value="<?php echo $_smarty_tpl->tpl_vars['data']->value["description_entreprise"];?>
"></td>
            <tr><td><p>Secteur(s)</p></td>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sectors']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                <tr>
                  <td><p name="secteur"><?php echo $_smarty_tpl->tpl_vars['row']->value;?>
</p></td>
                  <td><input type="button" name="delete_sector" data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value;?>
" value="delete"></td>
                </tr>
              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </tr>
                <td>Ajouter un secteur<input type="text" id="input_sector"><td>
                <td><input type="button" name="add_sector" value="add"></td>
            </tr><td><p>Localité(s)</p></td>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['locations']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                <tr>
                    <td><p name="localite"><?php echo $_smarty_tpl->tpl_vars['row']->value;?>
</p></td>
                    <td><input type="button" name="delete_location" data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value;?>
" value="delete"></td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <tr>
                <td>Ajouter un localité<input type="text" id="input_location"><td>
                <td><input type="button" name="add_location" value="add"></td>
            </tr>            
            <tr><td><input type="button" name="confirm" value="confirm" data-id="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
"></td></tr>
        </table>
    </tbody>
</table>

<?php echo '<script'; ?>
 src="templates/company_modify.js">
< script ><?php }
}
