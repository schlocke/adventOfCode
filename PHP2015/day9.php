<?php
	
$one = 0;
$two = 0;
$journeys = array();

foreach (file('day9.txt', FILE_IGNORE_NEW_LINES) as $line) {
    $journey = explode(" ", $line);

    $journeys[$journey[0]][$journey[2]] = (int)$journey[4];

}
var_dump($journeys);

echo "9.1: $one<br>9.2: $two";