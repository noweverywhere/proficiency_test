<?php
/**
* question8_sort_array.php
* 
* Question 8:
* Using the language of your choice, sort the following array to contain even
* numbers (lowest to highest) prior to odd numbers (lowest to hightest)
* {1, 9, 16, 4, 22, 31, 6, 19, 48, 3, 90, 61, 88 ,55, 27}
*
*/


$unsorted_numbers = array(1, 9, 16, 4, 22, 31, 6, 19, 48, 3, 90, 61, 88 ,55, 27);
$result = sort_odd_even_low_high($unsorted_numbers);
echo '<pre>' . print_r($result) . '</pre>';


function sort_odd_even_low_high ($array) {
	// first sort all the numbers lowest to hightest
	sort($array);
	$odd_array = array();
	$even_array = array();

	foreach ($array as $number) {
		// save remainder if number is divided by 2
		$odd_or_even = $number % 2;


		if ($odd_or_even === 0)
		{
			// if the number is even push it to array
			$even_array[] = $number;
		} 
		else 
		{
			// if the number is odd push it to array
			$odd_array[] = $number;
		}
	}

	// after looping over all the numbers merge the arrays
	$result = array_merge($odd_array, $even_array);
	return $result;
}


