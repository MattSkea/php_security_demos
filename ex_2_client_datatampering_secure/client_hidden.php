<?php


//Create a secret
//Random string that will be added to the price and time variables and hashed with md5
//This will create a token that will be compared to the value being passed from the client
$my_secret="This is a very long sequence of chars";

if($_POST)
{
	$products=explode("_", $_POST["price"]);
	//Grab the values being sent by the client
	$price=$products[0];
	$token=$products[1];
 	//Generate temp hashed using md5 and secret
	$temp=md5($price.$my_secret);
	echo "$price <br> $token<br>$temp<br>";
	if ($token==$temp)
	{
		echo "<br>Congratulations!<p>You will recieve ".
		$_POST["quantity"]." new iPhone and will be charged ".($_POST["price"]*$_POST["quantity"]);
	}
	else
	{
		echo "<br>Security Breach";
	}
}
else
{
	?>


	<form method="post">

		Product: iPhone<br>

		Price: 449 USD<br>

		Quantity: <input type="text" name="quantity"><br>

		<input type="hidden" name="price" value="449_<?php echo md5("449". $my_secret) ?>">

		<input type="submit">

	</form>
	<?php
}
?>