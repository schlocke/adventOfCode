<?php
	$input = file('day15.txt');

	$a = $b = array();
	preg_match_all('/[1-9]?[0-9]/', implode($input), $a);
	$a = $a[0];
	for($i = 0; $i < count($a); $i += 4) $b[$a[$i]] = [$a[$i+1],$a[$i+3]];

	for ($i = 0; true; $i++) {
	    for ($disk = 1, $count = count($b); $disk <= $count; $disk++)
	        if (($b[$disk][1] + ($disk + $i)) % $b[$disk][0] !== 0)
	            continue 2;
	    echo $i;
	    break;
	}