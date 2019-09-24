<?php
/**
 * Tools to format custom fields
 */
function _portfolio_listformat( $p) {
	if (strpos($p,"->") === FALSE) {
		return "<p>". $p . "</p>";
	} else {
		$ul_array = explode("->",$p); 
	$ul = "<ul>";
	$li = "<li>";
	$li_end = "</li>";
	$ul_end = "</ul>";

	if(($ul_array[0] !== "") ) {
		$p = "<p>" .$ul_array[0] . "</p>" . $ul ; 
	} else {
		$p = $ul;
	}
	for($i=1;$i< count($ul_array);$i++) {
		$p .= $li . $ul_array[$i] . $li_end;
	}
	$p.= $ul_end;
	
	return $p;
	}
}
function _portfolio_strongformat($p) {
	if (strpos($p,"$") === FALSE) {
		return $p;
	} else {
		$array_strong = explode("$",$p);
		$p ="";
		for($i=0; $i< count($array_strong); $i++) {
			if(($i >= 1) && ($i%2!==0)) {
				$p .= "<strong>" . $array_strong[$i] ."</strong>";
			} else {
				$p .= $array_strong[$i] ;
			}
		}
	}
	return $p;
}

function _portfolio_jumplineformat ($p) {
	if (strpos($p,"+") === FALSE) {
		return $p;
	} else {
		$p = str_replace("+","<br />",$p);
	}
	return $p;
}