	<?php 

	$triangles = file("day3.txt");
	$triangles2 = array();
	$p1 = $p2 = $i = 0;

	function checkPossible($array) {
		if( max($array) < (array_sum($array)-max($array)) ) return 1;
		return 0;
	}

	foreach ($triangles as $key => $triangle) {
		$temp = preg_split("/[\s]+/", trim($triangle));

		$p1 += checkPossible($temp);

		$triangles2[$i][] = $temp[0];
		$triangles2[$i+1][] = $temp[1];
		$triangles2[$i+2][] = $temp[2];

		if( ($key+1)%3 === 0 ) {
			$p2 += checkPossible($triangles2[$i]);
			$p2 += checkPossible($triangles2[$i+1]);
			$p2 += checkPossible($triangles2[$i+2]);
			$i += 3;
		}
	}

	echo "$p1<br>$p2";