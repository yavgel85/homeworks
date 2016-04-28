<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Devionity - задание к 49 уроку</title>
	</head>
	<body>		
		<?php
			$arr = array('10', '21', '33', '4', '56', '6', '77', '87', '9', '10');

			foreach ($arr as $item) {
				if ($item % 3 == 0) {
					echo $item . '<br>';
				}
			}
		?>
	</body>
</html>