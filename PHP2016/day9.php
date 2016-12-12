<?php
$commandString = file('day9.txt')[0];
function decompress($string, $isProb2) {
    $returnString = '';
    $returnSum = 0;
    while(true) {
        $pos = strpos($string, '(');
        if($pos===false) {
            $returnSum += strlen($string);
            return $returnSum;
        }
        $returnSum += strlen(substr($string,0,$pos));

        if(preg_match('/\((\d+)x(\d+)\)(.+)/', $string, $matches)) {
            if($isProb2) {
                $returnSum += ($matches[2]*decompress(substr($matches[3],0,$matches[1]),true));
            }
            else {
                $returnSum += ($matches[2]*strlen(substr($matches[3],0,$matches[1])));
            }
        }
        $string = substr($matches[3],$matches[1]);
    }
}

echo('Decompressed: '.decompress($commandString,false));
echo('Decompressed2: '.decompress($commandString,true));