<?php
	$input = file('day12.txt');
	//$input = file('day12Test.txt');
	$r = array(
		'a' => 0,
		'b' => 0,
		'c' => 1,
		'd' => 0,
	);
	$c = array();

	foreach ($input as $value) {
		$a = array();
		preg_match_all('/[a-z]{3}|(-?\d\d?)|[a-z]/', $value, $a);
		$c[] = $a[0];
	}

	for($i = 0; $i < count($c); $i++) {
		switch($c[$i][0]) {
			case 'cpy':
				if(!is_numeric($c[$i][1])) $r[$c[$i][2]] = (int)$r[$c[$i][1]];
				else $r[$c[$i][2]] = (int)$c[$i][1];
				break;
			case 'inc':
				$r[$c[$i][1]]++;
				break;
			case 'dec':
				$r[$c[$i][1]]--;
				break;
			case 'jnz':
				if($c[$i][1] === 0 || (isset($r[$c[$i][1]]) && $r[$c[$i][1]] == 0) ) {
					break;
				} else {
					$i += $c[$i][2] - 1;
				}
				break;
		}
	}

	var_dump($r);