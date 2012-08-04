<?php 

/**
* Question 3:
* Using the language of your choice, demonstrate the use of and abstract class.
*/

abstract class Q3AbstraceClass
{
	public function say_hello($name = 'world') 
	{
		return "Hello $name!";
	}
}
// one can not instantiate the Abstract class:
// $helloWorld = new Q3AbstraceClass;


// but it is possible to extend it
class Greetings extends Q3AbstraceClass
{
	public function in_french($name = 'world')
	{
		return "Bonjour $name!";
	}
}

// and instantiate the class that extends the abstact class
$helloWorld = new Greetings;
// and then use methods that are defined by the abstract class
echo $helloWorld->say_hello();
