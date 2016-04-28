<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Devionity - задание к 36 уроку</title>
	</head>
	<body>		
		<?php
			$f_t = false && true || false && true || !false && true;
			var_dump($f_t);

			echo "<br>";

			$x = 11;
			$res = ($x % 2 == 0) ? "true" : "false";
			echo $res;
		?>
	</body>
</html>