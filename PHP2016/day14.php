<?php
	$input = file("day14.txt")[0];

	$i = 0;
	$c3 = $c5 = $p1 = array();
	while(true) {
		$a = md5($input.$i);
		$b = array();
		if(preg_match_all('/(.)\1\1\1\1/', $a, $b)) {
			$c5[$i] = $b[0][0];
		} else  if(preg_match_all('/(.)\1\1/', $a, $b)) {
			$c3[$i] = $b[0][0];
		}
		if(count($c5) == 64) break;
		$i++;
	}
	var_dump($p1);
	var_dump($c3);
	var_dump($c5);
	echo $i;
