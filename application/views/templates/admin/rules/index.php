<div class="btn-group navbar">
  <a class="btn" href="/admin/goods/"><i class="icon-arrow-left"></i> Список товаров</a>
  <a class="btn btn-primary" href="/admin/rules/add/"><i class="icon-plus icon-white"></i> Добавить ценовую категорию</a>
</div>


<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Наименование</th>
      <th width="90"></th>
    </tr>
  </thead>
  <tbody>
  <?
  if (count($items) > 0) {
      foreach ($items AS $item) {
  ?>
    <tr>
      <td><?=$item->id?></td>
      <td><?=$item->name?></td>
      <td>
        <a href="/admin/rules/edit/<?=$item->id?>" class="btn btn-mini" title="Редактировать"><i class="icon-pencil"></i></a>
        <a href="/admin/rules/delete/<?=$item->id?>" onclick="if (!confirm('Вы уверены?')) return false;" class="btn btn-mini btn-danger" title="Удалить"><i class="icon-remove icon-white"></i></a>
      </td>
    </tr>
  <?
      }
  }     
  ?>
  </tbody>
</table>