<?php
	//Get pepper options
require_once 'api-config.php';

//Hash the users password being passed from the client
function hash_clients_pass($pass){
	//Get pepper options
	// require_once 'api-config.php';

	// echo "<br>SHIT<br> ". getPepper() . "<br>";
	// $pepper = getPepper() ;

	$config_options = getConfigOptions();

	$pepper = $config_options['pepper'];
	$cost = $config_options['peppercost'];

	$hashedPass = password_hash($pass.$pepper, PASSWORD_DEFAULT, $cost);

	return $hashedPass;
}

//Compare the hased passwords
function compare_hashed_pass($clientPass, $dbPass){
	
	//Result is a boolean used to determin  if the passwords match
	$result = 0;


	$config_options = getConfigOptions();
	$pepper = $config_options['pepper'];

	$hashedPass = password_hash($clientPass.$pepper, PASSWORD_DEFAULT, $config_options['peppercost'] );

	echo "<p>Clients pass: " . $clientPass . "</p>";
	echo "<p>Clients hashed pass: " . $hashedPass . "</p>";
	echo "<p>Servers pass: " . $dbPass . "</p>";


	//Get pepper options
	// require_once 'api-config.php';

	if(password_verify($clientPass.$pepper, $dbPass)){
		//Passwords match
		return $result = 1;
	} else{
		//Passwords don't match
		return $result = 0;
	}

	return $result;
}