<!DOCTYPE html>
<html>
<head>
	<title>Hashing examples</title>
</head>
<body>
	<h1>Hashing</h1>
	<ul>
		<li>Used to obfuscate the data </li>
		<li>Hashing is irreversable</li>		
		<li>Used for end to end secrecy</li>
		<li style="font-weight: bold;">Hashing algorithms</li>
		<ul>
			<li>MD5</li>
			<li>SHA1</li>
			<li>SHA256</li>
			<li>RIPEMD160</li>
			<li>bcrypt</li>
		</ul>
	</ul>
	<?php
	$myHash = hash('md5', 'Hello World');
	echo '<span style="font-weight: bold;">Hash "Hello World"</span>' . '<br> New hash: ' . $myHash;

	echo '<br>';

	$myHash = hash('md5', 'Hello world');
	echo '<span style="font-weight: bold;">Hash "Hello world"</span>' . '<br> New hash: ' . $myHash;
	?>

	
<!-- <ul>
			<li>Blowfish</li>
			<li>twofish</li>
			<li>AES (Rijdael)</li>
			<li>3DES</li>
		</ul> -->

	</body>
	</html>	