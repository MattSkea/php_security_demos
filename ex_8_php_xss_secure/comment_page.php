<?php
    //stored XSS attack

session_start();
if(!isset($_SESSION["name"])){
    header('Location: ./login.php');
    exit();
}
include "database.php";
include "include.php";
gen_header();
LoggedIn(2);


if(isset($_POST["comment"]))
{
    /* Step 3(Token): check that the clients token hasn't been tampered with*/
    if (!isset($_POST["csrf_token"]) || $_SESSION["csrf_token"]!=$_POST["csrf_token"])
    {
        /*If there is cookie tampering, log the users details*/
        echo "Security Error - possible CSRF detected";
        /*Forward the user back to the home page*/
        /*If the user hits this error 5 times in a row, ban their account & ip*/
       // header('Location: ./comment_page.php');
        exit();
    }

    /* Step 2(Referer): check that the referer header url matches the expected referer url*/
   // if($_SERVER['HTTP_REFERER'] !== "ex_8_php_xss_secure/order_page.php"){

  //      /*If there is cookie tampering, log the users details*/
   //     echo "Security Error - possible CSRF detected";
    //}
    //echo  "<br>";

    /*If there isn't a security breach, continue running the code*/

    $sql_r="INSERT INTO security.comments (id, text,user_name) VALUES (NULL, :text, :user)";
        //        echo $sql_r;
    $sth=$dbh->prepare($sql_r);
    $comment = $_POST["comment"];
    $sth->bindParam(":text", $comment);
    $sth->bindParam(":user", $_SESSION["name"]);
    $sth->execute();
    //     var_dump($sth->errorInfo());
}

/* Step 1(Token): create the token that will be used to protect users from CSRF*/
$_SESSION["csrf_token"]=hash("sha256",rand()."secretstring");

/* Step 1(Referer): check referer header of page posting form*/
//echo $_SERVER['HTTP_REFERER'] . "<br>";
?>

<form method="post">
    Please leave comments here:
    <?php
    /* Step 2(Token): send the token to the server */
    ?>
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION["csrf_token"] ?>">
    <textarea  name="comment"></textarea>
    <input type="submit">
</form>

<?php

echo "<table class=\"table table-striped\"><tbody>";


$sth=$dbh->query("SELECT * FROM security.comments");
while($row = $sth->fetch( PDO::FETCH_ASSOC )){
    echo "<tr><td>User: " . htmlentities($row['user_name']) . "<br> Comment: " . htmlentities($row['text']) . "\n</td></tr>";
}
echo "</tbody></table>";
?>
