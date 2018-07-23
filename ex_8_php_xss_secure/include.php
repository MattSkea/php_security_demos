<?php
function gen_header()
{
    ?>
    <head>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body>
        <div class="container">

            <?php
        }

        function footer()
        {
            echo "</div></body></html>";
        }
        function LoggedIn($active)
        {

            ?>
            <ul class="nav nav-pills" role="tablist">
                <li role="presentation" <?php echo ($active==0?"class=\"active\"":"") ?> ><a href="./login.php">Home</a></li>
                <li role="presentation" <?php echo ($active==1?"class=\"active\"":"") ?> ><a href="./order_page.php">Order page</a></li>
                <li role="presentation" <?php echo ($active==2?"class=\"active\"":"") ?> ><a href="./comment_page.php">Comments page</a></li>
                <li role="presentation" <?php echo ($active==3?"class=\"active\"":"") ?> ><a href="./comment_page_fixed.php">Comments page(Pre-fixed)</a></li>
                <li role="presentation" <?php echo ($active==4?"class=\"active\"":"") ?> ><a href="./logout.php">Logout</a></li>
            </ul>
            <?php
            echo "<h2>You are now logged in as: ".htmlentities($_SESSION["name"]) . "</h2>";
            echo "<p>Cookie name: " . "PHPSESSID </p>";
            echo "<p>Cookie Id: " . $_COOKIE["PHPSESSID"] . "</p>";
            // $currentCookieParams = session_get_cookie_params(); 
            // print_r($currentCookieParams);
            // echo "<br>";
            // print_r($_COOKIE);
        }

        ?>