<?php
session_start();
header("Content-Type:text/html;charset=utf-8");
require_once 'configure.php';
require_once 'functions.php';

// вход
if(isset($_POST['login']) && isset($_POST['password'])){
	$msg = login($_POST);

	if ($msg === true) {
		header("Location: index.php");	
	} else {
		$_SESSION['msg'] = $msg;
		header("Location: " . $_SERVER['PHP_SELF']);	
	}
	exit();
}

//выход
if(isset($_POST['logout'])){
	$msg = logout();

	if ($msg === true) {
		$_SESSION['msg'] = "Вы вышли из системы";
		header("Location: " . $_SERVER['PHP_SELF']);
		exit();	
	}	
}

?>

<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Гостевая книга | Авторизация</title>
		<link rel="stylesheet" href="css/style_login.css">
	</head>
	<body>        
        <form action="" method="post">
		    <label for="name">Имя</label> 
		    <input type="text" id="name" name="login" autocomplete="off">
		    <label for="password">Пароль</label> 
		    <input type="password" id="password" name="password" autocomplete="off">
		    <label><input type="checkbox" name="allow" value="1">Запомнить</label>
    		<div class="buttons">
    			<input type="submit" value="Войти">
    			<input type="reset" value="Сбросить">
    		</div>
    		<p style="text-align:center"><a href="registration.php">Регистрация</a> | <a href="returnpass.php">Забыли пароль?</a></p> 

    		<?= $_SESSION['msg']; ?>
    		<?php unset($_SESSION['msg']); ?>   		
		</form>
		<form class='logout' action="" method="post">
    		<div class="buttons"><input type="submit" name="logout" value="Выйти"></div>
		</form>
    </body>
</html>