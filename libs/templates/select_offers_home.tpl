<table>
    <thead>
        <tr>
            {foreach $data as $key => $value}
                <th>{$key}</th>
            {/foreach}
            <th>entreprise</th>
            <th>adresse_localite</th>
            <th><input type="button" name="wishlist" class="{$table}" data-id="{$data["id"]}" value="rajouter au wishlist"></th>
            <th><input type="button" name="wishlist_remove" class="{$table}" data-id="{$data["id"]}" value="supprimer du wishlist"></th>
        </tr>
    </thead>
    <tbody>
        {foreach $data as $item}
            <td>{$item}</td>
        {/foreach}
        {foreach $companies[0] as $item}
            <td>{$item}</td>
        {/foreach}
        {foreach $locations[0] as $item}
            <td>{$item}</td>
        {/foreach}
        {if $apply_state == 1}
            <tr><td><p>CV</p></td></tr>
            <tr><td><input id="input" type="file" accept=".pdf" data-id="{$data["id"]}" name="cv"></td></tr>          
            <tr><td><p>Lettre de motivation</p></td></tr>
            <tr><td><textarea id="input" data-id="{$data["id"]}" name="motivation_letter"></textarea></td></tr>
            <td><input name="confirm" class={$table} type="button" data-id="{$data["id"]}" value="confirmer"></td>
        {elseif $apply_state == 0}
            <td><input name="apply" class={$table} type="button" data-id="{$data["id"]}" value="postuler"></td>
        {/if}
    </tbody>
</table>

<script src="templates/select_offers_home.js">
< script >