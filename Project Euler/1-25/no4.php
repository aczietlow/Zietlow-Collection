<?php
/**
 *  A palindromic number reads the same both ways.
 *   The largest palindrome made from the product of 
 *   two 2-digit numbers is 9009 = 91 × 99.
 *   
 *   Find the largest palindrome made from the product of two 3-digit numbers.
 */


/**
 * 
 * Checks if a number is a palendrome.
 * @param int $int
 */
function palidromeCheck($int) {
	$length = strlen($int);
	
	if($length%2 != 0) {
		return FALSE;
	}
	
	$splitInt = str_split($int, ($length*.5));
	
	if($splitInt[0] == strrev($splitInt[1])) {
		return TRUE;
	}
	
	else {
		return FALSE;
	}
}

function findPalidrome($numberSet) {
	foreach($numberSet as $number) {
		$check = palidromeCheck($number);
		if($check == TRUE) {
			return $number;
		}
	}
	return FALSE;
}

for($i=900; $i<=999; $i++) {
	for($j=900; $j<=999; $j++) {
		$numberSet[] = $i*$j;	
	}
}

$numberSet = array_reverse($numberSet);

$palidrome = findPalidrome($numberSet);

print $palidrome;
