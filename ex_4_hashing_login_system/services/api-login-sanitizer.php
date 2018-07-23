<?php

//Sanitizes users email and password
// - called by api-login
function sanitizeLogin($email, $pass) {
    //Create a placeholder for the credentials
    $sanitizedLoginDetails = [];
    
    //Sanitize the variables
    $email_sanitized = filter_var($email, FILTER_SANITIZE_EMAIL);
    $pass_sanitized = filter_var($pass, FILTER_SANITIZE_EMAIL);
    
    //Push sanitized variables into an array that can be used later
    $sanitizedLoginDetails['email'] = $email_sanitized;
    $sanitizedLoginDetails['pass'] = $pass_sanitized;
    
    //Returns the sanitized strings
    return $sanitizedLoginDetails;
}

//$mySanitizedLogin =  sanitizeLogin($email, $pass);

//var_dump($mySanitizedLogin);

//$sanitizedEmail = $mySanitizedLogin['email'];

