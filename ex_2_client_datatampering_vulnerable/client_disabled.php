<?php
if($_POST)
{

    $price=$_POST["price"];
    if (isset($_POST["discount"]))
        $price=($_POST["price"]*$_POST["discount"])/100;
    echo "Congratulations!<p>You will recieve ".
    $_POST["quantity"]." new iPhone and will be charged ".($price*$_POST["quantity"]);
}
else
{
    ?>


    <form method="post">

        Product: iPhone<br>
        
        Price: 449 USD <br>

        Discount: <input type="text" name="discount" value="0" disabled>%<br>

        Quantity: <input type="text" name="quantity"><br>

        <input type="hidden" name="price" value="449">
        <input type="submit">

    </form>


    <?php
}
?>