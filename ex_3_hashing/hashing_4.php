<h1>Pepper</h1>
<h3>Adding pepper</h3>
<ul>
	<li>The pepper slows down the hashing process</li>
	<ul>
		<li>This stops timing attacks</li>
	</ul>
	<li>Pepper increases the number of secret values that have to be stored, which makes a system harder to crack</li>
	<li>Store the pepper in the server side code</li>
	<ul>
		<li>Never store the pepper on the database</li>
	</ul>
</ul>
<?php
$password = 'Hello world!';
$pepper = 'Thisismypepper';
$pepperSentenceLength = strlen($pepper);
$options = ['cost' => $pepperSentenceLength];
$hash = password_hash($password.$pepper, PASSWORD_DEFAULT, $options);

echo '<p>Password: ' . $password . '</p>' .
'<p>Pepper: ' . $pepper . '</p>' . 
'<p>Pepper length: ' . $pepperSentenceLength . '</p>' .
'<p>Hashed, peppered password: ' . $hash . '</p>' ;

?>

<h4>Comparing correct peppered passwords</h4>

<?php
if (password_verify($password.$pepper,$hash))
	echo "<p style='color: green;'>Login success</p>";
else
	echo "<p style='color: red;'>Login failed</p>";

?>


<h4>Comparing incorrect peppered passwords</h4>
<?php
$wrongPassword = 'Hello world!';
$wrongHash = password_hash($wrongPassword.$pepper, PASSWORD_DEFAULT, $options);


if (password_verify($wrongHash.$pepper,$hash))
	echo "<p style='color: green;'>Login success</p>";
else
	echo "<p style='color: red;'>Login failed</p>";
?>