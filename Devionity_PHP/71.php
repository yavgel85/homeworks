<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<title>Devionity - задание к 71 уроку</title>
	</head>
	<body>		
		<?php

    		function my_print_r($array, $html = false, $level = 0) {
                $space = $html ? "&nbsp;" : " ";
                $spaces = "";
                $newline = $html ? "<br>" : "\n";
                for ($i = 1; $i <= 6; $i++) {
                    $spaces .= $space;
                }
                $tabs = $spaces;
                for ($i = 1; $i <= $level; $i++) {
                    $tabs .= $spaces;
                }
                $output = "Array" . $newline . "(" . $newline;
                foreach($array as $key => $value) { 
                    if (is_array($value)) {
                        $level++;
                        $value = my_print_r($value, $html, $level);
                        $level--;
                    }
                    $output .= $tabs . "[" . $key . "] => " . $value . $newline;
                }
                $output .= $newline . ")";
                return $output;
            }

            $arr = array(1 => 'one', 2 => 'two', 3 => array(4 => 'four', 5 => 'five', 6 => 'six'));
            echo "<pre>"; echo my_print_r($arr); echo "</pre>"; // $html = false
            echo my_print_r($arr); // $html = true

            echo "<br>";
            echo "<pre>"; print_r($arr); echo "</pre>";
            print_r($arr);
		?>
	</body>
</html>