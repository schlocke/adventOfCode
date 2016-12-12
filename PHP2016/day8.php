	<?php

		$input = file("day8.txt");

		$matrix = array(
			array("x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x"),
			array("x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x"),
			array("x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x"),
			array("x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x"),
			array("x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x"),
			array("x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x","x")
		);

		foreach ($input as $command) {
			$action = array();
			preg_match_all("/(rotate column|rotate row|rect)\s(\d+x\d+|y=\d+|x=\d+)(\sby\s)?(\d+)?/", $command, $action);
			switch ($action[1][0]) {
				case 'rect':
					$xy = explode("x", $action[2][0]);
					for($i = 0; $i < $xy[0]; $i++) {
						for($j = 0; $j < $xy[1]; $j++) {
							$matrix[$j][$i] = 'o';
						}
					}
					break;
				case 'rotate row':
					$y = (int)trim($action[2][0], 'y=');
					$shift = $action[4][0];
					for($i = 0; $i < $shift; $i++) {
						$x = array_pop($matrix[$y]);
						array_unshift($matrix[$y], $x);
					}
					break;
				case 'rotate column':
					$x = (int)trim($action[2][0], 'x=');
					$shift = $action[4][0];
					$temp = array($matrix[0][$x], $matrix[1][$x], $matrix[2][$x], $matrix[3][$x], $matrix[4][$x], $matrix[5][$x]);
					for($i = 0; $i < $shift; $i++) {
						$a = array_pop($temp);
						array_unshift($temp, $a);
					}

					$matrix[0][$x] = $temp[0];
					$matrix[1][$x] = $temp[1];
					$matrix[2][$x] = $temp[2];
					$matrix[3][$x] = $temp[3];
					$matrix[4][$x] = $temp[4];
					$matrix[5][$x] = $temp[5];
					break;
			}
		}

		foreach ($matrix as $key => $value) {
			echo implode($value)."<br>";
		}