<?php 
	require_once('../libs/my/api-functions.php');
	require_once('../libs/my/math.php');
	$ver = params_verifiy($_GET, [
		"x1" => "NUM",
		"y1" => "NUM",
		"x2" => "NUM",
		"y2" => "NUM",
		"x3" => "NUM",
		"y3" => "NUM"]);
	if ($ver["status"] == false) {
		echo JSONReturn($ver["message"], null, "ERROR");
		exit;
	}
	$x1 = (float)$_GET["x1"]; $x2 = (float)$_GET["x2"]; $x3 = (float)$_GET["x3"];
	$y1 = (float)$_GET["y1"]; $y2 = (float)$_GET["y2"]; $y3 = (float)$_GET["y3"];
	$a = sqrt(sqr($x1-$x2) + sqr($y1-$y2));
	$b = sqrt(sqr($x1-$x3) + sqr($y1-$y3));
	$c = sqrt(sqr($x3-$x2) + sqr($y3-$y2));
	echo JSONReturn("Sides was found", ["sides" => [$a, $b, $b]], "SUCCESS");
?>