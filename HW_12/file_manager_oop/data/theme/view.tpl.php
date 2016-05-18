<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>File Manager</title>
	<link href="<?= THEME; ?>css/style.css" rel="stylesheet">
</head>
<body>
<div id="header">
	<h1>ФАЙЛОВЫЙ МЕНЕДЖЕР</h1>
	<span id="header_text">Обзор содержимого папок и файлов</span>
</div>
<div id="zip_wrap">
	<div id="dirs_files">
	<h2>Содержимое файла - <?= $res_arr['path']; ?></h2>
	<a href="?path=<?= $res_arr['old_path']; ?>">Назад</a>
	<br /><br />
	
	<div class="content_file">
		<pre>
			<?= $res_arr['content']; ?>
		</pre>
	</div>
			
</div>
<div id="zip_wrap_end">&nbsp;</div>
</div>
<div id="footer"></div>
</body>
</html>
