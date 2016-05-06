<?php
session_start();
header("Content-Type:text/html;charset=utf-8");
require_once 'configure.php';
require_once 'functions.php';


if (isset($_POST['reg'])) {
	$msg = registration($_POST);

	if ($msg === true) 
		$_SESSION['msg'] = "Вы успешно зарегистрировались. Для подтверждения регистрации Вам на почту отправлено письмо.";
	else 
		$_SESSION['msg'] = $msg;
	
	header("Location: " . $_SERVER['PHP_SELF']);
   	exit();
}

?>

<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Гостевая книга | Регистрация</title>
		<link rel="stylesheet" href="css/style_admin.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	</head>
	<body>				   
		<form action="" method="post"  autocomplete="off">
			<label>
				<span>Логин</span>
			    <input type="text" name="reg_login" value="<?=@$_SESSION['reg']['login'];?>" pattern=".{3,}" title="Введите не менее 3 символов." autocomplete="off">
			</label><br>
			<label>
				<span>Пароль</span>
			    <input type="password" name="reg_password" value="" pattern=".{3,}" title="Введите не менее 3 символов." autocomplete="off">
			</label><br>
			<label>
				<span>Ещё раз пароль</span>
			    <input type="password" name="reg_password_confirm" value="" pattern=".{3,}" title="Введите не менее 3 символов." autocomplete="off">
			</label><br>
			<label>
				<span>Почта</span>
			    <input type="email" name="reg_email" value="<?=@$_SESSION['reg']['email'];?>" pattern="^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$" title="Введите валидный email." autocomplete="off">
			</label><br>	  

			<button type="submit" name="reg" value="Регистрация">Регистрироваться</button>
			<?= '<span class="error">' .@$_SESSION['msg']. '</span>'; ?>
			<?php 
				unset($_SESSION['msg']);
				unset($_SESSION['reg']);
			?>			
		</form>	
		<script type="text/javascript" src="js/script.js"></script>			
	</body>
</html>