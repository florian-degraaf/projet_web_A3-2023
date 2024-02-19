<?php
/* Smarty version 4.3.0, created on 2023-03-28 07:21:07
  from 'D:\Programs\wamp64\www\PROJETWEB\libs\templates\company_create.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_642295637b64a5_56907354',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd361fdc60fe642624f4004bdea578d27516abd66' => 
    array (
      0 => 'D:\\Programs\\wamp64\\www\\PROJETWEB\\libs\\templates\\company_create.tpl',
      1 => 1679987985,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_642295637b64a5_56907354 (Smarty_Internal_Template $_smarty_tpl) {
?><table>
    <tbody>
        <table>
            <tr>
                <td>Nom<input type="text" class="input" name="nom"></td>
                <td>Evaluation stagaire<input type="text" class="input" name="evaluation_stagaire"></td>
                <td>Confiance pilote<input type="text" class="input" name="confiance_pilote"></td>
                <td>Description<input type="text" class="input" name="description_entreprise"></td>
         
            <tr><td><input type="button" name="confirm" value="confirm"></td></tr>
        </table>
    </tbody>
</table>

<?php echo '<script'; ?>
 src="templates/company_create.js">
< script ><?php }
}
