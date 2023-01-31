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
                                <?echo $Admin->all_promo();?>
			</div>
		    <div class="card-header">
            <h3 class="mb-0">Действие с промокодами</h3>
          </div>
          <!-- Card body -->
          <div class="card-body">
<?php
switch ($_GET['type']) {
    case "edit":
        $promo = $Admin->promo($_GET['id']);
        if (!$promo)
            echo $Admin->alert("Промокод не обнаружен!", "danger");
        else {
		if(isset($_POST['update_promo'])) echo $Admin->update_promo($_POST, $promo->id);
?>
    <form method="post">
        <div class="form-group">
            <label class="control-label">Название промокода</label>
            <input class="form-control" placeholder="test" type="text" name="name" value="<?= $promo->name ?>">
        </div>
        <div class="form-group">
            <label class="control-label">Скидка %</label>
            <input class="form-control" placeholder="100" type="text" name="disc" value="<?= $promo->disc ?>">
        </div>
        <button type="submit" class="btn btn-success btn-block btn-todo" name="update_promo"><i aria-hidden="true"></i> Изменить промокод</button>
    </form>
    <?php
        }
    break;
	case "remove":
		$promo = $Admin->promo($_GET['id']);
		if (!$promo)
            echo $Admin->alert("Промокод не обнаружен!", "danger");
        else {
			echo $Admin->alert("Вы собираетесть удалить промокод [{$promo->name}], вы подтверждаете это действие?", "warning");
			if(isset($_GET['delete'])) 
			{
				$Admin->remove_promo($promo->id);
				echo $Admin->alert("Вы успешно удалили промокод [{$promo->name}]", "success");
			} else echo '<a href="?promo&type=remove&id='.$promo->id.'&delete" class="btn btn-danger btn-block btn-todo"><i aria-hidden="true"></i> Удалить промокод</a>';
		}
	break;
	default:
	if(isset($_POST['add_promo'])) echo $Admin->add_promo($_POST);
	?>
    <form method="post">
        <div class="form-group">
            <label class="control-label">Название промокода</label>
            <input class="form-control" placeholder="test" type="text" name="name">
        </div>
        <div class="form-group">
            <label class="control-label">Скидка %</label>
            <input class="form-control" placeholder="100" type="text" name="disc">
        </div>
        <button type="submit" class="btn btn-success btn-block btn-todo" name="add_promo"><i aria-hidden="true"></i> Добавить промокод</button>
    </form>
        <?php
}
?>
                                <?php
                                if(file_exists($_SERVER['DOCUMENT_ROOT'].'/admin/actions/'.$action.'.php'))
                                    include $_SERVER['DOCUMENT_ROOT'].'/admin/actions/'.$action.'.php';
                                else echo $Admin->alert("<b>Ошибка!</b> Страница не найдена!", "danger");
                                ?>