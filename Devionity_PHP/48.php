<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Devionity - задание к 48 уроку</title>
	</head>
	<body>		
		<?php
			$i=1;
	    while ($i<100) :
	    	$i++;	    	
				if ($i<2)
					continue;				
			  else {
				  $check = true;

				  $j=2;			  
				  while ($j<$i) :
				    if ($i % $j === 0) 
				    	$check = false;
				    $j++;
				  endwhile;

				  if ($check === true)
				    echo $i . " ";
		    }		    
	    endwhile;

	    // короткий вариант
		 /*
		 $i = range(2,100); 
		while(($a[] = array_shift($i))&&count($i) > 0)foreach($i as $k=>$v) if($v%end($a) == 0) unset($i[$k]);
		var_dump($a);
		*/
		?>
	</body>
</html>