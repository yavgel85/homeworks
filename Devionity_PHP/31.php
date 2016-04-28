<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Devionity - задание к 31 уроку</title>
	</head>
	<body>
		<form action="" method="post">
			<p><input type="text" name="username" placeholder="Enter your name"></p>
	    <p><input type="email" name="email" placeholder="Enter your email"></p>
	    <p><textarea name="message" placeholder="Enter your message"></textarea></p>
	    <p><input type="submit"></p>
		</form>
		<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$username = $_POST['username'];
				$email = $_POST['email'];
				$message = $_POST['message'];

				$form_data = array($username, $email, $message);
				$str = serialize($form_data);
				//echo $str;

				echo "<pre>";
		    	print_r($str);
		  	echo "</pre>";
			}
		?>
	</body>
</html>