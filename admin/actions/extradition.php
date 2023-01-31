<? include 'dex.php'; ?>
<div class="container-fluid mt--6">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card-wrapper">
        <!-- Form controls -->
        <div class="card">
          <!-- Card header -->
          <div class="card-header">
            <h3 class="mb-0">Список серверов выдачи</h3>
          </div>
          <!-- Card body -->
          <div class="card-body">
                                <?echo $Admin->all_extradition();?>
			</div>
		    <div class="card-header">
            <h3 class="mb-0">Действие с серверами выдачи</h3>
          </div>
          <!-- Card body -->
          <div class="card-body">
<?php
switch ($_GET['type']) {
    case "edit":
        $extra = $Admin->extra($_GET['id']);
        if (!$extra)
            echo $Admin->alert("Сервер не обнаружен!", "danger");
        else {
		if(isset($_POST['update_extra'])) echo $Admin->update_extra($_POST, $extra->id);
?>
    <form method="post">
        <input class="form-control" type="hidden" name="id" value="<?=$extra->id?>">
        <div class="form-group">
            <label class="control-label">Название сервера</label>
            <input class="form-control" placeholder="Test" type="text" name="name" value="<?=$extra->name?>">
        </div>
        <div class="form-group">
            <label class="control-label">Адрес сервера</label>
            <input class="form-control" placeholder="127.0.0.1" type="text" name="ip" value="<?=$extra->ip?>">
        </div>
        <div class="form-group">
            <label class="control-label">Порт сервера</label>
            <input class="form-control" placeholder="23141" type="text" name="port" value="<?=$extra->port?>">
        </div>
        <div class="form-group">
            <label class="control-label">Пароль сервера</label>
            <input class="form-control" placeholder="12345612fd" type="text" name="pass" value="<?=$extra->pass?>">
        </div>
            <div class="form-group">
                <label class="control-label">Сервер сортировки</label>
                <select name="server" class="form-control">
				<?php
				 $query = $Admin->engine->query("SELECT * FROM `servers`");
                 $selected = $Admin->engine->query_result("SELECT * FROM `servers` WHERE `id` = '".$extra->server."'");
                 echo '<option selected value="'.$selected->id.'">'.$selected->name.'</option>';
					while ($q = $query->fetch_object()) {
                        if($q->id == $selected->id) continue;
						echo '<option value="'.$q->id.'">'.$q->name.'</option>';
					} ?>
                </select>
            </div>
        <button type="submit" class="btn btn-success btn-block btn-todo" name="update_extra"><i aria-hidden="true"></i> Изменить сервер</button>
    </form>
    <?php
        }
    break;
	case "remove":
		$extra = $Admin->extra($_GET['id']);
		if (!$extra)
            echo $Admin->alert("Сервер не обнаружен!", "danger");
        else {
			echo $Admin->alert("Вы собираетесть удалить сервер [{$extra->name}], вы подтверждаете это действие?", "warning");
			if(isset($_GET['delete']))
			{
				$Admin->remove_extra($extra->id);
				echo $Admin->alert("Вы успешно удалили сервер [{$extra->name}]", "success");
			} else echo '<a href="?extradition&type=remove&id='.$extra->id.'&delete" class="btn btn-danger btn-block btn-todo"><i aria-hidden="true"></i> Удалить сервер</a>';
		}
	break;
	default:
	if(isset($_POST['add_extra'])) echo $Admin->add_extra($_POST);
	?>
        <form method="post">
            <div class="form-group">
                <label class="control-label">Название сервера</label>
                <input class="form-control" placeholder="Test" type="text" name="name">
            </div>
            <div class="form-group">
                <label class="control-label">Адрес сервера</label>
                <input class="form-control" placeholder="127.0.0.1" type="text" name="ip">
            </div>
            <div class="form-group">
                <label class="control-label">Порт сервера</label>
                <input class="form-control" placeholder="23141" type="text" name="port">
            </div>
            <div class="form-group">
                <label class="control-label">Пароль сервера</label>
                <input class="form-control" placeholder="12345612fd" type="text" name="pass">
            </div>
            <div class="form-group">
                <label class="control-label">Сервер</label>
                <select name="server" class="form-control">
				<?php
				 $query = $Admin->engine->query("SELECT * FROM `servers`");
					while ($q = $query->fetch_object()) {
						if($q->id == $extra->server) $s = "selected"; else $s = "";
						echo '<option '.$s.' value="'.$q->id.'">'.$q->name.'</option>';
					} ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success btn-block btn-todo" name="add_extra"><i aria-hidden="true"></i> Добавить сервер</button>
        </form>
        <?php
}
?>
                                <?php
                                if(file_exists($_SERVER['DOCUMENT_ROOT'].'/admin/actions/'.$action.'.php'))
                                    include $_SERVER['DOCUMENT_ROOT'].'/admin/actions/'.$action.'.php';
                                else echo $Admin->alert("<b>Ошибка!</b> Страница не найдена!", "danger");
                                ?>