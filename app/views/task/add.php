<div class="mt-3">
    <?if(!empty($data['errors'])):?>
        <?foreach($data['errors'] as $error):?>
            <p class="text-danger" id="task_errors"><?=$error?></p>
        <?endforeach;?>
    <?endif;?>
    <?if(!empty($data['success'])):?>
        <p class="text-success" id="task_errors"><?=$data['success']?></p>
    <?endif;?>
    <form name="taskForm" method="POST">
    <div class="form-group">
        <label for="exampleInputEmail1">Имя:</label>
        <input name="name" type="text" class="form-control"  placeholder="Введите имя" <?if(isset($data['name'])){echo "value='" . $data['name'] . "'";}?> <?if(!empty($data['success'])){echo 'readonly';}?>>        
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email:</label>
        <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите email" <?if(isset($data['email'])){echo "value='" . $data['email'] . "'";}?> <?if(!empty($data['success'])){echo 'readonly';}?>>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Задача:</label>
        <textarea name="text" class="form-control" rows="3" <?if(!empty($data['success'])){echo 'readonly';}?>><?if(isset($data['text'])){echo $data['text'];}?></textarea>
    </div>
    <?if(isset($data[0]['Id'])):?>
        <div class="form-check">
            <input name="done" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault"<?if(isset($data[0]['done']) && $data[0]['done'] == 1){echo 'checked';}?>>
            <label class="form-check-label" for="flexCheckDefault">
                Выполнена
            </label>
        </div>
    <?endif;?>
    <?if(empty($data['success'])):?>    
        <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
    <?else:?>
        <a href="/" class="btn btn-primary mt-2">На главную</a>        
    <?endif;?>
    </form>
</div>