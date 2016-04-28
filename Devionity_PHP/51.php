<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Devionity - задание к 51 уроку</title>
	</head>
	<body>		
		<?php			
			for($i=200;$i<=400;$i++){
				if ($i<201) continue; // нет необходимости, зато по теме
			  else {
				  $check=true;
				  for($j=2;$j<$i;$j++) {
				    if ($i%$j===0) 
				    	$check=false;
				  }
				    if ($check===true) {
				    	 echo $i." ";
				    	break;
				    }		       
		    }
		  }
		?>
	</body>
</html>