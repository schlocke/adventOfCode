	<?php

	$path = array_map('str_getcsv', file('day1.csv'));
	$path = array_map('trim', $path[0]);

	//position x,y
	$map = array(0,0);

	//map log to keep track of locations
	$maplog = array();

	//keep track of direction
	$compass = 0;

	$answer1 = NULL;
	$answer2 = NULL;

	foreach ($path as $direction ) {
		$turn = substr($direction, 0, 1);
		$walk = substr($direction, 1);

		$compass += ($turn === "L") ? -1:1;
		if($compass<0) $compass = 3;
		if($compass>3) $compass = 0;
		
		for($i = 0; $i < $walk; $i++) {
			switch ($compass) {
				//N
				case 0: $map[1]++; break;
				//E
				case 1: $map[0]++; break;
				//S
				case 2: $map[1]--; break;
				//W
				case 3: $map[0]--; break;
			}
			
			//have i been here before?
			if( in_array($map, $maplog) && is_null($answer2) ) {
				$answer2 = $map[0] + $map[1];
			}

			//lets keep track of where I've been;
			$maplog[] = $map;
		}
		
		$answer1 = $map[0] + $map[1];
	}

	echo "Answer 1: $answer1 <br> Answer 2: $answer2";