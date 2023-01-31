<?php
    @session_start();
    if(!$_SESSION['username'])
    {
        header('location:/admin/login.php');
        exit();
    }
    require_once $_SERVER['DOCUMENT_ROOT'].'/engine/classes/Admin.class.php';
    $Admin = new Admin();

	if(isset($_GET['action'])) $action = $_GET['action'];
	else $action = 'index';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?=$Admin->engine->cfg['server']['name']?> > Панель</title>
  <link rel="icon" href="<?=$realdir?>/admin/styles/img/brand/favicon.png" type="image/png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="<?=$realdir?>/admin/styles/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="<?=$realdir?>/admin/styles/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <link rel="stylesheet" href="<?=$realdir?>/admin/styles/vendor/sweetalert2/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="<?=$realdir?>/admin/styles/css/argon.css?v=1.1.1" type="text/css">
  <script src="<?=$realdir?>/admin/styles/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?=$realdir?>/admin/styles/vendor/jquery/dist/jquery.form.min.js"></script>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <script type="text/javascript">
      var realdir = '<?=$realdir?>';
  </script>
</head>
<body>
  <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <div class="sidenav-header d-flex align-items-center">
       <a class="navbar-brand" href="/admin/"><?=$Admin->engine->cfg['server']['name']?></a>
        </a>
        <div class="ml-auto">
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a id="a_admin" class="nav-link" href="<?=$realdir?>/admin">
                <i class="ni ni-chart-pie-35 text-primary"></i>
                <span class="nav-link-text">Главная</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=$realdir?>/">
                <i class="ni ni-cart text-primary"></i>
                <span class="nav-link-text">Сайт</span>
              </a>
            </li>
            <li class="nav-item">
              <a id="a_servers" class="nav-link" href="<?=$realdir?>/admin/actions/server.php">
                <i class="fas fa-server text-primary"></i>
                <span class="nav-link-text">Серверы</span>
              </a>              
            </li>
            <li class="nav-item">
              <a id="a_pages" class="nav-link" href="<?=$realdir?>/admin/actions/categ.php">
                <i class="fas fa-layer-group text-primary"></i>
                <span class="nav-link-text">Категории</span>
              </a>
            </li>
            <li class="nav-item">
              <a id="a_tovar" class="nav-link" href="<?=$realdir?>/admin/actions/groups.php">
                <i class="fas fa-briefcase text-primary"></i>
                <span class="nav-link-text">Товары</span>
              </a>
            </li>
            <li class="nav-item">
              <a id="a_promo" class="nav-link" href="<?=$realdir?>/admin/actions/promo.php">
                <i class="fas fa-percentage text-primary"></i>
                <span class="nav-link-text">Промо-коды</span>
              </a>
            </li>
            <li class="nav-item">
              <a id="a_pages" class="nav-link" href="<?=$realdir?>/admin/actions/console.php">
                <i class="fas fa-layer-group text-primary"></i>
                <span class="nav-link-text">Добовление игроков в консоль</span>
              </a>
            </li>
		    <li class="nav-item">
              <a id="a_otziv" class="nav-link"  href="<?=$realdir?>/admin/actions/extradition.php">
                <i class="fas fa-comments text-primary"></i>
                <span class="nav-link-text">Сервера выдачи</span>
              </a>
			<li class="nav-item">
              <a id="a_settings" class="nav-link" href="<?=$realdir?>/admin/config.php">
                <i class="ni ni-settings-gear-65 text-primary"></i>
                <span class="nav-link-text">Настройки сайта</span>
              </a>
            </li>
            <li class="nav-item">
              <a id="a_settings" class="nav-link" href="#navbar-pages" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                <i class="ni ni-settings-gear-65 text-primary"></i>
                <span class="nav-link-text">Настройки стиля</span>
              </a>
              <div class="collapse" id="navbar-pages">
                <ul class="nav nav-sm flex-column">
                  <li id="a1_pages" class="nav-item">
                    <a href="<?=$realdir?>/ver.php" class="nav-link">Настройки Фона</a>
                  </li>
                  <li id="a2_pages" class="nav-item">
                    <a href="<?=$realdir?>/ver2.php" class="nav-link">Настройки банера</a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav align-items-center ml-md-auto">
            <li class="nav-item d-xl-none">
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center ml-auto ml-md-0">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img src="https://mc-heads.net/avatar/<? echo $_SESSION['username']; ?>">
                  </span>
                  <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><? echo $_SESSION['username']; ?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Добро пожаловать :D</h6>
                </div>
                <div class="dropdown-divider"></div>
                <a href="<?=$realdir?>/admin/logout.php" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Выход</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
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
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="<?=$realdir?>/admin/styles/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?=$realdir?>/admin/styles/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?=$realdir?>/admin/styles/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?=$realdir?>/admin/styles/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>

  <script src="<?=$realdir?>/admin/styles/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
  <!-- Argon JS -->
  <script src="<?=$realdir?>/admin/styles/js/argon.js?v=1.1.0"></script>
  <script src="<?=$realdir?>/admin/styles/js/draganddrop.js"></script>
  <script src="<?=$realdir?>/admin/styles/js/activator.js"></script>
  <script src="<?=$realdir?>/admin/styles/js/admin.js"></script>
</body>
</html>