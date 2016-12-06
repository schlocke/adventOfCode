<?php
ini_set('memory_limit', '2048M');

$input = str_split ("1321131112");
$one = "";
$two = "";

for($i = 0; $i < 50; $i++) {
	$newInput = "";
	$count = 1;
	for($j = 0; $j < count($input); $j++) {
		if(isset($input[$j+1])) {
			while($input[$j] === $input[$j+1]) {
				$count++;
				$j++;
			}
		}
		$newInput .= $count.$input[$j];
		$count = 1;
	}
	$input = str_split ($newInput);
	if($i == 39) $one = count($input);
	else if($i == 49) $two = count($input);
}

echo "10.1: $one<br>10.2: $two";