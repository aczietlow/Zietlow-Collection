<?php
/**
 * 2520 is the smallest number that can be divided by each of the numbers
 *  from 1 to 10 without any remainder.
 *  
 *  What is the smallest positive number that is evenly divisible by all
 *   of the numbers from 1 to 20?
 */

/**
 * 
 * Returns an array of prime numbers.
 */
function getPrimes($max) {
	$int = 2;
	$primes = array();
	while ($int < $max) {
		switch ($int) {
			case (($int%2 == 0) && ($int > 2)):
				$int++;
				break;
			case (($int%3 == 0) && ($int > 3)):
				$int++;
				break;
			case (($int%5 == 0) && ($int > 5)):
				$int++;
				break;
			case (($int%7 == 0) && ($int > 7)):
				$int++;
				break;
			default:
				$check = __primeCheck($primes, $int);
				if($check == TRUE) {
					$primes[] = $int;
				}
				$int++;
				break;
		}
	}
	return $primes;
}

/**
 * 
 * Checks if a number is a prime or not. 
 * @param int $num
 */
function __primeCheck($primes, $num) {
	if($num == 2) {
		return TRUE;
	}
	foreach($primes as $prime) {
		$primeCheck = $num%$prime;
		if ($primeCheck == 0) {
			return FALSE;
		}
	}
		return TRUE;
}

function highestMultiplePrimes($primes, $max) {
	foreach($primes as $prime) {
		$int = $prime;
		while($int+$prime <= $max) {
			$int = $int + $prime;
		}
		$numbers[] = $int;
	}
	
	$numbers = array_unique($numbers);
	return $numbers;
}

function multiply($numbers) {
	$result = 1;
	foreach ($numbers as $number) {
		$result = $result * $number;
	}
	return $result;
}

$max = 20;
$primes = getPrimes($max);
$numbers = highestMultiplePrimes($primes, $max);
$result = multiply($numbers);

print "$result";

?>