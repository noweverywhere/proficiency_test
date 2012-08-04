<?php 
/**
* Question 4:
* Using the language og your choice, demonstrate a singleton
*/

class Q4SingletonClass
{
    // create a variable that will keeo track of 
    // whether the class has been instantiated
    private static $instance = null; 

    // make costructor and clone methods private
    // so that they can not be called directly
	private function __construct()
	{
		echo "making singleton <br/>";
	}
	private function __clone() {}

	// this function is the one that will need to be called
	// to create a new instance or have an existing instance
	// returned
	public static function MakeAnInstanceOrReturnExistingInstance()
	{
		echo "calling to make new instance </br>";
		echo print_r(self::$instance, true) . "<br/>";
		// check if instance already exists
		if (self::$instance == null) 
		{
			// create an instance of this class and store it
			// in the private variable 
			self::$instance = new Q4SingletonClass();
		}
		// return the instance that already exitsted
		// or the one tht was just created
		return self::$instance;
	}



}

// this will create the first instance
$fact = Q4SingletonClass::MakeAnInstanceOrReturnExistingInstance();
// this will have the first instance returned to it
$fact2 = Q4SingletonClass::MakeAnInstanceOrReturnExistingInstance();
// sp that these two variable are holding exactly the same instance
if ($fact === $fact2) {
	echo "they are the same";
}

// output should be:

// calling to make new instance 
//
// making singleton 
// calling to make new instance 
// UserFactory Object ( ) 
// they are the same