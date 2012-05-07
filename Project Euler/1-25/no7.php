<?php
/**
 * 
 * By listing the first six prime numbers: 2, 3, 5, 7, 11, and 13, we can see that the 6th prime is 13.
 * 
 * What is the 10 001st prime number?
 */

/**
 * 
 * Get prime numbers
 * @param unknown_type $max
 */
function getPrimes($max) {
	$int = 2;
	$primes = array();
	$length = 0;
	while ($length < $max) {
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
					$length++;
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

$primes = getPrimes(10001);

print $primes[10000];