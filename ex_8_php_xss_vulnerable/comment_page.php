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


if(isset($_GET["comment"]))
{
    $sql_r="INSERT INTO security.comments (id, text,user_name) VALUES (NULL, :text, :user)";
        //        echo $sql_r;
    $sth=$dbh->prepare($sql_r);

    $sth->bindParam(":text", $_GET["comment"]);
    $sth->bindParam(":user", $_SESSION["name"]);
    $sth->execute();
        //     var_dump($sth->errorInfo());
}

?>

<form method="get">
    Please leave comments here:
    <textarea  name="comment"></textarea>
    <input type="submit">
</form>

<?php

echo "<table class=\"table table-striped\"><tbody>";

$sth=$dbh->query("SELECT * FROM security.comments");
while($row = $sth->fetch( PDO::FETCH_ASSOC )){
    echo "<tr><td>User: " . $row['user_name'] . "<br> Comment: " . $row['text'] . "\n</td></tr>";
}
echo "</tbody></table>"
?>
