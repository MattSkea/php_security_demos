<head>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <div class="container">
<?php
    $dbh=new PDO('mysql:host:localhost','root','keasec');
    $sql_query="select * from security.users where username=:user and password=:pass";

    $sth=$dbh->prepare($sql_query);

    $sth->bindParam(":user", $_GET["login"]);
    $sth->bindParam(":pass", $_GET["password"]);
    $sth->execute();
    $result=$sth->fetchAll();
    if(!empty($result))
    {
        echo "<div class='alert alert-success' role='alert'>login OK</div>";
    }
    else
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

?>
</div></body></html>