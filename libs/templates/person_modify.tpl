<table>
  <tbody>
    <td>nom<input type="text" class="input" name="nom" value="{$data_for_id["nom"]}"></td>
    <td>prenom<input type="text" class="input" name="prenom" value="{$data_for_id["prenom"]}"></td>
    <td>dob<input type="text" class="input" name="dob" value="{$data_for_id["dob"]}"></td>
    <td>role<input type="text" class="input" name="role" value="{$role}"></td>
    <tr><td><input type="button" name="confirm" data-id="{$data_for_id['id']}" value="confirm"></td></tr>
    
  </tbody>
</table>

<script src="templates/person_modify.js">
< script >