<? include 'dex.php'; ?>
<div class="container-fluid mt--6">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card-wrapper">
        <!-- Form controls -->
        <div class="card">
          <!-- Card header -->
          <div class="card-header">
            <h3 class="mb-0">Список пользователей</h3>
          </div>
          <!-- Card body -->
          <div class="card-body">
                                <?echo $Admin->all_console_users();?>
			</div>
		    <div class="card-header">
            <h3 class="mb-0">Действие с консолью</h3>
          </div>
          <!-- Card body -->
          <div class="card-body">
<?php
switch ($_GET['type']) {
    case "edit":
        $console = $Admin->console($_GET['id']);
        if (!$console)
            echo $Admin->alert("Пользователь не найден!", "danger");
        else {
            if(isset($_POST['update_console'])) echo $Admin->update_console($_POST, $console->id);
            ?>
            <form method="post">
                <div class="form-group">
                    <label class="control-label">Ник пользователя</label>
                    <input class="form-control" placeholder="Test" type="text" name="name" value="<?= $console->nick ?>">
                </div>
                <div class="form-group">
                    <label class="control-label">Пароль пользователя</label>
                    <input class="form-control" placeholder="123qwe" type="text" name="pass" value="<?= $console->password ?>">
                </div>
                <div class="form-group">
                    <label class="control-label">Команды</label>
                    <input class="form-control" placeholder="ban;mute;kick" type="text" name="commands" value="<?= $console->commands ?>">
                </div>
                <div class="form-group">
                    <label class="control-label">Сервер сортировки</label>
                    <select name="server" class="form-control">
                        <?php
                        $query = $Admin->engine->query("SELECT * FROM `extradition`");
                        $selected = $Admin->engine->query_result("SELECT * FROM `extradition` WHERE `id` = '".$console->server."'");
                        echo '<option selected value="'.$selected->id.'">'.$selected->name.'</option>';
                        while ($q = $query->fetch_object()) {
                            if($q->id == $selected->id) continue;
                            echo '<option value="'.$q->id.'">'.$q->name.'</option>';
                        } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-success btn-block btn-todo" name="update_console"><i aria-hidden="true"></i> Изменить пользователя</button>
            </form>
            <?php
        }
        break;
    case "remove":
        $console = $Admin->console($_GET['id']);
        if (!$console)
            echo $Admin->alert("Пользователь не обнаружен!", "danger");
        else {
            echo $Admin->alert("Вы собираетесть удалить пользователя [{$console->nick}], вы подтверждаете это действие?", "warning");
            if(isset($_GET['delete']))
            {
                $Admin->remove_console($console->id);
                echo $Admin->alert("Вы успешно удалили пользователя [{$console->nick}]", "success");
            } else echo '<a href="?console&type=remove&id='.$console->id.'&delete" class="btn btn-danger btn-block btn-todo"><i aria-hidden="true"></i> Удалить пользователя</a>';
        }
        break;
    default:
        if(isset($_POST['add_console'])) echo $Admin->add_console($_POST);
        ?>
        <form method="post">
            <div class="form-group">
                <label class="control-label">Ник пользователя</label>
                <input class="form-control" placeholder="Test" type="text" name="name">
            </div>
            <div class="form-group">
                <label class="control-label">Пароль пользователя</label>
                <input class="form-control" placeholder="123qwe" type="text" name="pass">
            </div>
            <div class="form-group">
                <label class="control-label">Команды</label>
                <input class="form-control" placeholder="ban;mute;kick" type="text" name="commands">
            </div>
            <div class="form-group">
                <label class="control-label">Сервер выдачи</label>
                <select name="server" class="form-control">
                    <?php
                    $query = $Admin->engine->query("SELECT * FROM `extradition`");
                    while ($q = $query->fetch_object()) {
                        echo '<option value="'.$q->id.'">'.$q->name.'</option>';
                    } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success btn-block btn-todo" name="add_console"><i aria-hidden="true"></i> Добавить пользователя</button>
        </form>
    <?php
}
?>
                                <?php
                                if(file_exists($_SERVER['DOCUMENT_ROOT'].'/admin/actions/'.$action.'.php'))
                                    include $_SERVER['DOCUMENT_ROOT'].'/admin/actions/'.$action.'.php';
                                else echo $Admin->alert("<b>Ошибка!</b> Страница не найдена!", "danger");
                                ?>