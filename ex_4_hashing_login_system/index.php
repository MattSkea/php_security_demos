<?php
require_once './services/api-login.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login hashed with pepper</title>
</head>
<body>
	<h1>Login hashed with pepper</h1>

	<p>Login success details: <a href='index.php?email=guy@mail.com&pass=qwerty'>email=guy@mail.com&pass=qwerty</a></p>
	<p>Login credentials that don't match: <a href='index.php?email=guy@mail.com&pass=qwertyaaaaaa'>email=guy@mail.com&pass=qwertyaaaaaa</a></p>
	<p>Login credentials that don't match: <a href='index.php?email=gy@mail.com&pass=qwerty'>email=gy@mail.com&pass=qwerty</a></p>
	<p>Login details with <'script> <'/script>: <a href='index.php?email=guy<script></script>@mail.com&pass=qwerty'>email=guy<'script><'/script>@mail.com&pass=qwerty&pass=qwerty</a></p>
	<p>Login details with <'script> <'/script>: <a href='index.php?email=guy@mail.com&pass=qw<script></script>erty'>email=guy@mail.com&pass=qwerty&pass=qw<'script><'/script>erty</a></p>
	
	<p><a href="services/api-logout.php">Logout - kill session</a></p>

	<?php
	if(isset($_GET['email'])){
		echo '<p>--------------------------------------------</p>';

		$email = $_GET['email'];
		$pass = $_GET['pass'];


		login($email, $pass, $db);
	}
	?>
	<p>--------------------------------------------</p>
	<h3>Hashing passwords</h3>
	<ul>
		<li>Used to obfuscate the data </li>
		<li>Hashing is irreversable</li>		
		<li>Used for end to end secrecy</li>
	</ul>

	<h3>Salt, adding encryption</h3>
	<ul>
		<li>Used to further obfuscate the data</li>
		<li>Store the salt along with the password on the database</li>
		<ul>
			<li>Hash the salted hashed password before storing it on the server</li>
		</ul>
	</ul>

	<h3>Pepper, added to the salted hash</h3>
	<ul>
		<li>The pepper slows down the hashing process</li>
		<li>Pepper increases the number of secret values that have to be stored, which makes a system harder to crack</li>
		<ul>
			<li>This stops timing attacks</li>
		</ul>
	</ul>
	<h3>Sanitized login system with 1 minute timeout</h3>
	<p>Sanitize email - Remove all characters except letters, digits and !#$%&'*+-=?^_`{|}~@.[].</p>
	<p>Sanitize string (password) - Strip tags, optionally strip or encode special characters.</p>
	<h4>Select one of the login options</h4>


</body>
</html>