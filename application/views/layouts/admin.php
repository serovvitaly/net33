<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Untitled</title>
  <link rel="stylesheet" type="text/css" href="/public/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="/skins/default/css/style.css">
</head>
<body>

<div class="container">

<div class="navbar" style="margin-top: 5px;">
  <div class="navbar-inner">
    <a class="brand" href="/admin/">ru:)</a>
    <ul class="nav">
    <?
    if (count($top_menu) > 0) {
        foreach ($top_menu AS $menu_item_link => $menu_item_text) {
            echo '<li' . ( ($action == $menu_item_link) ? ' class="active"' : '') . '><a href="/admin/' . $menu_item_link . '">' . $menu_item_text . '</a></li>';
        }
    }
    ?>
    </ul>
  </div>
</div>

<?= $content ?>
</div>

</body>
</html>
