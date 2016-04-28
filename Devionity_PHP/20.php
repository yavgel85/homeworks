<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Devionity - задание к 20 уроку</title>
	</head>
	<body>
		<?php
			$book1 = array('style' => 'detective', 'author' => 'Conan Doyle', 'title' => 'Sherlock Holmes', 'price' => '120');
			$book2 = array('style' => 'fantasy', 'author' => 'George R.R. Martin', 'title' => 'A Game of Thrones', 'price' => '270');
			$book3 = array('style' => 'roman', 'author' => 'Susan Wise Bauer', 'title' => 'The History of the Ancient World', 'price' => '305');

			$books = array($book1, $book2, $book3);
				echo "<pre>";
					print_r($books);
				echo "</pre>";
		?>
	</body>
</html>