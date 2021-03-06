<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <?php \mysrc\core\base\View::getMeta()?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/custom.css">
  </head>
  <body>
    <div id="menu">
        <ul>
            <li><a href="/">Start</a></li>
            <li><a href="/page/about">Seite</a></li>
            <li><a href="/admin">Admin</a></li>
            <li><a href="/user/register">Register</a></li>
            <li><a href="/user/login">Login</a></li>
            <li><a href="/user/logout">Logout</a></li>
        </ul>
    </div>
    <div class="clear"></div>
    <div class="container">
        <?=$content?>
    <?php // debug(vendor\core\Db::$countSql)?>
    <?php // debug(vendor\core\Db::$queries)?>
      </div>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <?php
    foreach ($scripts as $script) {
        echo $script;
    }
    ?>
  </body>
</html>