<table>
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
            <input type="text" id="input" name={$key} value={$value}>
          {/foreach}
          <input type="button" id="confirm" value="confirm">
        </tr>
      {/foreach}
  </tbody>
</table>

<script src="templates/confirm.js">
< script >