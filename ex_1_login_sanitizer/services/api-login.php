<?php 

require_once 'api-connection.php';
require_once 'api-login-sanitizer.php';
require_once 'api-string-comparison.php';
require_once 'api-login-logs.php';
require_once 'api-lock-account.php';

//Login user
function login($email, $pass, $db){

    //Console output
	echo '<p>Email address: ' . $email . ' </p>';
	echo '<p>Password: ' . $pass . '</p>';
	echo '<p>--------------------------------------------</p>';

	//Sanitize user input for the login
	//Sanitize password
	$mySanitizedLogin = sanitizeLogin($email, $pass);

    //Create sanitized placeholders
	$sanitizedEmail = $mySanitizedLogin['email'];
	$sanitizedPass = $mySanitizedLogin['pass'];

    //Compare the sanitized and unsanitzied login credentials
    //returns: 0-false, 1-true 
	$compEmailStrings = compareSanitizedStr($email, $sanitizedEmail);
	$compPassStrings = compareSanitizedStr($pass, $sanitizedPass);

	echo "Email result: $compEmailStrings <br>
	Password result: $compPassStrings"; 

	echo '<p>--------------------------------------------</p>';
	//If the strings have not been tampered with, proceed to logging the user in
	if($compEmailStrings==1 && $compPassStrings==1){

		//Get the users details
   		//Retreive the data from the database if it matches the data entered
		$stmt = $db->prepare('SELECT * FROM users WHERE email=:email');
		$stmt->bindValue(':email', $email);
		$stmt->execute();


		if ($user = $stmt->fetchObject()) {
			$userid = $user->id;
			//Make sure the users account is not locked
			$isAccountLocked = lockUserAccount($userid , $db);

			echo "<br>Is account locked: $isAccountLocked <br>";

			//If the user isnt timed out log them in
			if($isAccountLocked==0){

				//Compare the users passwords
				//If the passwords match , log in the user
				if($sanitizedPass == $user->pass){
					echo "<br>Passwords match<br>";

					//Log the user in
     				//Create a session with the users email address
					$_SESSION['id'] = $user->id;
					$_SESSION['mail'] = $user->email;

     		   		//Create a placeholder for the user id
					$userId = $_SESSION['id'];

   		     	 	//Log the successful login attempt
					logSuccessfulLogin($userId, $db);

 		      		//UI output
					echo '<h2 style="color:green">Login success</h2>'
					. '<p>The user has now got an active session: ' . $_SESSION['usrmail'] . '</p>';
				} else{
					//else if the passwords don't match
					echo '<h1 style="color:red">Login failure</h1>';
					//Log the unsuccessful login attempt
					logUnsuccesfulLogin($sanitizedEmail, $db);

					echo "<br>Passwords dont match<br>";
				}
			}
		} else {
        //Log the unsuccessful login attempt
		// logUnsuccesfulLogin($email_sanitized, $db);
			echo '<h1 style="color:red">Login failure</h1>';
			echo '<h4 style="color:red">Possible attack - some of the credentials don\'t match</h4>';
		}
	} else{
		//else if there is tampering with the strings 
		echo "<h4 style='color:red'>Possible attack - the user entered illegal characters, no connection to the DB has been made!</h4>";
	}
}