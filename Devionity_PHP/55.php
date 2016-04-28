<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Devionity - задание к 55 уроку</title>
	</head>
	<body>		
		<?php
			$f = fopen('55.txt', 'a+');
			for ($i=1; $i <= 10; $i++) { 	
				for ($j=1; $j <= $i; $j++) {
					fwrite($f, $i);
				}
				fwrite($f, PHP_EOL);						
			}
			fclose($f);			
		?>
	</body>
</html>