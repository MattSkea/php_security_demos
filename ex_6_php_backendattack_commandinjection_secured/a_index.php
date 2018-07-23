<!DOCTYPE html>
<html>
<head>
	<title>Securing the php vertual server</title>
</head>
<body>
	<h1>Protecting your php webserver from attackers</h1>
	<h2>Disable functions</h2>
	<h3>Avoid dangerous functions like:</h3>
	<ul style="color:tomato; font-weight: bold">
		<li>remote include</li>
		<li>include</li>
		<li>exec</li>
		<li>system</li>
		<li>eval</li>
	</ul>
	<p>Disable the functions in <span style="font-weight: bold">php.ini</span> file</p>
	<a href="calculator.php">Calculator example</a>

	<h2>Limit client access</h2>
	<p>Make sure that the <span style="font-weight: bold">client can only access the folders and file types that you want to allow access to</span></p>
	<p>Create a <span style="font-weight: bold">.htaccess</span> file in folders that you want to block clients from accessing.</p>
	<p>.htaccess files are used to protect folders and files from attackers, snooping clients and search robots</p>
	<a href="download_list.php">Image viewer</a>
	
	<h2>Sanitize data being sent to the client</h2>
	<p>If absolutely needed make sure to <span style="font-weight: bold">escape dangerous characters before supplying data to these functions</span></p>
	<p>Setup flags if you detect malicius characters like:</p>
	<ul style="color:tomato; font-weight: bold">
		<li>|</li>
		<li>/</li>
		<li>\</li>
		<li>..</li>
		<li>null</li>
		<li>byte</li>
		<li>%00</li>
	</ul>
	<a href="command_inject.php">Command inject 1</a><br>
	<a href="command_inject2.php">Command inject 2</a>
</body>
</html>