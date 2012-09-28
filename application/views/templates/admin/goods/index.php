<div class="btn-group navbar">
  <a class="btn btn-primary" href="/admin/goods/add/"><i class="icon-plus icon-white"></i> Добавить товар</a>
  <a class="btn" href="/admin/rules/"><i class="icon-align-left"></i> Управление категориями цен</a>
  <a class="btn btn-info" href="/admin/cats/"><i class="icon-folder-open icon-white"></i> Категории товаров</a>
</div>


<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th></th>
      <th>Описание</th>
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
      <td><img src="<?= ($item->image == '' ? '/skins/default/img/160x120.gif' : '/data/sources/160x120/' . $item->image) ?>" alt=""></td>
      <td>
        <strong><?=$item->title?></strong>
        <div>
           <table width="100%"><tr>
             <td style="width: 40px;">Ид: <?=$item->id?></td>
             <td style="width: 60px;">Арт.: <?=$item->articul?></td>
             <td style="width: 60px;"><?= ($item->show ? '<span style="background: blue; color: white; padding: 0 3px">активен</span>' : '<span style="background: gray; color: white; padding: 0 3px">скрыт</span>')?></td>
             <td style="text-align: right;"><a href="#<?=$item->cat->id?>"><?=$item->cat->name?></a></td>
           </tr></table>
        </div>
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