<?php
	$input = file("day10.txt");
	
	class bot {
		private $giveHigh = array();
		private $giveLow = array();
		private $chips = array();
		public $log = array();

		function __construct($lowtype, $low, $hightype, $high) {
			$this->giveLow = array($lowtype, $low);
			$this->giveHigh = array($hightype, $high);
		}

		function setChip($a) {
			$this->chips[] = $a;
			sort($this->chips);
			$this->log[] = "holding ".implode(' and ',$this->chips);
		}

		function giveLow() {
			$low = $this->chips[0];
			array_shift($this->chips);
			return array($low,$this->giveLow);
		}

		function giveHigh() {
			$high = $this->chips[0];
			array_shift($this->chips);
			return array($high,$this->giveHigh);
		}

		function has2Chips() {
			if(count($this->chips) === 2) return true;
			return false;
		}
	}

	$bots = array();
	$output = array();

	foreach ($input as $a) {
		$b = array();
		preg_match_all('/(value|bot|output)|(\d+)/', $a, $b);
		if($b[0][0] === 'bot') {
			$bots[$b[0][1]] = new bot($b[0][2],$b[0][3],$b[0][4],$b[0][5]);
		} else if($b[0][0] === 'value') {
			$bots[$b[0][3]]->setChip($b[0][1]);
		}
	}

	while(true) {
		$nextBot = null;
		foreach ($bots as $bot) {
			if( $bot->has2Chips() ) {
				$nextBot = $bot;
				break;
			}
		}

		if(is_null($nextBot)) break;

		$c = $nextBot->giveLow();
		$d = $nextBot->giveHigh();

		if($c[1][0] == 'output') {
			$output[$c[1][1]] = $c[0];
		} elseif($c[1][0] == 'bot') {
			$bots[$c[1][1]]->setChip($c[0]);
		}

		if($d[1][0] == 'output') {
			$output[$d[1][1]] = $d[0];
		} elseif($d[1][0] == 'bot') {
			$bots[$d[1][1]]->setChip($d[0]);
		}
	}

	foreach ($bots as $botno => $bot) {
		if( in_array('holding 17 and 61', $bot->log) ) {
			echo "Part1: ".$botno."<br>";
			break;
		}
	}

	ksort($output);
	echo "Part 2: ".($output[0]*$output[1]*$output[2]);