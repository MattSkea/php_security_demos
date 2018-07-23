<?php
if($_POST)
{
    echo "Congratulations!<p>You will recieve ".
        $_POST["quantity"]." new iPhone and will be charged ".($_POST["price"]*$_POST["quantity"]);
}
else
{
?>
<script>
    function ValidateForm()
    {
        var q=document.getElementById("quantity").value;
        q=parseInt(q);
        if (parseInt(q)<1 || parseInt(q)>100 || isNaN(q))
        {
           alert("Quantity must be between 1 and 100");
           return false
        }
    }
</script>

<form method="post" onsubmit="return ValidateForm()">

    Product: iPhone<br>

    Price: <input type="text" name="price2" value="449" disabled>USD<br>

    Quantity: <input type="text" id="quantity" name="quantity"><br>

    <input type="hidden" name="price" value="449">
    <input type="submit">

</form>


<?php
}
?>