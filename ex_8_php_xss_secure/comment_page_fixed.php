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
LoggedIn(3);


if(isset($_GET["comment"]))
{

	if (!isset($_GET["csrf_token"]) || $_SESSION["csrf_token"]!=$_GET["csrf_token"])
	{
		echo "Security Error";
		exit();
	}

	$sql_r="INSERT INTO security.comments (id, text,user_name) VALUES (NULL, :text, :user_name)";
		//        echo $sql_r;
	$sth=$dbh->prepare($sql_r);
	$sth->bindParam(":text", $_GET["comment"]);
	$sth->bindParam(":user_name", $_SESSION["name"]);
	$sth->execute();
}

$sth=$dbh->query("SELECT * FROM security.comments");
while($row = $sth->fetch( PDO::FETCH_ASSOC )){
	echo "<hr>Username:  ". htmlentities($row['user_name']) . "<br>\n Comment: " . htmlentities($row['text']) . "<br>\n";
		//		echo "<hr>Username:  ". ($row['user_name']) . "<br>\n Comment: " . ($row['text']) . "<br>\n";
}
$_SESSION["csrf_token"]=hash("sha256",rand()."secretstring");
?>
<form method="get">
	Please leave comments here:
	<input type="hidden" name="csrf_token" value="<?php echo $_SESSION["csrf_token"] ?>">
	<textarea  name="comment"></textarea>
	<input type="submit">
</form>

