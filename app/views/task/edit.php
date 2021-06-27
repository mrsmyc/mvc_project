<div class="mt-3">
    <form name="taskForm" method="POST" >
    <?if(isset($data[0]['Id'])):?>
        <input name="id" type="text" value="<?=$data[0]['Id']?>" hidden>
    <?endif;?>
    <div class="form-group">
        <label for="exampleInputEmail1">Имя:</label>
        <input name="name" type="text" class="form-control"  placeholder="Введите имя" <?if(isset($data[0]['name'])){echo "value='" . $data[0]['name'] . "' " . "readonly";}?> >        
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email:</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите email" <?if(isset($data[0]['email'])){echo "value='" . $data[0]['email'] . "' " . "readonly";}?> >    
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Задача:</label>
        <textarea name="text" class="form-control" rows="3" ><?if(isset($data[0]['text'])){echo $data[0]['text'];}?></textarea>
    </div>
    <?if(isset($data[0]['Id'])):?>
        <div class="form-check">
            <input name="done" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault"<?if(isset($data[0]['done']) && $data[0]['done'] == 1){echo 'checked';}?>>
            <label class="form-check-label" for="flexCheckDefault">
                Выполнена
            </label>
        </div>
    <?endif;?>
    <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
    </form>
</div>