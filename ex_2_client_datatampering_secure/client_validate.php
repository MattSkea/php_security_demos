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
        echo "Congratulations!<p>You will recieve ".
        $_POST["quantity"]." new iPhone and will be charged ".($_POST["price"]*$_POST["quantity"]);
    }   else
    {
        echo "Security Breach";
    }

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

    Price: <input type="text" name="price" value="449" disabled>USD<br>

    Quantity: <input type="text" id="quantity" name="quantity"><br>

    <input type="hidden" name="price" value="449_<?php echo md5("449". $my_secret) ?>">
    <input type="submit">

</form>


<?php
}
?>