<?php
require_once("../engine/config.php");
@session_start();
if($_SESSION['username'])
{
    header('location:/admin');
    exit();
}
$connect = mysqli_connect($config['db']['db_host'], $config['db']['db_user'], $config['db']['db_pass'], $config['db']['db_name']);

if(isset($_POST['username']) and isset($_POST['password']));
{
    $username = $connect->real_escape_string(htmlspecialchars($_POST['username']));
    $password = $connect->real_escape_string(htmlspecialchars($_POST['password']));


    $query = "SELECT * FROM `admin` WHERE `username`='$username' and `password`= '$password'";
    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
    $count = mysqli_num_rows($result);

    if($count == 1)
    {
        $_SESSION['username'] = $username;
        echo("<meta http-equiv='refresh' content='0'>");
    } else {
        $fmsg = "Ошибка";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="/admin/styles/css/bootstrap.min.css" rel="stylesheet">
    <link href="/admin/styles/css/login.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <title>Админка > Авторизация</title>
</head>
<body>
<form class="login-form" method="post">
    <h1>Авторизация</h1>

    <div class="txtb">
        <input type="text" name="username" required>
        <span data-placeholder="Логин"></span>
    </div>

    <div class="txtb">
        <input type="password" name="password" required>
        <span data-placeholder="Пароль"></span>
    </div>

    <input type="submit" class="logbtn" value="Войти">

</form>

<script type="text/javascript">
    $(".txtb input").on("focus",function(){
        $(this).addClass("focus");
    });

    $(".txtb input").on("blur",function(){
        if($(this).val() == "")
            $(this).removeClass("focus");
    });
</script>
</body>
</html>