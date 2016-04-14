<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Задание 20</title>
	</head>
	<body>
		<?php
			var_dump((boolean) 20); // boolean true

			/*
				При преобразовании в логический тип, следующие значения рассматриваются как FALSE:
				- Сам булев FALSE;
				- целое 0 (ноль);
				- число с плавающей точкой 0.0 (ноль);
				- пустая строка и строка "0";
				- массив с нулевыми элементами;
				- объект с нулевыми переменными-членами;
				- специальный тип NULL (включая неустановленные переменные).

				Все остальные значения рассматриваются как TRUE (включая любой ресурс).

				Таким образом, целочисленное 20 считается TRUE, как и любое ненулевое (отрицательное или положительное) число!
			*/
		?>
	</body>
</html>