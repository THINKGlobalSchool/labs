<?php
?>
<script type="text/template" id="item-template">
  <div class="view">
    <input class="toggle" type="checkbox" <%= completed ? 'checked' : '' %>>
    <label><%- title %></label>
    <input class="edit" value="<%- title %>">
    <button class="destroy elgg-button elgg-button-action">Remove</button>
  </div>
</script>