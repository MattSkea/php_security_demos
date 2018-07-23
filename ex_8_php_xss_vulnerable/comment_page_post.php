<?php
//OSRF??
//stored XSS attack

session_start();
if(!isset($_SESSION["name"]))
    exit();
include "database.php";
include "include.php";
gen_header();
LoggedIn(2);


if(isset($_POST["comment"]))
{
    $sql_r="INSERT INTO security.comments (id, text,user_name) VALUES (NULL, :text, :user)";
        //        echo $sql_r;
    $sth=$dbh->prepare($sql_r);

    $sth->bindParam(":text", $_POST["comment"]);
    $sth->bindParam(":user", $_SESSION["name"]);
    $sth->execute();
        //     var_dump($sth->errorInfo());
}

?>

<form method="post">
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
