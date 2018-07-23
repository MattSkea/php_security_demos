<?php
//Create a secret
//Random string that will be added to the price and time variables and hashed with md5
//This will create a token that will be compared to the value being passed from the client
$my_secret="This is a very long sequence of chars";

if($_POST)
{
    // var_dump($_POST);
    $price=$_POST['price'];
    $quantity = $_POST['quantity'];

    //If there is a discount create a variable that will hold it
    if(isset($_POST['discount']))
    {
       $discount = $_POST['discount'];
   }

   //Neat vardump
   echo '<pre>' . var_export($_POST, true) . '</pre>';

   switch (isset($_POST)) 
   {
    case isset($discount): 

        $products=explode("_", $_POST["discount"]);
        $discount=$products[0];
        $token=$products[1];

        $products=explode("_", $_POST["price"]);
        $price=$products[0];

        //Generate temp hashed using md5 and secret
        $temp=md5($discount . "_".$my_secret);
        echo $temp;
        if ($token==$temp)
        {

            echo "<p>Congratulations!<p>You will recieve ". $_POST["quantity"]."</p> 
            new iPhone and will be charged ".($price*$_POST["quantity"]);

            echo "<br><br> With a $discount% discount<br>";

            $price=($_POST["price"]*$_POST["discount"])/100;
        }
        else
        {
            echo "<br>FLAGGED SECURIT DETECTION, USER TAMPERING WITH THE DISCOUNT";
        }
        break;
    
    case isset($price):

        $products=explode("_", $_POST["price"]);
         //Grab the values being sent by the client
        var_dump($products);
        $price=$products[0];
        $token=$products[1];

        //Generate temp hashed using md5 and secret
        $temp=md5($price.$my_secret);
        if ($token==$temp)
        {
            echo "<p>Congratulations!<p>You will recieve ". $_POST["quantity"]."</p> 
            new iPhone and will be charged ".($price*$_POST["quantity"]);
        }
        else
        {
            echo "<br>FLAGGED SECURIT DETECTION, USER TAMPERING WITH THE PRICE";
        }

        break;
        
    default:
    {  
        echo "No data entered";
        break;
    }
}
}

else
{
    ?>

    <form method="post">

        Product: iPhone<br>

        Price: 449 USD <br>

        Discount: <input type="text" value="20" disabled="">%<br>

        Quantity: <input type="text" name="quantity"><br>

        <input type="hidden" name="price" value="449_<?php echo md5("449". $my_secret) ?>">
        <input type="hidden" name="discount" value="20_<?php echo md5("20_". $my_secret) ?>"">
        <input type="submit">

    </form>


    <?php
}
?>