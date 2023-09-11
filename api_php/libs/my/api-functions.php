<?php 
	function JSONReturn($message, $data=null, $status=200) {
		$res = array("message" => $message, "data" => $data, "status" => $status);
		return json_encode($res);
	}
	function params_verifiy($request, $params=[], $optional_params=[]) {
		$res = array();
		foreach ($params as $key => $value) {
			if (isset($request[$key]) == false) {
				$res["message"] = "Param ".$key." not found";
				$res["status"] = False;
				return $res;
			}
			if ($value == "NUM" and is_numeric($request[$key]) == false) {
				$res["message"] = "Param ".$key." must be number";
				$res["status"] = False;
				return $res;
			}
			if ($value == "BOOL" and ($request[$key] == "TRUE" or $request[$key] == "FALSE") == false) {
				$res["message"] = "Param ".$key." must be boolean";
				$res["status"] = False;
				return $res;	
			}
		};
		foreach ($optional_params as $key => $value) {
			if (isset($request[$key]) == false) {
				continue;
			}
			if ($value == "NUM" and is_numeric($request[$key]) == false) {
				$res["message"] = "Param ".$key." must be number";
				$res["status"] = False;
				return $res;
			}
			if ($value == "BOOL" and ($request[$key] == "TRUE" or $request[$key] == "FALSE") == false) {
				$res["message"] = "Param ".$key." must be boolean";
				$res["status"] = False;
				return $res;	
			}
		};
		$res["message"] = "";
		$res["status"] = True;
		return $res;
	}
?>