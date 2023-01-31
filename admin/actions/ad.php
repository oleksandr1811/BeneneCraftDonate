<? include 'dex.php'; ?>
<div class="container-fluid mt--6">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card-wrapper">
        <!-- Form controls -->
        <div class="card">
          <!-- Card header -->
          <div class="card-header">
            <h3 class="mb-0">Список промокодов</h3>
          </div>
          <!-- Card body -->
          <div class="card-body">
                                <?echo $Admin->all_admin();?>
			</div>
		    <div class="card-header">
            <h3 class="mb-0">Действие с промокодами</h3>
          </div>
          <!-- Card body -->
          <div class="card-body">
<?php
switch ($_GET['type']) {
    case "edit":
        $admin = $Admin->admin($_GET['id']);
        if (!$admin)
            echo $Admin->alert("Промокод не обнаружен!", "danger");
        else {
		if(isset($_POST['update_admin'])) echo $Admin->update_admin($_POST, $admin->id);
?>
    <form method="post">
        <div class="form-group">
            <label class="control-label">Название промокода</label>
            <input class="form-control" placeholder="test" type="text" name="username" value="<?= $admin->username ?>">
        </div>
        <div class="form-group">
            <label class="control-label">Скидка %</label>
            <input class="form-control" placeholder="100" type="text" name="password" value="<?= $admin->password ?>">
        </div>
        <button type="submit" class="btn btn-success btn-block btn-todo" name="update_admin"><i aria-hidden="true"></i> Изменить промокод</button>
    </form>
    <?php
        }
    break;
	case "remove":
		$admin = $Admin->admin($_GET['username' ]);
		if (!$admin)
            echo $Admin->alert("Промокод не обнаружен!", "danger");
        else {
			echo $Admin->alert("Вы собираетесть удалить промокод [{$admin->id}], вы подтверждаете это действие?", "warning");
			if(isset($_GET['delete'])) 
			{
				$Admin->remove_admin($admin->id);
				echo $Admin->alert("Вы успешно удалили промокод [{$admin->username}]", "success");
			} else echo '<a href="?ad&type=remove&id='.$admin->id.'&delete" class="btn btn-danger btn-block btn-todo"><i aria-hidden="true"></i> Удалить промокод</a>';
		}
	break;
	default:
	if(isset($_POST['add_admin'])) echo $Admin->add_admin($_POST);
	?>
    <form method="post">
        <div class="form-group">
            <label class="control-label">Название промокода</label>
            <input class="form-control" placeholder="test" type="text" name="username">
        </div>
        <div class="form-group">
            <label class="control-label">Скидка %</label>
            <input class="form-control" placeholder="100" type="text" name="password">
        </div>
        <button type="submit" class="btn btn-success btn-block btn-todo" name="add_admin"><i aria-hidden="true"></i> Добавить промокод</button>
    </form>
        <?php
}
?>
                                <?php
                                if(file_exists($_SERVER['DOCUMENT_ROOT'].'/admin/actions/'.$action.'.php'))
                                    include $_SERVER['DOCUMENT_ROOT'].'/admin/actions/'.$action.'.php';
                                else echo $Admin->alert("<b>Ошибка!</b> Страница не найдена!", "danger");
                                ?>