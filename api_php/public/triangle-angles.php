<?php 
	require_once('../libs/my/api-functions.php');
	$ver = params_verifiy($_GET, ["a" => "NUM", "b" => "NUM", "c" => "NUM"]);
	if ($ver["status"] == false) {
		echo JSONReturn($ver["message"], null, "ERROR");
		exit;
	}
	const PI = 3.1415;
	$a = (float)$_GET["a"];
	$b = (float)$_GET["b"];
	$c = (float)$_GET["c"];
	if ($a >= $b + $c) {echo JSONReturn("a > b + c", null, "ERROR"); exit;}	
	if ($b >= $a + $c) {echo JSONReturn("b > a + c", null, "ERROR"); exit;}	
	if ($c >= $b + $a) {echo JSONReturn("c > b + a", null, "ERROR"); exit;}	
	echo JSONReturn("Angel was found", [
		acos(($a*$a + $c*$c -$b*$b) / (2*$a*$c)) * 180 / PI,
		acos(($a*$a + $b*$b -$c*$c) / (2*$a*$b)) * 180 / PI,
		acos(($b*$b + $c*$c -$a*$a) / (2*$b*$c)) * 180 / PI], 
	"SUCCESS");
?>