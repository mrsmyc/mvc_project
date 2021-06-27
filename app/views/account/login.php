<?if(!empty($data['errors'])):?>
    <?foreach($data['errors'] as $error):?>
        <p class="text-danger" id="task_errors"><?=$error?></p>
    <?endforeach;?>
<?endif;?>
<form class="form-signin" method="POST">
      <h1 class="h3 mb-3 font-weight-normal">Вход</h1>
      <label for="inputEmail" class="sr-only">Логин:</label>
      <input type="text" name="login" class="form-control" placeholder="Логин"  <?if(isset($data['login'])){echo "value='" . $data['login'] . "'";}?>> 
      <label for="inputPassword" class="sr-only">Пароль:</label>
      <input type="password" name="password" class="form-control" placeholder="Пароль">
      <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Войти</button>      
</form>