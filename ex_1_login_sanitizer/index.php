<?php
require_once './services/api-login.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login sanitizer</title>
</head>
<body>
	<h1>Sanitized login system with 1 minute timeout</h1>
	<p>Sanitize email - Remove all characters except letters, digits and !#$%&'*+-=?^_`{|}~@.[].</p>
	<p>Sanitize string (password) - Strip tags, optionally strip or encode special characters.</p>
	<h4>Select one of the login options</h4>

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
</body>
</html>