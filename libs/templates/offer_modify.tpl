<table>
    <tbody>
        <table>
            <tr>
                <td>titre<input type="text" class="input" name="titre" value="{$data["titre"]}"></td>
                <td>date_offre<input type="text" class="input" name="date_offre" value="{$data["date_offre"]}"></td>
                <td>base_de_remuneration<input type="text" class="input" name="base_de_remuneration" value="{$data["base_de_remuneration"]}"></td>
                <td>duree_stage<input type="text" class="input" name="duree_stage" value="{$data["duree_stage"]}"></td>
                <td>nombre_places<input type="text" class="input" name="nombre_places" value="{$data["nombre_places"]}"></td>
                <td>description_offre<input type="text" class="input" name="description_offre" value="{$data["description_offre"]}"></td>
                <td>entreprise<input type="text" class="input" name="entreprise" value="{$company[0]['nom']}"></td>
                <td>localite<input type="text" class="input" name="localite" value="{$location[0]['adresse_localite']}"></td>
            </tr>

            {foreach $skills as $row}
                <tr>
                    <td><p name="skill">{$row}</p></td>
                    <td><input type="button" name="delete_skill" data-id="{$row}" value="delete"></td>
                </tr>
            {/foreach}

            <tr>
            <td>Ajouter une competence<input type="text" id="input_skill"><td>
            <td><input type="button" name="add_skill" value="add"></td>
        </tr>     
        <tr><td><input type="button" name="confirm" value="confirm" data-id="{$data['id']}"></td></tr>

        </table>
    </tbody>
</table>

<script src="templates/offer_modify.js">
< script >