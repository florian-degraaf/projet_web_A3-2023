<table border=1>
  <thead>
    <tr>
      {foreach $data[0] as $key => $value}
        <th>{$key}</th>
      {/foreach}
    </tr>
  </thead>
  <tbody>
    {foreach $data as $row}
      <tr>
          {foreach $row as $key => $value}
            <td>{$value}</td>
          {/foreach}
          <input id="modify" class={$table} type="button" value="modifier">
      </tr>
    {/foreach}
  </tbody>
</table>

<script src="templates/modify.js"><script>