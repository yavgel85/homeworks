<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Devionity - задание к 46 уроку</title>
	</head>
	<body>		
		<?php
			$x = 21;
			$y = 22;

			switch ($x > $y) {
				case true:
					echo "Максимальное значение - " . $x;
					break;				
				default:
					echo "Максимальное значение - " . $y;
					break;
			}
		?>
	</body>
</html>