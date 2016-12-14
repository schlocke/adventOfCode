<?php
	$input = file('day11.txt');
	$map = array(
		array('xxx','xxx','xxx','xxx','xxx','xxx','xxx','xxx','xxx','xxx'),
		array('xxx','xxx','xxx','xxx','xxx','xxx','xxx','xxx','xxx','xxx'),
		array('xxx','xxx','xxx','xxx','xxx','xxx','xxx','xxx','xxx','xxx'),
		array('xxx','xxx','xxx','xxx','xxx','xxx','xxx','xxx','xxx','xxx')
	);

	$i = 0;
	foreach ($input as $key => $floor) {
		$a = array();
		preg_match_all('/(( a )([a-z]+)( generator|-compatible microchip))/', $floor, $a);

		foreach($a[3] as $key1 => $element) {
			$map[$key][$i] = substr($element, 0, 2).substr($a[4][$key1], 1, 1);
			$i++;
		}
	}

	echo implode(" ", $map[3])."<br>";
	echo implode(" ", $map[2])."<br>";
	echo implode(" ", $map[1])."<br>";
	echo implode(" ", $map[0])."<br>";