<?php
$dir = opendir (".");
while (false !== ($file = readdir($dir))) {
        if (strpos($file, '.png',1)||strpos($file, '.jpg',1) ) {
            echo "<a href='download.php?file=".$file."'>$file</a> <br />";
        }
}


?>
