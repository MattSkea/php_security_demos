<?php
if (!empty($_GET["equation"]))
	eval ("echo ".@$_GET["equation"].";");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<form>
    Please enter equation <input type="text" name="equation">
    <input type="submit">
</form>