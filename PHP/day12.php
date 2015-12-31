<?php

class daytwelve {
	private $one = "";
	private $two = "";

	public function traverseAndSumArray($array) {
		foreach ($array as $value) {
			if(is_array($value) || is_object($value) ) $this->traverseAndSumArray($value);
			else if (is_int($value)) $this->one += $value;
		}
		return;	
	}

	public function redIsBad($array) {
		foreach ($array as $value) {
			if(is_array($value) || is_object($value)) {
				//check if object and if red is in the array
				if( is_object($value) && in_array("red", (array)$value, true) ) continue;
				else $this->redIsBad($value);
			} else if (is_int($value)) {
				$this->two += $value;
			}
		}
		return;	
	}

	public function getOne() { return $this->one; }

	public function getTwo() { return $this->two; }
}

$input = file('day12input.txt');
$input = json_decode($input[0]);

$run = new daytwelve();
$run->traverseAndSumArray($input);
$run->redIsBad($input);

echo "12.1: ".$run->getOne()."<br>12.2: ".$run->getTwo();