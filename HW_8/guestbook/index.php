<?php
/**
 * Created by PhpStorm.
 * User: Evgeniy
 * Date: 30.04.2016
 * Time: 1:48
 */
// используем сессии, чтобы избавиться от "проблемы F5"
session_start();
// устанавливаем кодировку utf-8
header("Content-Type:text/html;charset=utf-8");
mb_internal_encoding('UTF-8');
// подключаем необходимые файлы
require_once 'configure.php';
require_once 'functions.php';

// если пользователь вошел как админ, то он имеет право удалить любой комментарий
if ($_SESSION['admin']) {
	$delete = ' Удалить';

	// удаление комментария
	if(isset($_GET['id'])){
		delPost($_GET['id']);
		// перегружаем страницу
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
	}
}

// если сообщение отправлено (кнопка Отправить нажата)
if (isset($_POST['sub'])){
  $res = addPost($_POST['name'], $_POST['email'], $_POST['msg']);

  if(!empty($res)){
  	// присваиваем сессионной переменной res результат работы функции addPost
    $_SESSION['res'] = $res;
    // перегружаем страницу
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
  } else {
  	// при попытке отправить пустую форму
  	$_SESSION['res'] = ERROR;
  	// сохраним данные имени и почты в случае, если клиент забыл ввести комент и нажал отправить,
  	// чтобы не пришлось перезаполнять всю форму сначала; очищаем данные перед выводом
  	$_SESSION['name'] = clearDataClient($_POST['name']);
  	$_SESSION['email'] = clearDataClient($_POST['email']);
  	// перегружаем страницу
  	header("Location: " . $_SERVER['PHP_SELF']);
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Гостевая книга</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div id="gb_container">
			<h1>Гостевая книга</h1>
			<form id="mainform" action="" method="post">
				<p class="name">
					<input type="text" name="name" value="<?= $_SESSION['name']; ?>" placeholder="Введите имя">
					<label for="name">Имя</label>
				</p>

				<p class="email">
					<input type="email" name="email" value="<?= $_SESSION['email']; ?>" placeholder="Введите E-Mail">
					<label for="email">E-Mail</label>
				</p>

				<p class="msg">
					<textarea name="msg" id="msg" cols="30" rows="10" placeholder="Оставьте комментарий"></textarea>
				</p>

				<input name="send" type="hidden">

        <p class="send">
          <input type="submit" name="sub" value="Отправить">
        </p>
			</form>

			<?php
				// выводим сообщение о состоянии комментария
			echo '<span class="error">' . $_SESSION['res'] . '</span>';
				// удаляем данное сообщение при повторной перезагрузке страницы
				unset($_SESSION['res']);				
				unset($_SESSION['name']);
				unset($_SESSION['email']);
			
				// выводим комментарии/сообщения пользователей
				$posts = selectAll();
				foreach ($posts as $post) :
			?>

				<div class="msg_container">
					<div class="msg_header">
						<strong><?= clearDataClient($post['name']); ?></strong> <i><?= clearDataClient($post['email']); ?></i>
					</div>

					<div class="msg_body">
						<!-- сохраним клиентское форматирование ввода комментариев: ф-ция nl2br(), разрешаем ВВ-теги и смайлы: ф-ция bbTags(),
						переводим буквы в заглавные, если они стоят после символа окончания предложения:  ф-ция fixText(),
						предусматриваем цензуру вывода комментариев: ф-ция censure() и очищаем выводимые данные в браузере: ф-ция clearDataClient()	-->
						<?= nl2br(bbTags(fixText(censure(clearDataClient($post['post']))))); ?>
					</div>

					<div class="msg_footer">
						Комментарий добавлен: <?= $post['date']; ?> <strong><a href="?id=<?= $post['id']; ?>"><?= $delete; ?></a></strong>
					</div>
				</div>
			
			<?php	endforeach; ?>
		</div>
	</body>
</html>