<head>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <div class="container">
<?php

    include "database.php";
    if (!empty($_GET["login"]))
    {
    
        $sql_query="select * from users where username='".$_GET["login"]."' and password='".$_GET["password"]."'";
//       echo $sql_query."<br>";

        $results = mysql_query($sql_query);

        if ($row=mysql_fetch_array($results))
        {
            echo "<div class='alert alert-success' role='alert'>Welcome mr ".$row[1]." Your email is  ".$row[4]."</div><br>";
        }
    }else{

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