<table>
    <thead>
        <tr>
            <th>id</th>
            <th>nom</th>
            <th>evaluation_stagaire</th>
            <th>confiance_pilote</th>
            <th>description_entreprise</th>
            <th>secteur</th>
        </tr>
    </thead>
    <tbody>
        <table>
            <tr>
                <td>ID<input type="text" class={$table} id="input" name="id" value={$data["id"]}></td>
                <td>Nom<input type="text" class={$table} id="input" name="nom" value={$data["nom"]}></td>
                <td>Evaluation stagaire<input type="text" class={$table} id="input" name="evaluation_stagaire" value={$data["evaluation_stagaire"]}></td>
                <td>Confiance pilote<input type="text" class={$table} id="input" name="confiance_pilote" value={$data["confiance_pilote"]}></td>
                <td>Description<input type="text" class={$table} id="input" name="description_entreprise" value={$data["description_entreprise"]}></td>
                {foreach $sectors as $row}
                    <td>Secteur<input type="text" class={$table} id="input" name="secteur" value={$row}></td>
                {/foreach}
                {foreach $locations as $row}
                    <td>Localite<input type="text" class={$table} id="input" name="localite" value={$row}></td>
                {/foreach}
            </tr>
            <input type="button" id="confirm" value="confirm">
        </table>
    </tbody>
</table>

<script src="templates/confirm.js">
< script >