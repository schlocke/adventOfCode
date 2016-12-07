<?php
	$input = file("day7.txt");
	$p1=$p2=0;

	function checkabbaPalindrome($part) {
		$a = str_split($part);
		for($b = 0; $b < count($a)-3; $b++) {
			if($a[$b] === $a[$b+3] && $a[$b+1] === $a[$b+2] && $a[$b] !== $a[$b+1]) return true;
		}
		return false;
	}

	function findabaPalindrome($part) {
		$c = array();
		foreach ($part as $d) {
			$a = str_split($d);
			for($b = 0; $b < count($a)-2; $b++) {
				if($a[$b] === $a[$b+2] && $a[$b] !== $a[$b+1]) $c[] = $a[$b+1].$a[$b].$a[$b+1];
			}
		}
		return $c;
	}

	function findbabPalindrome($part, $bab) {
		foreach ($part as $a) {
			if(strpos($a, $bab) !== false ) return true;
		}
		return false;
	}
	
	foreach ($input as $ip) {
		$a = array();
		preg_match_all("/(\[[a-z]+\])|([a-z]+)/", $ip, $a);
		$tls = 0;
		foreach ($a[0] as $part) {
			if(checkabbaPalindrome($part) && strpos($part, '[') === 0) {
				$tls = 0;
				break;
			} elseif (checkabbaPalindrome($part)) {
				$tls = 1;
			}
		}
		$p1 += $tls;

		$b = array();
		$c = array();
		foreach ($a[0] as $part) {
			if(strpos($part, '[') === 0) $c[] = $part;
			else $b[] = $part;
		}

		$bab = findabaPalindrome($b);
		foreach ($bab as $d) {
			if( findbabPalindrome($c, $d) ){
				$p2++;
				break;
			}
		}
	}

	echo "$p1<br>$p2";
