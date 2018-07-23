<?php



if(!empty($_GET["exec"]))
{
    $output=shell_exec($_GET["exec"]);	// if you are running windows
    echo "<pre>".$output."</pre>";
}
    
?>
<form ">
    please enter ip or hostname to ping <br>
    <h5>Add " | dir" show the users access to execute binaries on the remote system</h5>
	<input type="text" name="exec" value="ping <?=@$_GET["host"];?>">
    <input type="submit">
</form>