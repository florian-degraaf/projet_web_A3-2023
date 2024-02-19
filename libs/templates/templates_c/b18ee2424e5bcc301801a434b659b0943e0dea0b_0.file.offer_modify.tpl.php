<?php
/* Smarty version 4.3.0, created on 2023-03-29 09:42:24
  from 'D:\Programs\wamp64\www\PROJETWEB\libs\templates\offer_modify.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6424080019d6d3_88821169',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b18ee2424e5bcc301801a434b659b0943e0dea0b' => 
    array (
      0 => 'D:\\Programs\\wamp64\\www\\PROJETWEB\\libs\\templates\\offer_modify.tpl',
      1 => 1680082938,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6424080019d6d3_88821169 (Smarty_Internal_Template $_smarty_tpl) {
?><table>
    <tbody>
        <table>
            <tr>
                <td>titre<input type="text" class="input" name="titre" value="<?php echo $_smarty_tpl->tpl_vars['data']->value["titre"];?>
"></td>
                <td>date_offre<input type="text" class="input" name="date_offre" value="<?php echo $_smarty_tpl->tpl_vars['data']->value["date_offre"];?>
"></td>
                <td>base_de_remuneration<input type="text" class="input" name="base_de_remuneration" value="<?php echo $_smarty_tpl->tpl_vars['data']->value["base_de_remuneration"];?>
"></td>
                <td>duree_stage<input type="text" class="input" name="duree_stage" value="<?php echo $_smarty_tpl->tpl_vars['data']->value["duree_stage"];?>
"></td>
                <td>nombre_places<input type="text" class="input" name="nombre_places" value="<?php echo $_smarty_tpl->tpl_vars['data']->value["nombre_places"];?>
"></td>
                <td>description_offre<input type="text" class="input" name="description_offre" value="<?php echo $_smarty_tpl->tpl_vars['data']->value["description_offre"];?>
"></td>
                <td>entreprise<input type="text" class="input" name="entreprise" value="<?php echo $_smarty_tpl->tpl_vars['company']->value[0]['nom'];?>
"></td>
                <td>localite<input type="text" class="input" name="localite" value="<?php echo $_smarty_tpl->tpl_vars['location']->value[0]['adresse_localite'];?>
"></td>
            </tr>

            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['skills']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                <tr>
                    <td><p name="skill"><?php echo $_smarty_tpl->tpl_vars['row']->value;?>
</p></td>
                    <td><input type="button" name="delete_skill" data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value;?>
" value="delete"></td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

            <tr>
            <td>Ajouter une competence<input type="text" id="input_skill"><td>
            <td><input type="button" name="add_skill" value="add"></td>
        </tr>     
        <tr><td><input type="button" name="confirm" value="confirm" data-id="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
"></td></tr>

        </table>
    </tbody>
</table>

<?php echo '<script'; ?>
 src="templates/offer_modify.js">
< script ><?php }
}
