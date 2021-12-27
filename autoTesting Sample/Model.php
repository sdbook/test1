<?php
function getAvg($x, $y) {
	if ($x == $y) {
		return $x+1;
	} else return (int)($x+$y)/2;
}

function getMax($x, $y) {
	return $x;
}
?>
