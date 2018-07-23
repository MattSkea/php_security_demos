<?php

        $username = "root";
        $password = "";
        $hostname = "localhost";

        $dbhandle = @mysql_connect($hostname, $username, $password)
                or die("Unable to connect to MySQL");
        mysql_select_db("security", $dbhandle)
                or die("Could not select security");
 
?>
