<table>
  <thead>
    <tr>
      {foreach $data[0] as $key => $value}
        <th>{$key}</th>
      {/foreach}
        <th>nom_secteur</th>
        <th>adresse_localite</th>
        <th><input type="button" name="create" class="{$table}" value="créer"></th> 
    </tr>
  </thead>
  <tbody>
    {foreach $data as $key=>$row}
        {foreach $row as $item}
          <td>{$item}</td>
        {/foreach}
        <td><select name="sectors">
        {foreach $sectors[$key] as $item}
          <option value="{$item}">{$item}</option>
        {/foreach}
        </select></td>
        <td><select name="locations">
        {foreach $locations[$key] as $item}
          <option value="{$item}">{$item}</option>
        {/foreach}
        </select></td>
        <td><input name="modify" class={$table} type="button" data-id="{$row["id"]}" value="modifier"></td>
        <td><input name="delete" class={$table} type="button" data-id="{$row["id"]}" value="delete"></td>
      </tr>
    {/foreach}
  </tbody>
</table>

<script src="templates/select_company.js">
< script >