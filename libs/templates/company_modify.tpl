<table>
    <tbody>
        <table>
            <tr>
                <td>Nom<input type="text" class="input" name="nom" value="{$data["nom"]}"></td>
                <td>Evaluation stagaire<input type="text" class="input" name="evaluation_stagaire" value="{$data["evaluation_stagaire"]}"></td>
                <td>Confiance pilote<input type="text" class="input" name="confiance_pilote" value="{$data["confiance_pilote"]}"></td>
                <td>Description<input type="text" class="input" name="description_entreprise" value="{$data["description_entreprise"]}"></td>
            <tr><td><p>Secteur(s)</p></td>
            {foreach $sectors as $row}
                <tr>
                  <td><p name="secteur">{$row}</p></td>
                  <td><input type="button" name="delete_sector" data-id="{$row}" value="delete"></td>
                </tr>
              {/foreach}
              </tr>
                <td>Ajouter un secteur<input type="text" id="input_sector"><td>
                <td><input type="button" name="add_sector" value="add"></td>
            </tr><td><p>Localité(s)</p></td>
            {foreach $locations as $row}
                <tr>
                    <td><p name="localite">{$row}</p></td>
                    <td><input type="button" name="delete_location" data-id="{$row}" value="delete"></td>
                </tr>
            {/foreach}
            <tr>
                <td>Ajouter un localité<input type="text" id="input_location"><td>
                <td><input type="button" name="add_location" value="add"></td>
            </tr>            
            <tr><td><input type="button" name="confirm" value="confirm" data-id="{$data['id']}"></td></tr>
        </table>
    </tbody>
</table>

<script src="templates/company_modify.js">
< script >