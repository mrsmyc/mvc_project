<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link href="/public/css/bootstrap.css" rel="stylesheet">   
    <title><?=$title?></title>
</head>
<body>
<div class="container">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="/">Task manager</a>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
      <?if(isset($_COOKIE['PHPSESSID']) && isset($_COOKIE['user_role'])):?>
        <a class="nav-link" href="/logout">Выйти</a>
      <?else:?>
        <a class="nav-link" href="/login">Войти</a>
      <?endif;?>
      </li>
    </ul>
  </div>
</nav>
  <?=$data?>
</div>
<script src="/public/js/bootstrap.js"></script>
</body>
</html>