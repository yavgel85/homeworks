<?php

function createFile($fileName = 'FileName', $content = 'Some text here') {
	settype($content, "string");

  $fp = fopen($fileName . ".txt", "a+");
  fwrite($fp, "{$content}" . PHP_EOL);
  fclose($fp);
}

createFile('6.4', 'Some text here');