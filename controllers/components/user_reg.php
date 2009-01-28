<?php
class userRegComponent extends Object {


	var $controller = null;

	function startup(&$controller) {
		$this->controller = $controller;
	}

	function createPassword($length = 8, $allowed_symbols = '23456789abcdeghkmnpqsuvxyz') {
		$keystring       = '';
		
		// Next code taken and modified from kcaptcha
		// generating random keystring
		while(true){
			$keystring='';
			for($i=0;$i<$length;$i++){
				$keystring.=$allowed_symbols{mt_rand(0,strlen($allowed_symbols)-1)};
			}
			if(!preg_match('/cp|cb|ck|c6|c9|rn|rm|mm|co|do|cl|db|qp|qb|dp/', $keystring)) break;
		}

		//
		return $keystring;
	}
	
}
?>