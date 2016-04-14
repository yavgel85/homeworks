<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Задание 11</title>
	</head>
	<body>
		<?php
			$day = 6;
			
			switch ($day) {
				case 0:
					echo " 'Нулевого' дня не существует";
				break;
				case $day >= 1 && $day <= 5:
					echo "Это рабочий день";
				break;			
				case $day >=6 && $day <=7:
					echo "Это выходной день";
				break;			
			}			
		?>
	</body>
</html>