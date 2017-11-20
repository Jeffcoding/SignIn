<?php
require_once('../message/index.php')
$time=(int)date("Ymdhis");
$num='';
function viewcode($time)
{
	$temp=$time;
	function R()
	{
		$b=23333;
		$c=127;
		global $temp;
		$an=($temp*$b+$c)%65535;
		$temp=$an;
		return $an;
	}
	global $num;
	for( $i=0 ; $i<6 ; $i++)
	{
		$num .= (string)(R()%9);
	}
}
view($time);

?>