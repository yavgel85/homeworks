<?php

session_start();
// устанавливаем кодировку utf-8
header("Content-Type:text/html;charset=utf-8");
// подключаем необходимые файлы
require_once 'configure.php';
// require_once 'functions.php';

// блок выхода из админчасти
if ($_GET['do'] == 'exit') {
	unset($_SESSION['admin']);
	session_destroy();
	// перегружаем страницу
   header("Location: " . $_SERVER['PHP_SELF']);
   exit();
}

// блок авторизации
if (isset($_POST['sub'])) {
	if (trim($_POST['name']) == ADMIN && trim(md5($_POST['pass'])) == PASS) {
		$_SESSION['admin'] = ADMIN;
		$_SESSION['ok'] = "<p>Приветствуем, {$_SESSION['admin']}!<br> <a href='./index.php'>В гостевую</a> | <a href='?do=exit'>Выход</a></p>";
		header("Location: " . $_SERVER['PHP_SELF']);
   	exit();
	} else {
		$_SESSION['error'] = "<p>Неверный логин и/или пароль!</p>";
		header("Location: " . $_SERVER['PHP_SELF']);
		//header("Location: login.php");
   	exit();
	}	
}

?>


<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Гостевая книга | Админстраница</title>
		<link rel="stylesheet" href="css/style_admin.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	</head>
	<body>
		<?php if (!isset($_SESSION['admin'])) { ?>
		<form method="post" action="">
		  <label>
		    <span>Логин</span>
		    <input type="text" name="name" value="" pattern=".{3,}" required title="Введите не менее 3 символов." autocomplete="off">
		  </label><br>

		  <label>
		    <span>Пароль</span>
		    <input type="password" name="pass" value="" pattern=".{3,}" required title="Введите не менее 3 символов." autocomplete="off">
		  </label><br>		  

		  <button type="submit" name="sub">Войти</button>
		  <button type="reset" name="reset">Сброс</button>

		  <!-- Если неуспешна попытка авторизации пользователя, как админа -->
			<?= '<span class="error">' . $_SESSION['error'] . '</span>'; unset($_SESSION['error']); ?>
		</form>  	

  	<script type="text/javascript" src="js/script.js"></script>

			
		<!-- Если попытка авторизации пользователя, как админа, прошла успешно -->
		<?php } else { echo '<div class="admin_login">' . $_SESSION['ok'] . '</div>';	} ?>

	</body>
</html>