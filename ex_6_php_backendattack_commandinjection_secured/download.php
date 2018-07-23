<?php
$finfo = finfo_open(FILEINFO_MIME_TYPE);

$size = getimagesize( $_GET["file"]);
if ($size === false) {
	throw new Exception("{$filename}: Invalid image.");
}
if ($size[0] > 2500 || $size[1] > 2500) {
	throw new Exception("{$filename}: Image too large.");
}

if (!$img = @imagecreatefromstring(file_get_contents( $_GET["file"]))) {
	throw new Exception("{$filename}: Invalid image content.");
}

header("Content-type: ".finfo_file($finfo, $_GET["file"]));
finfo_close($finfo);

$handle=fopen($_GET["file"],"r");
while (!feof($handle)) {
	@$contents.= fread($handle, 8192);
}
echo $contents;
?>