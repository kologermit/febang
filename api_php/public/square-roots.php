<?php 
	require_once('../libs/my/api-functions.php');
	$ver = params_verifiy($_GET, ["a" => "NUM"], ["b" => "NUM", "c" => "NUM"]);
	if ($ver["status"] == false) {
		echo JSONReturn($ver["message"], null, 400);
		http_response_code(400);
		exit;
	}
	if (isset($_GET["a"])) $a = (float)$_GET["a"]; else $a = 0;
	if (isset($_GET["b"])) $b = (float)$_GET["b"]; else $b = 0;
	if (isset($_GET["c"])) $c = (float)$_GET["c"]; else $c = 0;
	$d = $b*$b - 4*$a*$c;
	if ($d < 0) {
		echo JSONReturn("Roots not found", null, 200);
		exit;
	}
	if ($d == 0) {
		echo JSONReturn("Found 1 root", ["x1" => -$b / 2 / $a], 200);
		exit;
	}
	echo JSONReturn("Found 2 roots", ["x1" => (-$b - sqrt($d)) / 2 / $a,
		"x2" => (-$b + sqrt($d)) / 2 / $a], 200);
	exit;
?>