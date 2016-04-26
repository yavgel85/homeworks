<?php

function angle($levels, $symbol, $full = false, $reversed = false) {
    $whitespaceFactor = $levels/2;
    $output = array();

    for ($i = 1; $i <= $levels; $i+=2) {
        $whitespace = ($levels - $i / 2) - $whitespaceFactor;
        if ($reversed == false) {
            $output[] = str_pad ('', $whitespace, ' ') . str_pad ('', $i, $symbol);
        } else {
            $output[] = str_pad ('', $whitespace*3, ' ') . str_pad ('', $i, $symbol);
        }
    }

    if ($full == false) {
        echo implode("\n", $output) . "\n";
    } else {
        echo implode("\n", $output) . "\n";
        echo implode("\n", array_reverse($output)) . "\n";
    }    
}

echo "<pre>";
  angle(15, '*');
echo "</pre>";