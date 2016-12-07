	<?php 
		$input = file("day4.txt");
		$p1 = $p2 = 0;

		foreach ($input as $room) {
			preg_match('/([a-z.\-]+)([0-9]+)(\[[a-z]+\])/', $room, $room);

			$id = $room[2];
			$checksum = $room[3];
			$room = trim($room[1], '-');

			if(preg_match('/'.$checksum.'/', $room)) $p1 += (int)$id;
		}

		echo $p1;