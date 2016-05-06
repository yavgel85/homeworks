<?php
session_start();
header("Content-Type:text/html;charset=utf-8");
require_once 'configure.php';
require_once 'functions.php';

if(isset($_POST['email'])){
	$msg = getPassword($_POST['email']);

	if ($msg === true) {
		$_SESSION['msg'] = "Новый пароль выслан Вам на почтовый ящик.";
		header("Location: login.php");		
	} else {
		$_SESSION['msg'] = $msg;
		header("Location: " . $_SERVER['PHP_SELF']);		
	}
	exit();	
}

?>

<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Гостевая книга | Возобновление пароля</title>
		<link rel="stylesheet" href="css/style_login.css">
	</head>
	<body>        
        <form action="" method="post">
		    <label for="name">Почтовый ящик</label> 
		    <input type="email" id="email" name="email" pattern="^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$" title="Введите валидный email." autocomplete="off">		    
    		<div class="buttons"><input type="submit" value="Отправить"></div>

    		<?= $_SESSION['msg']; ?>
    		<?php unset($_SESSION['msg']); ?>     		   		
		</form>		
    </body>
</html>