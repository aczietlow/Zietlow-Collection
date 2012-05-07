<?php
/**
 * If we list all the natural numbers below 10 
 * that are multiples of 3 or 5, we get 3, 5, 6 and 9. 
 * The sum of these multiples is 23.
 * Find the sum of all the multiples of 3 or 5 below 1000.
 */

$upper = 1000;
$m1 = 3;
$m2 = 5;
$sum = 0;

while ($m1 < $upper) {
	$sum = $sum + $m1;
	$m1 = $m1 + 3;	
}

while ($m2 < $upper) {
	$sum = $sum + $m2;
	$m2 = $m2 + 5;
}

$m1 = 3;
$m2 = 5;
$x = 0;

//To account for the common multiples of $m1 and $m2.
if ($upper >= 16) {
	// $x is a boolean if you don't use () for that side of the logic statement.
	while (($x = ($m1*$m2)) < ($upper-1)) {
		$sum = $sum - $x;
		$m2 = $m2 + 5;
	}
}


echo ("$sum");