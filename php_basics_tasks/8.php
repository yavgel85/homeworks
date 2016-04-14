<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Задание 8</title>
	</head>
	<body>
		<?php
			$age = '18';

			if ($age < 0 || is_string($age)) {
				echo "Неизвестный возраст!";
			}	
			elseif ($age >= 0 && $age <= 17) {
				echo "Вам еще рано работать.";
			}
			elseif ($age >= 18 && $age <= 59) {
				echo "Вам еще работать и работать.";
			}	
			elseif ($age > 59) {
				echo "Вам пора на пенсию.";
			}	
			
		?>
	</body>
</html>