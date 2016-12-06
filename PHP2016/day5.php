	<?php
		$input = "ojvtpuvg";
		$p = '';
		$i= $_POST['i'];
		$index = 0;

		while(strlen($p) < 1) {
			$c = md5($input.$i);
			if( substr($c,0,5) === "00000") {
				if($_POST['part'] === '1') { 
					$p = substr($c, 5, 1);
				} else {
					$index = substr($c, 5, 1);
					$p = substr($c, 6, 1);
				}
			}
			$i++;
		}

		echo json_encode(array("p" => $p, "index" => $index, "i" => $i));