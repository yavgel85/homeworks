<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/cv_style.css">
	<title>Resume Eugene Yavgel</title>
</head>
<body>
	<table align="center" bordercolor="lightgrey" border="1" cellpadding="3" cellspacing="0" width="75%">
		<tr>
			<th><img src="img/my_photo.jpg" height="90%" alt="Photo Eugene Yavgel"></th>
			<th><h1>Eugene Yavgel <br>(21.04.1985)</h1></th>
		</tr>
		<tr>
			<th><h3>Contacts:</h3></th>
			<td>
				<b>Cell:</b> <i>+38 063 956 87 70</i><br>
				<b>E-mail:</b> <i>eugene.yavgel@gmail.com</i><br>
				<b>Skype:</b> <i>e.yavgel</i><br>
				<ul id="social">
					<li id="odnoklassniki" title="Odnoklassniki"><a href="http://ok.ru/profile/259996776498"></a></li>
					<li id="facebook" title="Facebook"><a href="https://www.facebook.com/eugene.men"></a></li>
					<li id="vk" title="VKontakte"><a href="https://vk.com/id11725478"></a></li>
				</ul>
			</td>
		</tr>
		<tr>
			<th><h3>Objective:</h3></th>
			<td>Junior PHP Developer</td>
		</tr>
		<tr>
			<th><h3>Skills:</h3></th>
			<td>
				Programming methodologies: OOP, MVC. <br>
				Programming Languages: HTML/CSS, SQL, XML, PHP, JavaScript/ jQuery/ Ajax. <br>
				Integrated Development Environments: NetBeans. <br>
				Relational DataBase Management Systems: MySQL. <br>
				PHP Frameworks: CakePHP.
			</td>
		</tr>
		<tr>
			<th><h3>Education:</h3></th>
			<td>
				January 2015 – Present: self-study РНР, MySQL, CSS, JavaScript / jQuery / Ajax and etc. <br>
				October 2014 – December 2014: IT-Academy “STEP”. Computer courses «Passo»: Web-mastering: РНР, MySQL (certificate DK-19712/15-01).
			</td>
		</tr>
		<tr>
			<th><h3>Project examples:</h3></th>
			<td>
				<a href="https://Eugene_Yavgel@bitbucket.org/Eugene_Yavgel/book_catalog.git">Book catalog</a><br>
				<a href="https://Eugene_Yavgel@bitbucket.org/Eugene_Yavgel/dvdcatalog.git">DVD catalog</a>
			</td>
		</tr>
		<tr>
			<th><h3>Additional information:</h3></th>
			<td>
				Marital status: married. <br>
				Interests and hobbies: programming, Web technology, music, economics. <br>
				Knowledge of English: intermediate. <br>
				Personal qualities: attentive, quality-oriented, diligent and hardworking.
			</td>
		</tr>
	</table>

	<?php 
		if (@$_SESSION['admin']) echo "<a href='./index.php'>Перейти к гостевой книге</a>";
		else echo "<a href='./login.php'>Авторизацуйтесь для входа в гостевую книгу</a>";
	?>
	
</body>
</html>