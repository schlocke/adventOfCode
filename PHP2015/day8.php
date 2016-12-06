<?php

$one = 0;
$two = 0;
foreach (file('day8input.txt', FILE_IGNORE_NEW_LINES) as $line) {
    eval('$str = ' . $line . ';');
    $one += strlen($line) - strlen($str);
    $two += strlen(addslashes($line))+2-strlen($line);
}
echo "8.1: $one\n8.2: $two";