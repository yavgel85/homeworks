<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Менеджер файлов</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>  
		<?php
			// корневая папка
			$begin = "files";

			// если переменная $fold не определена или путь в ней не начинается с имени корневой папки или содержит две точки подряд
			if ((strpos($_GET['fold'], $begin) != 0) || (strpos($_GET['fold'], "..") != false) || (!isset($_GET['fold']))) {
			 	$dirct = $begin;
			}
			// если переменная $fold "в порядке"
			else {
			  $dirct = $_GET['fold'];
			}

			// выведем заголовок формы менеджера файлов и передадим в ссылке на файл со сценарием-обработчиком этой формы путь к текущей папке 
			echo ("<form action='query.php?folder=$dirct' method='post'>");
			
			// если текущая папка не является корневой, выведем ссылку на родительскую папку
			if ($dirct != $begin) {
				$back = substr($dirct, 0, strrpos($dirct, "/"));
				// выводим ссылку на родительскую папку
				echo ("<br><b><a href='index.php?fold=$back'>Корневая папка</a></b><br>");
			}

			// сканируем текущую папку: получаем список файлов в ней
			$hdl = opendir($dirct);

			while ($file = readdir($hdl)) {
				if (($file != "..") && ($file != ".")) {
			        $a[] = $file;
			    }
			}

			closedir($hdl);

			// если файлы в папке есть
			if (sizeof(@$a) > 0) {
				// отсортируем массив с их именами по алфавиту
				asort($a);
				foreach ($a as $k) {
					// формируем полный путь к данному файлу или папке: прибавим имя данного файла или папки к пути к текущей директории
				    $full = $dirct . "/" . $k;
				    echo ("<input name='fl[]' value='$k' type='checkbox'>");

				    // если элемент массива с именами файлов в текущей директории является папкой
				    if (is_dir($full) == true) {
				    	// выведем ссылку на нее
				    	echo ("<a href='index.php?fold=$full'>Папка $k</a>");
				    }
				    // если элемент массива с именами файлов в текущей директории является файлом
				    else {
				    	echo ("<a href='$full'>$k</a>");
				    }

				    echo ("<br>");
				}
			}
		?>
			<br>
			<div class="buttons">
				<input type="submit" value="Удалить" name="del">
				<input type="submit" value="Копировать" name="copy"><br>
				<input type="submit" value="Переименовать" name="ren">
				<input type="submit" value="Создать папку" name="md">
			</div>
		</form>
	</body>
</html>
