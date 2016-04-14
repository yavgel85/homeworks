<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Задание 13</title>
	</head>
	<body>
		<form action="" method="post">
			<fieldset>
				<legend><b>Расчет скорости в км/ч:</b></legend>
				<label>
					<span>Длина участка, который проехал автомобиль:</span>
	        <input placeholder="Расстояние в км" type="number" name="s_km" tabindex="1" autofocus>
	      </label>
	      <label>
					<span>Время движения:</span>
	        <input placeholder="Время в часах" type="number" name="t_hour" tabindex="2">
	      </label>
			</fieldset>

			<fieldset>
				<legend><b>Расчет скорости в м/сек:</b></legend>
				<label>
					<span>Длина участка, который проехал автомобиль:</span>
	        <input placeholder="Расстояние в км" type="number" name="s_m" tabindex="3" autofocus>
	      </label>
	      <label>
					<span>Время движения:</span>
	        <input placeholder="Время в часах" type="number" name="t_sec" tabindex="4">
	      </label>
			</fieldset>

			<p><input type="submit" value="Рассчитать скорость"></p>
		</form>
		
		<?php
			if (!empty($_POST['s_km']) && !empty($_POST['t_hour'])) {
				$s = $_POST['s_km'];
				$t = $_POST['t_hour'];
				echo "<b><i>Cкорость автомобиля на заданном участке = " . $s / $t . " (км/час).</i></b>";
			}
			elseif(!empty($_POST['s_m']) && !empty($_POST['t_sec'])){
				$s = $_POST['s_m'];
				$t = $_POST['t_sec'];
				echo "<b><i>Cкорость автомобиля на заданном участке = " . $s / ($t*3.6) . " (м/сек).</i></b>";
			}
			else {
				echo "<b><i>Введите данные для расчета скорости.</i></b>";
			}
		?>
	</body>
</html>