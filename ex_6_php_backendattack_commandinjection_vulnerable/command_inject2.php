<?php



if(!empty($_GET["host"]))
{
    $output=shell_exec("ping -n 4 ".$_GET["host"]); // run this if you are on windows
//    $output=shell_exec("ping -c 4 ".$_GET["host"]); // run this instead if you are on linux or mac
    echo "<pre>".$output."</pre>";
}
    

?>
<form>
    please enter ip or hostname to ping <br>
    <h5>Add " | dir" show the users access to execute binaries on the remote system</h5>
	<input type="text" name="host" value="<?=@$_GET["host"];?>">
    <input type="submit">
</form>