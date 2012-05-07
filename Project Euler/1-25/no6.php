<?php
/**
 * The sum of the squares of the first ten natural numbers is,
 * 12 + 22 + ... + 102 = 385
 * 
 * The square of the sum of the first ten natural numbers is,
 * (1 + 2 + ... + 10)2 = 552 = 3025
 * 
 * Hence the difference between the sum of the squares of the first ten natural numbers and the square of the sum is 3025 − 385 = 2640.
 * Find the difference between the sum of the squares of the first one hundred natural numbers and the square of the sum.
 */

$sum = 0;
$result = 0;

for($i=1; $i<=100; $i++) {
	$numbers[] = $i;
}

foreach($numbers as $number) {
	$sum = $sum + $number;
}

foreach($numbers as $number) {
	$result = $result + ($number * $number);
}

$sum = $sum * $sum;

$answer = $sum - $result;
print ($answer);