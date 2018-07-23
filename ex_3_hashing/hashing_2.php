<h2>Salting</h2>
<ul>
	<li>Used to further obfuscate the data</li>
	<li>Store the salt along with the password on the database</li>
	<ul>
		<li>Hash the salted hashed password before storing it on the server</li>
	</ul>
	<li>Gives a new string on every refresh</li>
</ul>
<h3>Basic salting</h3>

<?php
$salt = rand(0, 100);
$password = 'Hello world';
$hashed_password = hash('sha256', $password . $salt);

echo '<span style="font-weight: bold;">Adding random salt to sha256 hashed password "Hello world"</span>' . '<br>Salt: ' . $salt . ' <br> New salted hash: ' . $hashed_password;		
?>

<h3>More secure salting</h3>
<ul>
	<li>Using base64 encoding & mcrypt - creates random safe salts</li>
</ul>
<?php
$salt = base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM));
$password = 'Hello world';
$hashed_password = hash('sha256', $password . $salt);

echo '<span style="font-weight: bold;">Adding random salt to sha256 hashed password "Hello world"</span>' . '<br>Salt: ' . $salt . ' <br> New salted hash: ' . $hashed_password;		
echo '<p><span style="font-weight: bold;">Value to store:</span>' . $salt . $hashed_password . '</p>'
?>
<h3>Hash the secure password</h3>


<h2>Storing the salted, hashed password</h2>
<?php 
echo '<p><span style="font-weight: bold;">Value to store:</span>' . $salt . $hashed_password . '</p>'
?>

