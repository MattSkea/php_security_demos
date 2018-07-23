<?php
function generate_random_string() {
	$length = 24;
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

function create_cookie(){
	$siteSessionId = generate_random_string();
	//echo "<br>$siteSessionId<br>";
	$SITESESSIONNAME = 'CUSTOMCOOKIE'; //NEVER CHANGE TEH NAME
	//Creating a cookie
	//setcookie(name, value, expire, path, domain, secure, httponly);
	setcookie($SITESESSIONNAME,$siteSessionId, time() + 1);

	//print_r($_COOKIE);
}

function destroy_cookie(){


	$cookieId = $_COOKIE["CUSTOMCOOKIE"];
	$cookieName = "CUSTOMCOOKIE";
	//TO destroy a session set the timer to a negative
	setcookie($cookieName,$cookieId, time() + (-3600));
}
	
//$currentCookieParams = session_get_cookie_params(); 
//echo "<br>"; 
//print_r($currentCookieParams);
