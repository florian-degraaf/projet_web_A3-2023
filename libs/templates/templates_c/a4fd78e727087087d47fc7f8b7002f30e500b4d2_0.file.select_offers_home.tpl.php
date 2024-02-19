<?php
/* Smarty version 4.3.0, created on 2023-03-29 00:15:12
  from 'D:\Programs\wamp64\www\PROJETWEB\libs\templates\select_offers_home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_642383100e7d20_50552092',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a4fd78e727087087d47fc7f8b7002f30e500b4d2' => 
    array (
      0 => 'D:\\Programs\\wamp64\\www\\PROJETWEB\\libs\\templates\\select_offers_home.tpl',
      1 => 1680048781,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_642383100e7d20_50552092 (Smarty_Internal_Template $_smarty_tpl) {
?><table>
    <thead>
        <tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'value', false, 'key');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                <th><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</th>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <th>entreprise</th>
            <th>adresse_localite</th>
            <th><input type="button" name="wishlist" class="<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['data']->value["id"];?>
" value="rajouter au wishlist"></th>
            <th><input type="button" name="wishlist_remove" class="<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['data']->value["id"];?>
" value="supprimer du wishlist"></th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</td>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['companies']->value[0], 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</td>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['locations']->value[0], 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</td>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php if ($_smarty_tpl->tpl_vars['apply_state']->value == 1) {?>
            <tr><td><p>CV</p></td></tr>
            <tr><td><input id="input" type="file" accept=".pdf" data-id="<?php echo $_smarty_tpl->tpl_vars['data']->value["id"];?>
" name="cv"></td></tr>          
            <tr><td><p>Lettre de motivation</p></td></tr>
            <tr><td><textarea id="input" data-id="<?php echo $_smarty_tpl->tpl_vars['data']->value["id"];?>
" name="motivation_letter"></textarea></td></tr>
            <td><input name="confirm" class=<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
 type="button" data-id="<?php echo $_smarty_tpl->tpl_vars['data']->value["id"];?>
" value="confirmer"></td>
        <?php } elseif ($_smarty_tpl->tpl_vars['apply_state']->value == 0) {?>
            <td><input name="apply" class=<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
 type="button" data-id="<?php echo $_smarty_tpl->tpl_vars['data']->value["id"];?>
" value="postuler"></td>
        <?php }?>
    </tbody>
</table>

<?php echo '<script'; ?>
 src="templates/select_offers_home.js">
< script ><?php }
}
