<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Devionity - задание к 28 уроку</title>
	</head>
	<body>
		<form action="" method="post">
			<p><input type="text" name="name" placeholder="Enter your name"></p>
	    <p><input type="email" name="email" placeholder="Enter your email"></p>
	    <p><input type="tel" name="phone" placeholder="Enter your phone"></p>
	    <p><input type="submit"></p>
		</form>
		<?php
			echo "<pre>";
		    print_r($_POST);
		  echo "</pre>";
		?>
	</body>
</html>