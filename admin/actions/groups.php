<? include 'dex.php'; ?>
<div class="container-fluid mt--6">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card-wrapper">
        <!-- Form controls -->
        <div class="card">
          <!-- Card header -->
          <div class="card-header">
            <h3 class="mb-0">Список групп</h3>
          </div>
          <!-- Card body -->
          <div class="card-body">
<?							if(!empty($_GET['groups'])) echo $Admin->all_groups((int)$_GET['groups']);
								else echo $Admin->all_servers_groups();
								?>
			</div>
		    <div class="card-header">
            <h3 class="mb-0">Действие с группами</h3>
          </div>
          <!-- Card body -->
          <div class="card-body">
<?php
switch ($_GET['type']) {
    case "edit":
        $group = $Admin->group($_GET['id']);
        if (!$group)
            echo $Admin->alert("Группа не обнаружена!", "danger");
        else {
		if(isset($_POST['update_group'])) echo $Admin->update_group($_POST, $group->id);
?>
    <form method="post">
        <div class="form-group">
            <label class="control-label">Название группы</label>
            <input class="form-control" placeholder="Вип" type="text" name="name" value="<?= $group->name ?>">
        </div>
        <div class="form-group">
            <label class="control-label">Цена</label>
            <input class="form-control" placeholder="100" type="text" name="price" value="<?= $group->price ?>">
        </div>
        <div class="form-group">
            <label class="control-label">Доплата</label>
            <select name="surcharge" class="form-control">
                <option <?php if ($group->surcharge == 1) echo "selected"; ?> value="1">С доплатой</option>
                <option <?php if ($group->surcharge == 0) echo "selected"; ?> value="0">Без доплаты</option>
            </select>
        </div>
            <div class="form-group">
                <label class="control-label">Сервер</label>
                <select name="server" class="form-control">
				<?php
				 $query = $Admin->engine->query("SELECT * FROM `servers`");
					while ($q = $query->fetch_object()) {
						if($q->id == $group->server) $s = "selected"; else $s = "";
						echo '<option '.$s.' value="'.$q->id.'">'.$q->name.'</option>';
					} ?>
                </select>
            </div>
        <div class="form-group">
            <label class="control-label">Команды, можно несколько через ; и без пробелов
                <br> [nick] - ник донатера</label>
            <input class="form-control" placeholder="pex user [nick] group set admin" type="text" name="cmd" value="<?= $group->cmd ?>">
        </div>
        <div class="form-group">
            <label class="control-label">Категория</label>
                <select name="category" class="form-control">
				<?php
				 $query = $Admin->engine->query("SELECT * FROM `categ`");
					while ($q = $query->fetch_object()) {
						if($q->id == $group->categ) $s = "selected"; else $s = "";
						echo '<option '.$s.' value="'.$q->id.'">'.$q->name.'</option>';
					} ?>
                </select>
        </div>
        <button type="submit" class="btn btn-success btn-block btn-todo" name="update_group"><i aria-hidden="true"></i> Изменить группу</button>
    </form>
    <?php
        }
    break;
	case "remove":
		$group = $Admin->group($_GET['id']);
		if (!$group)
            echo $Admin->alert("Группа не обнаружена!", "danger");
        else {
			echo $Admin->alert("Вы собираетесть удалить группу [{$group->name}], вы подтверждаете это действие?", "warning");
			if(isset($_GET['delete'])) 
			{
				$Admin->remove_group($group->id);
				echo $Admin->alert("Вы успешно удалили группу [{$group->name}]", "success");
			} else echo '<a href="?groups&type=remove&id='.$group->id.'&delete" class="btn btn-danger btn-block btn-todo"><i aria-hidden="true"></i> Удалить группу</a>';
		}
	break;
	default:
	if(isset($_POST['add_group'])) echo $Admin->add_group($_POST);
	?>
        <form method="post">
            <div class="form-group">
                <label class="control-label">Название группы</label>
                <input class="form-control" placeholder="Вип" type="text" name="name">
            </div>
            <div class="form-group">
                <label class="control-label">Цена</label>
                <input class="form-control" placeholder="100" type="text" name="price">
            </div>
            <div class="form-group">
                <label class="control-label">Доплата</label>
                <select name="surcharge" class="form-control">
                    <option value="1">С доплатой</option>
                    <option value="0">Без доплаты</option>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">Сервер</label>
                <select name="server" class="form-control">
				<?php
				 $query = $Admin->engine->query("SELECT * FROM `servers`");
					while ($q = $query->fetch_object()) {
						echo '<option value="'.$q->id.'">'.$q->name.'</option>';
					} ?>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">Команды, можно несколько через ; и без пробелов
                    <br> [nick] - ник донатера</label>
                <input class="form-control" placeholder="pex user [nick] group set admin" type="text" name="cmd">
            </div>
            <div class="form-group">
                <label class="control-label">Категория</label>
                <select name="category" class="form-control">
				<?php
				 $query = $Admin->engine->query("SELECT * FROM `categ`");
					while ($q = $query->fetch_object()) {
						echo '<option value="'.$q->name.'">'.$q->name.'</option>';
					} ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success btn-block btn-todo" name="add_group"><i aria-hidden="true"></i> Добавить группу</button>
        </form>
        <?php
}
?>
                                <?php
                                if(file_exists($_SERVER['DOCUMENT_ROOT'].'/admin/actions/'.$action.'.php'))
                                    include $_SERVER['DOCUMENT_ROOT'].'/admin/actions/'.$action.'.php';
                                else echo $Admin->alert("<b>Ошибка!</b> Страница не найдена!", "danger");
                                ?>