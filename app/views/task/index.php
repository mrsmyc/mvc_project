
<div class="d-flex flex-wrap justify-content-between mt-3">
  <div class="">
    <h5>Сортировка по имени пользователя:</h5>
    <form action="" >
      <select class="form-select" onchange="top.location=this.value">
        <option></option>
        <option value="?sort=name&order=asc"<?if(isset($_GET['sort']) && ($_GET['sort']=='name'&& $_GET["order"] == 'asc')){echo 'selected';}?>>По возрастанию</option>
        <option value="?sort=name&order=desc"<?if(isset($_GET['sort']) && ($_GET['sort']=='name'&& $_GET["order"] == 'desc')){echo 'selected';}?>>По убыванию</option>
      </select>
    </form>
  </div>
  <div class="">
    <h5>Сортировка по email:</h5>
    <form action="" >
      <select class="form-select" aria-label="Default select example" onchange="top.location=this.value">
        <option></option>
        <option value="?sort=email&order=asc"<?if(isset($_GET['sort']) && ($_GET['sort']=='email'&& $_GET["order"] == 'asc')){echo 'selected';}?>>По возрастанию</option>
        <option value="?sort=email&order=desc"<?if(isset($_GET['sort']) && ($_GET['sort']=='email'&& $_GET["order"] == 'desc')){echo 'selected';}?>>По убыванию</option>
      </select>
    </form>
  </div>
  <div class="">
    <h5>Сортировка по статусу:</h5>
    <form action="">
      <select class="form-select" aria-label="Default select example" onchange="top.location=this.value">
        <option></option>
        <option value="?sort=done&order=asc"<?if(isset($_GET['sort']) && ($_GET['sort']=='done'&& $_GET["order"] == 'asc')){echo 'selected';}?>>Не выполнено</option>
        <option value="?sort=done&order=desc"<?if(isset($_GET['sort']) && ($_GET['sort']=='done'&& $_GET["order"] == 'desc')){echo 'selected';}?>>Выполнено</option>
      </select>
    </form>
  </div>
</div>
<div class="mt-3">
  <a href="/task/add" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Добавить задачу</a>
</div>

<div class="d-flex flex-wrap justify-content-between mt-3">
<?foreach($data['tasks'] as $task):?>
<div class="card mt-2" style="width: 18rem;">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Имя пользователя: <?=$task['name'];?></li>
    <li class="list-group-item">Email: <?=$task['email'];?></li>
    <li class="list-group-item">Текст задачи: <?=$task['text'];?></li>
    <li class="list-group-item">Статус: 
    <?if($task['done']==true):
        echo '<span class="text-success">Выполнено</span>'; 
        else: 
        echo '<span class="text-danger">Не выполнено</span>';
    endif;?>        
    </li>
    <?if($task['redacted'] == 1):?>
      <li class="list-group-item">Отредактировано администратором</li>
    <?endif;?>
  </ul>
  <?if(isset($_COOKIE['user_role']) && $_COOKIE['user_role'] == 'admin'):?>
    <a href="/task/edit?id=<?=$task['Id'];?>" class="btn btn-primary mt-auto">Редактировать задачу</a>
  <?endif;?>
</div>
<?endforeach;?>
</div>

<nav aria-label="Page navigation example">
  <ul class="pagination mt-3">
    <?if($data['totalPages'] == 1):?>
    <?else:?>
      <?for ($i = 1; $i <= $data['totalPages']; $i++) {
        $pageArr = array_merge(['pageno' => $i], $_GET);
        $pageArr['pageno'] = $i;
        echo '<li class="page-item"><a class="page-link" href="?' .http_build_query($pageArr). '">' . $i . '</a></li>';
      }?>
    <?endif;?>        
  </ul>
</nav>
