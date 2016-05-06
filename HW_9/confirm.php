<?php
	session_start();
	header("Content-Type:text/html;charset=utf-8");
	require_once 'configure.php';
	require_once 'functions.php';

	if (@$_GET['hash']) {
		$confirm = confirm();

		if($confirm === true) $confirm = "Ваша учетная запись активирована. Можете авторизироваться.";
	}
	else $error = "Неверная ссылка!";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Гостевая книга | Подтверждение регистрации</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<?= '<span class="error">' . $error . '</span>'; ?>
		<?= $confirm; ?>
	</body>
</html>