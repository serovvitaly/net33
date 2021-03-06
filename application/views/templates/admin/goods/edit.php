<form action="/admin/goods/save/" method="post" enctype="multipart/form-data">

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

    <label>Артикул:</label>
    <input type="text" name="goods[articul]" class="span3" value="<?=$item->articul?>">

    <label>Видимость:</label>
    <select name="goods[show]" class="span2">
      <option<?=($item->show == 0 ? ' selected="selected"' : '')?> value="0">скрыт</option>
      <option<?=($item->show == 1 ? ' selected="selected"' : '')?> value="1">активен</option>
    </select>

    <label>Категория:</label>
    <select name="goods[cat_id]" class="span4">
      <option>- - -</option>
    <?
    if (count($cats) > 0) {
        foreach ($cats AS $cat) {
            $selected = ($cat->id == $item->cat_id) ? ' selected="selected"' : '';
            echo '<option' . $selected . ' value="' . $cat->id . '">' . $cat->name . '</option>';
        }
    }
    ?>
    </select>
    
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
    <input type="file" name="image" class="span6">
    <div style="margin-top: 20px;">
      <h5><?= $item->image ?></h5>
      <img src="<?= ($item->image == '' ? '/skins/default/img/160x120.gif' : '/data/sources/400x300/' . $item->image) ?>" alt="">
    </div>
  </div>
  
</div>
  
</fieldset>

</form>