  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0"><?=$h_path?></h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$h_path?></li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="container-fluid mt--6">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card-wrapper">
        <!-- Form controls -->
        <div class="card">
          <!-- Card header -->	
          <div class="card-header">
            <h3 class="mb-0">Последние покупки</h3>
          </div>
          <!-- Card body -->
          <div class="card-body">

<table id="donaters" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Ник</th>
            <th>Группа</th>
            <th style="width: 40px">Цена</th>
        </tr>
    </thead>
    <tbody>
       <?=$Admin->all_donaters()?>
    </tbody>
</table>
<script>
    $(document).ready(function() {
            $('#donaters').DataTable({
                language: {
                    processing: "Выполняется обработка...",
                    search: "Поиск: ",
                    lengthMenu: "Показать _MENU_ записей",
                    info: "Записи с _START_ до _END_ из _TOTAL_ записей",
                    infoEmpty: "Записи с 0 до 0 из 0 записей",
                    infoFiltered: "<br>(отфильтровано из _MAX_ записей)",
                    infoPostFix: "",
                    loadingRecords: "Загрузка...",
                    zeroRecords: "Записи не обнаружены",
                    emptyTable: "Нет доступных в таблице данных",
                    paginate: {
                        first: "Первая",
                        previous: "Назад",
                        next: "Вперед",
                        last: "Последняя"
                    },
                    aria: {
                        sortAscending: ": активировать для сортировки столбца по возрастанию",
                        sortDescending: ": активировать для сортировки столбцов по убыванию"
                    }
                }
            });
        }

    );
</script>

<div class="card-header">
<h3 class="mb-0">Информационная панель</h3>
</div>

<div class="card-body">
<div class="col-md-6">
<div class="card-content">
<h4 class="card-title">Новости VK</h4>
<div class="card">
<div id="vk_groups"></div>
</div>
</div>
</div>
</div>
		  <div class="card-header">
          <h3 class="mb-0">Наши ресурсы</h3>
          </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Наш форум</h5>
                  <h5 class="card-title text-uppercase text-muted mb-0">FORUM-MINECRAFT.RU</h5>
                  <span class="h2 font-weight-bold mb-0"><a href="https://FORUM-MINECRAFT.RU"></span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-purple text-white rounded-circle shadow">
                    <i class="ni ni-cart"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Наш Мониторинг</h5>
                  <h5 class="card-title text-uppercase text-muted mb-0">MC-MONITORING.RU</h5>
                  <span class="h2 font-weight-bold mb-0"><a href="https://MC-MONITORING.RU"></span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-purple text-white rounded-circle shadow">
                    <i class="ni ni-badge"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Наш Хостинг</h5>
                  <h5 class="card-title text-uppercase text-muted mb-0">BILL.HOST-CRAFT.RU</h5>
                  <span class="h2 font-weight-bold mb-0"><a href="https://bill.host-craft.ru"></span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-purple text-white rounded-circle shadow">
                    <i class="fas fa-user"></i>
                  </div>
                </div>
              </div>
                <div class="col-auto">
                    <a href="https://vk.com/wall-176867737_6005" ><div class="col-md-6">⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀Version:1.9⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀</div>
				</div>		  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="style/js/chartist.min.js"></script>
<script type="text/javascript" src="//vk.com/js/api/openapi.js?121"></script>
<script type="text/javascript">
	VK.Widgets.Group("vk_groups", {redesign: 1, mode: 2, width: "auto", height: "500", color2: "607D8B", color3: "222222"}, 176867737);
</script>