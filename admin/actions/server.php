<? include 'dex.php'; ?>
<div class="container-fluid mt--6">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card-wrapper">
        <!-- Form controls -->
        <div class="card">
          <!-- Card header -->
          <div class="card-header">
            <h3 class="mb-0">Список серверов</h3>
          </div>
          <!-- Card body -->
          <div class="card-body">
                                <?echo $Admin->all_servers();?>
			</div>
		    <div class="card-header">
            <h3 class="mb-0">Действие с сервером</h3>
          </div>
          <!-- Card body -->
          <div class="card-body">
 <?php
switch ($_GET['type']) {
    case "edit":
        $server = $Admin->server($_GET['id']);
        if (!$server)
            echo $Admin->alert("Сервер не обнаружен!", "danger");
        else {
		if(isset($_POST['update_server'])) echo $Admin->update_server($_POST, $server->id);
?>
    <form method="post">
        <input class="form-control" type="hidden" name="id" value="<?=$server->id?>">
        <div class="form-group">
            <label class="control-label">Название сервера</label>
            <input class="form-control" placeholder="Test" type="text" name="name" value="<?=$server->name?>">
        </div>
        <div class="form-group">
            <label class="control-label">Возможность покупки доната</label>
            <select name="status" class="form-control">
                <option <?php if ($server->status == 1) echo "selected"; ?> value="1">Активирована</option>
                <option <?php if ($server->status == 0) echo "selected"; ?> value="0">Не активирована</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success btn-block btn-todo" name="update_server"><i aria-hidden="true"></i> Изменить сервер</button>
    </form>
    <?php
        }
    break;
	case "remove":
		$server = $Admin->server($_GET['id']);
		if (!$server)
            echo $Admin->alert("Сервер не обнаружен!", "danger");
        else {
			echo $Admin->alert("Вы собираетесть удалить сервер [{$server->name}], вы подтверждаете это действие?", "warning");
			if(isset($_GET['delete'])) 
			{
				$Admin->remove_server($server->id);
				echo $Admin->alert("Вы успешно удалили сервер [{$server->name}] перейди во вкладку главная", "success");
			} else echo '<a href="?server&type=remove&id='.$server->id.'&delete" class="btn btn-danger btn-block btn-todo"><i aria-hidden="true"></i> Удалить сервер</a>';
		}
	break;
	default:
	if(isset($_POST['add_server'])) echo $Admin->add_server($_POST);
	?>
        <form method="post">
            <div class="form-group">
                <label class="control-label">Название сервера</label>
                <input class="form-control" placeholder="Test" type="text" name="name">
            </div>
			<div class="form-group">
				<label class="control-label">Возможность покупки доната</label>
				<select name="status" class="form-control">
					<option value="1">Активирована</option>
					<option value="0">Не активирована</option>
				</select>
			</div>
            <button type="submit" class="btn btn-success btn-block btn-todo" name="add_server"><i aria-hidden="true"></i> Добавить сервер</button>
        </form>
        <?php
}
?>
                                <?php
                                if(file_exists($_SERVER['DOCUMENT_ROOT'].'/admin/actions/'.$action.'.php'))
                                    include $_SERVER['DOCUMENT_ROOT'].'/admin/actions/'.$action.'.php';
                                else echo $Admin->alert("<b>Ошибка!</b> Страница не найдена!", "danger");
                                ?>