<?php $n=0;
$x=4;
while(++$x<7){
	while(strpos(md5("bgvyzdsv$n"),str_repeat(0,$x))!==0)++$n;
	echo"$n ";
}
