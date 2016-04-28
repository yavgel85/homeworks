<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Devionity - задание к 52 уроку</title>
	</head>
	<body>		
		<?php			
			function test($x, $y) {
				if ($y == 0) return false;
				return $x / $y;
			}
			
			echo test(1, 0) or die('Error');
		?>
	</body>
</html>