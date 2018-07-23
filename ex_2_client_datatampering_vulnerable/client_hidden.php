<?php
if($_POST)
    echo "Congratulations!<p>You will recieve ".
        $_POST["quantity"]." new iPhone and will be charged ".($_POST["price"]*$_POST["quantity"]);
else
{
?>


<form method="post">

    Product: iPhone<br>

    Price: 449 USD<br>

    Quantity: <input type="text" name="quantity"><br>

    <input type="hidden" name="price" value="449">

    <input type="submit">

</form>
<?php
}
?>