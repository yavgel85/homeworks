<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Devionity - задание к 70 уроку</title>
	</head>
	<body>		
		<?php				

			function is_prime($number) {
		    if ($number == 1) return false;    
		    if ($number == 2) return true;
		    
		    $x = sqrt($number);
		    $x = floor($x);
		    for ($i = 2 ; $i <= $x ; ++$i) {
		      if ($number % $i == 0) break;
		    }
		    
		    if($x == $i-1) return true;
		    else return false;
			}

			$a = is_prime(59); 
			 
			if ($a == false) echo 'This is not a Prime Number.';  
			else echo 'This is a Prime Number.'; 
		?>
	</body>
</html>