<form action="/admin/goods/save/" method="post">

<input type="hidden" name="goods[id]" value="<?=$item->id?>">

<div class="btn-group navbar">
  <a class="btn" href="/admin/goods/"><i class="icon-arrow-left"></i> Список товаров</a>
  <button class="btn btn-success" href="/admin/goods/add/"><i class="icon-ok icon-white"></i> Сохранить</button>
</div>


<fieldset>

<legend>Новый товар</legend>
  
<div class="row">
  
  <div class="span6">
    <label>Наименование:</label>
    <input type="text" name="goods[title]" class="span5" value="<?=$item->title?>">

    <label>Описание:</label>
    <textarea cols="" rows="4" name="goods[descript]" class="span5"><?=$item->descript?></textarea>

    <label>Цены:</label>
    <?
    if (count($rules) > 0) {
      foreach ($rules AS $rule) {
          echo '<div><span class="span3">' . $rule->name . '</span><input type="text" name="goods[price_' . $rule->id . ']" value="' . $item->get_price($rule->id) . '" class="span2"> руб.</div>';
      }
    }  
    ?>
  </div>
  
  <div class="span6">
    <label>Картинка:</label>
    <input type="file" name="good[image]" class="span6">
  </div>
  
</div>
  
</fieldset>

</form>