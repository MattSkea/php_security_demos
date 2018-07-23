<?php
session_start();
include "database.php";
include "include.php";
/*Put the include api-cookie-timeout in all the header.php pages - pages that are called on every request */
include "api-cookie-timeout.php";

gen_header();
?>
<?php
if(isset($_SESSION["name"]))
{
    LoggedIn(0);
    //Create the session once the use has logged in
    create_cookie();
}
else
{
    if(isset($_GET["login"]) and isset($_GET["password"])){
        DoLogin();
    }
    else
        ShowLoginForm();
}
function ShowLoginForm()
{
    ?>
    <form class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputUser" class="sr-only">Email address</label>
        <input type="text" id="inputUser" name="login" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>

    <?php
}

function DoLogin()
{
    global $dbh;
    $sql_query="select * from security.users where username=:user and password=:pass";
    $sth=$dbh->prepare($sql_query);
    $sth->bindParam(":user", $_GET["login"]);
    $sth->bindParam(":pass", $_GET["password"]);
    $sth->execute();
    
    $result=$sth->fetchAll();
    if(!empty($result))
    {
        $_SESSION["name"]=$result[0]["username"];
        LoggedIn(0);
    }
    else
        ShowLoginForm();

}


?>
</div>

</body>
