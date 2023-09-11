<?php 
	require_once('../libs/my/api-functions.php');
	$ver = params_verifiy($_GET, ["a" => "NUM"], ["b" => "NUM", "c" => "NUM"]);
	if ($ver["status"] == false) {
		echo JSONReturn($ver["message"], null, "ERROR");
		exit;
	}
	$a = (float)$_GET["a"];
	if (isset($_GET["b"])) $b = (float)$_GET["b"]; else $b = 0;
	if (isset($_GET["c"])) $c = (float)$_GET["c"]; else $c = 0;
	$d = $b*$b - 4*$a*$c;
	if ($d < 0) {
		echo JSONReturn("Roots not found", null, "SUCCESS");
		exit;
	}
	if ($d == 0) {
		echo JSONReturn("Found 1 root", [-$b / 2 / $a], "SUCCESS");
		exit;
	}
	echo JSONReturn("Found 2 roots", ["roots" => [(-$b - sqrt($d)) / 2 / $a, (-$b + sqrt($d)) / 2 / $a]], 200);
	exit;
?>