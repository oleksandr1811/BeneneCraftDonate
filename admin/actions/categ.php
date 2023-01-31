<? include 'dex.php'; ?>
<div class="container-fluid mt--6">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card-wrapper">
        <!-- Form controls -->
        <div class="card">
          <!-- Card header -->
          <div class="card-header">
            <h3 class="mb-0">Список категорий</h3>
          </div>
          <!-- Card body -->
          <div class="card-body">
                                <?echo $Admin->all_categ();?>
			</div>
		    <div class="card-header">
            <h3 class="mb-0">Действие с категориями</h3>
          </div>
          <!-- Card body -->
          <div class="card-body">
 <?php
switch ($_GET['type']) {
    case "edit":
        $categ = $Admin->categ($_GET['id']);
        if (!$categ)
            echo $Admin->alert("Категория не обнаружена!", "danger");
        else {
		if(isset($_POST['update_categ'])) echo $Admin->update_categ($_POST, $categ->id);
?>
    <form method="post">
        <input class="form-control" type="hidden" name="id" value="<?=$categ->id?>">
        <div class="form-group">
            <label class="control-label">Название категории</label>
            <input class="form-control" placeholder="Test" type="text" name="name" value="<?=$categ->name?>">
        </div>
        <button type="submit" class="btn btn-success btn-block btn-todo" name="update_categ"><i aria-hidden="true"></i> Изменить категорию</button>
    </form>
    <?php
        }
    break;
	case "remove":
		$categ = $Admin->categ($_GET['id']);
		if (!$categ)
            echo $Admin->alert("Категория не обнаружена!", "danger");
        else {
			echo $Admin->alert("Вы собираетесть удалить категорию [{$categ->name}], вы подтверждаете это действие?", "warning");
			if(isset($_GET['delete'])) 
			{
				$Admin->remove_categ($categ->id);
				echo $Admin->alert("Вы успешно удалили категорию [{$categ->name}] перейди во вкладку главная", "success");
			} else echo '<a href="?categ&type=remove&id='.$categ->id.'&delete" class="btn btn-danger btn-block btn-todo"><i aria-hidden="true"></i> Удалить категорию</a>';
		}
	break;
	default:
	if(isset($_POST['add_categ'])) echo $Admin->add_categ($_POST);
	?>
        <form method="post">
            <div class="form-group">
                <label class="control-label">Название категории</label>
                <input class="form-control" placeholder="Test" type="text" name="name">
            </div>
            <button type="submit" class="btn btn-success btn-block btn-todo" name="add_categ"><i aria-hidden="true"></i> Добавить категорию</button>
        </form>
        <?php
}
?>
                                <?php
                                if(file_exists($_categ['DOCUMENT_ROOT'].'/admin/actions/'.$action.'.php'))
                                    include $_categ['DOCUMENT_ROOT'].'/admin/actions/'.$action.'.php';
                                ?>