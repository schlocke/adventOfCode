<?php
	$input = file('day11.txt');
	//$input = file('day11Test.txt');
	$map = array(0,0,0,0);

	foreach ($input as $key => $floor) {
		$a = array();
		preg_match_all('/(( a )([a-z]+)( generator|-compatible microchip))/', $floor, $a);

		foreach($a[3] as $key1 => $element) {
			$map[$key]++;
		}
	}

	function getMoves($items) {
		$moves = 0;
	    while(true) {
	        $lowest_floor = 0;
	        while($items[$lowest_floor] == 0) {
	        	$lowest_floor += 1;
	        	if($lowest_floor == 3) break 2;
	        }
	        $moves += 2 * ($items[$lowest_floor] - 1) - 1;
	        $items[$lowest_floor + 1] += $items[$lowest_floor];
	        $items[$lowest_floor] = 0;
	    }
	    return $moves;
	}

	echo getMoves($map);