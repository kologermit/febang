<?php 
	require_once('../libs/my/api-functions.php');
	require_once('../libs/my/math.php');
	$ver = params_verifiy($_GET, [
		"a" => "NUM",
		"b" => "NUM",
		"c" => "NUM"]);
	if ($ver["status"] == false) {
		echo JSONReturn($ver["message"], null, "ERROR");
		exit;
	}
	$a = (float)$_GET["a"];
	$b = (float)$_GET["b"];
	$c = (float)$_GET["c"];
	if ($a >= $b + $c) {echo JSONReturn("a >= b + c", null, "ERROR"); exit;}
	if ($b >= $a + $c) {echo JSONReturn("b >= a + c", null, "ERROR"); exit;}
	if ($c >= $a + $b) {echo JSONReturn("c >= a + b", null, "ERROR"); exit;}
	$cos_angle = ($a*$a + $c*$c -$b*$b) / (2*$a*$c);
	$sin_angle = sqrt(1 - sqr($cos_angle));
	$area = $sin_angle * $a * $c / 2;
	echo JSONReturn("Angel was found", ["area" => $area], "SUCCESS");
?>