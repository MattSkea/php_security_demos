<?php
if($_POST)
{
    $products=explode("_", $_POST["products"]);
    $minutes=$products[0];
    $price=$products[1];

    echo "Congratulations!<p>You have bought ".
        $minutes." minutes and will be charged ".$price. " USD";
}
else
{
?>


<form method="post">
    Select number of minutes to be connected: 
    <select name="products">
        <option value="30_30">30 minutes - 30 USD</option>
        <option value="60_45">60 minutes - 45 USD</option>
        <option value="120_55">120 minutes - 55 USD</option>
    </select>

    <input type="submit">

</form>
<?php
}
?>


