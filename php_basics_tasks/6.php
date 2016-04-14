<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Задание 6</title>
	</head>
	<body>
		<?php
			$age = 60;
			if ($age >= 18 && $age <= 59) {
				echo "Вам еще работать и работать.";
			}
			elseif ($age >= 59) {
				echo "Вам пора на пенсию.";
			}			
		?>
	</body>
</html>