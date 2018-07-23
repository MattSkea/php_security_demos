<?php
//Create a secret
//Random string that will be added to the price and time variables and hashed with md5
//This will create a token that will be compared to the value being passed from the client
$my_secret="This is a very long sequence of chars";

if($_POST)
{
    $products=explode("_", $_POST["products"]);
    $minutes=$products[0];
    $price=$products[1];
    $token=$products[2];
    //Generate temp hashed using md5 and secret
    $temp=md5($minutes."_".$price.$my_secret);
    //  echo $temp;
    if ($token==$temp)
    {
        echo "Congratulations!<p>You have bought ".
            $minutes." minutes and will be charged ".$price. " USD";
    }
    else
    {
        echo "Security Breach";
    }

    }
else
{
?>


<form method="post">
    Select number of minutes to be connected: 
    <select name="products">
        <option value="30_30_<?php echo md5("30_30".$my_secret) ?>">30 minutes - 30 USD</option>
        <option value="60_45_<?php echo md5("60_45".$my_secret) ?>">60 minutes - 45 USD</option>
        <option value="120_55_<?php echo md5("120_55".$my_secret) ?>">120 minutes - 55 USD</option>
    </select>

    <input type="submit">

</form>
<?php
}
?>


