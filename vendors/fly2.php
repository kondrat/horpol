<?php
	class fly2 {
		
		function fragment($text, $length = 70, $ellipsis = '...') {
			$soft = $length - 5;
			$hard = $length + 5;
			$rx = '/(^.{' . $soft . ',' . $hard . '})[\s,\.:\/="!\(\)<>~\[\]]+.*/u';

			if (preg_match($rx, $text, $r)) {
			 	$out = $r[1];
			} else {
			 	$out = mb_substr($text, 0, $length,'utf8');
			}
		 	$out = $out . (mb_strlen($out) < mb_strlen($text) ? $ellipsis : null);
		 	return $out;
		}
	}
?>