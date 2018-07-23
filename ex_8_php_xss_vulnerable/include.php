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
            if(!isset($_SESSION['name'])){
                echo "<p>PLEASE LOGIN</p>";
            } else{
                echo "<p>You are now logged in as: ".htmlentities($_SESSION["name"]);
            }
        }

        ?>