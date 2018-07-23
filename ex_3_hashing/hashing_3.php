	<h2>Comparing salted passwords</h2>
	<?php 
	$storedHashedPassword = 'ba1d7dd70414df4ab3b46f17dccf006da3805a3ee58fb16a60beb09af087fab8';
	$salt = '0L7IB5+TgbXjQOCl5T49sQ==';
	$password = 'Hello world';
	$wrongPassword = 'Hello World';
	$clientsHashedPassword = hash('sha256', $password.$salt);
	$clientsWrongHashedPassword = hash('sha256', $wrongPassword.$salt);

	echo '<p><span style="font-weight: bold;">Stored salted and hash password: </span>' . $storedHashedPassword . '</p>' .
	'<p><span style="font-weight: bold;">Salt: </span>' . $salt  . '</p>' .
	'<p><span style="font-weight: bold;">Password: </span>' . $password . '</p>' ;

	echo 'Clients hashed password: ' . $clientsHashedPassword;
	
	echo '<h3>Test with the correct password</h3>';

	if ($clientsHashedPassword == $storedHashedPassword)
		echo "<p style='color: green;'>Login success</p>";
	else
		echo "<p style='color: red;'>Login failed</p>";


	echo '<h3>Test with the wrong password</h3>';

	if ($clientsWrongHashedPassword == $storedHashedPassword)
		echo "<p style='color: green;'>Login success</p>";
	else
		echo "<p style='color: red;'>Login failed</p>";