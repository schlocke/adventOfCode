	<?php
		//rows
		$a = file("day6.txt");
		//columns
		$b = array("","","","","","","","");
		//answers
		$p1=$p2="";
		//transform rows into columns
		foreach($a as $c) {
			$b[0] .= substr($c, 0, 1);
			$b[1] .= substr($c, 1, 1);
			$b[2] .= substr($c, 2, 1);
			$b[3] .= substr($c, 3, 1);
			$b[4] .= substr($c, 4, 1);
			$b[5] .= substr($c, 5, 1);
			$b[6] .= substr($c, 6, 1);
			$b[7] .= substr($c, 7, 1);
		}
		//loop through the columns
		foreach($b as $d) {
			//split the string into an array for sorting
			$e = str_split($d);
			//sort alphabetically
			sort($e);
			//rejoin to string for preg matching
			$f = implode($e);
			$g = array();
			//turn the string into an array of letters e.g. [aaaaaaa][bbbbbbb][cccccccc]..... etc the matches are stored into $g
			preg_match_all("/[a]+|[b]+|[c]+|[d]+|[e]+|[f]+|[g]+|[h]+|[i]+|[j]+|[k]+|[l]+|[m]+|[n]+|[o]+|[p]+|[q]+|[r]+|[s]+|[t]+|[u]+|[v]+|[w]+|[x]+|[y]+|[z]+|
	/", $f, $g);
			//create an array of lengths where the index correlates with the index of the letter
			$h = array_map('strlen', $g[0]);
			//find the index of the most occurring letter
			$i = array_search(max($h), $h);
			//find the index of the least occuring letter
			$j = array_search(min($h), $h);
			//add most occurring letter to part1
			$p1 .= substr($g[0][$i], 0, 1);
			//add least occuring letter to part2
			$p2 .= substr($g[0][$j], 0, 1);
		}
		//echo answer
		echo "$p1<br>$p2";