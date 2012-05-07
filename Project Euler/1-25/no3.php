<?php
/**
 * 	The prime factors of 13195 are 5, 7, 13 and 29.
 * 
 *  What is the largest prime factor of the number 600851475143 ?
 *  
 *  @todo: add functionality to fetch additional prime numbders if factorization 
 *  is to much.
 */


/**
 * 
 * Returns an array of prime numbers.
 */
function getPrimes($max) {
	$int = 2;
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
				$check = primeCheck($primes, $int);
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
function primeCheck($primes, $num) {
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

function primeMultiples($int) {
	$largestPrime = 0;
	$primes = getPrimes(10000);
	foreach ($primes as $prime) {
		$check = $int%$prime;
		if(($check == 0)  && ($prime > $largestPrime)) {
			$largestPrime = $prime;
		}
	}
	return $largestPrime;
}


$largestPrime = primeMultiples(600851475143);

print $largestPrime;