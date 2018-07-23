<?php
$finfo = finfo_open(FILEINFO_MIME_TYPE);
header("Content-type: ".finfo_file($finfo, $_GET["file"]));
finfo_close($finfo);

$handle=fopen($_GET["file"],"r");
while (!feof($handle)) {
	@$contents.= fread($handle, 8192);
}
echo $contents;
?>