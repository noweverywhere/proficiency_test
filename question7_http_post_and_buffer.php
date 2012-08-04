<?php 
/**
* Question 7:
* Using the language of your choice, demonstrate connecting to a web server to
* perform an HTTP; subsequently store the response in a buffer.
*/

$url = 'http://google.com/';
$c = curl_init($url);
 
curl_setopt($c, CURLOPT_POST, 1);
// this request will  be empty
curl_setopt($c, CURLOPT_POSTFIELDS, '');
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);

// here output buffering is started
ob_start();
// send the request and put the response in the buffer
echo print_r(curl_exec($c);, true);
// here the response is put in the buffer
curl_close($c);
$string = ob_get_contents();
// here I clean the buffer or else the contents will get 
// sent to the browser
ob_end_clean();