<div class="btn-group navbar">
  <a class="btn btn-primary" href="/admin/goods/add/"><i class="icon-plus icon-white"></i> Добавить товар</a>
  <a class="btn" href="/admin/rules/"><i class="icon-align-left"></i> Управление категориями цен</a>
</div>


<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>Товар</th>
      <?
      if (count($rules) > 0) {
          foreach ($rules AS $rule) {
              echo '<th title="' . $rule->name . '">цена-' . $rule->id . '</th>';
          }
      }
      ?>
    </tr>
  </thead>
  <tbody>
  <?
  if (count($items) > 0) {
      foreach ($items AS $item) {
  ?>
    <tr>
      <td>
        <strong><?=$item->title?></strong> (<?=$item->id?>)<br/>
        <?=$item->descript?>
        <div>          
          <a href="/admin/goods/edit/<?=$item->id?>" style="color: green;">редактировать</a>
          <span style="padding: 0 5px; color: #969696">|</span> 
          <a href="/admin/goods/delete/<?=$item->id?>" onclick="if (!confirm('Вы уверены?')) return false;" style="color: red;">удалить</a>
        
        </div>
      </td>
      <?
      if (count($rules) > 0) {
          foreach ($rules AS $rule) {
              echo '<td>' . $item->get_price($rule->id) . '</td>';
          }
      }
      ?>
    </tr>
  <?
      }
  }     
  ?>
  </tbody>
</table>