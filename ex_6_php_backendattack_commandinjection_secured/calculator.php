<?php
if (!empty($_GET["equation"]))
	eval ("echo ". @$_GET["equation"].";");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1>Eval exploit</h1>
<p>Don't use php <span style="font-weight: bold">phpinfo()</span> function ever!!!</p>
<a href="https://www.owasp.org/index.php/Direct_Dynamic_Code_Evaluation_(%27Eval_Injection%27)">Owasp description of the eval exploit</a>
<form>

    Please enter equation <input type="text" name="equation" value="1 + 1; phpinfo();">
    <input type="submit">
</form>