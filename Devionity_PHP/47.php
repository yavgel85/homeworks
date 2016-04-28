<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Devionity - задание к 47 уроку</title>
	</head>
	<body>		
		<?php			
			for($i=1;$i<=100;$i++){
				if ($i<2) continue;
			  else {
				  $check=true;
				  for($j=2;$j<$i;$j++) {
				    if ($i%$j===0) 
				    	$check=false;
				  }
				    if ($check===true)
				      echo $i." ";
		    }
		  }
		?>
	</body>
</html>