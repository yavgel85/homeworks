<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Задание 7</title>
	</head>
	<body>
		<?php
			$age = 17;
			if ($age >= 18 && $age <= 59) {
				echo "Вам еще работать и работать.";
			}
			elseif ($age >= 59) {
				echo "Вам пора на пенсию.";
			}	
			elseif ($age >= 0 && $age <= 17) {
				echo "Вам еще рано работать.";
			}			
		?>
	</body>
</html>