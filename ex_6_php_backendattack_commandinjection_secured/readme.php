<!DOCTYPE html>
<html>
<head>
	<title>Securing the php vertual server</title>
</head>
<body>
	<h1>Disable functions</h1>
	<h3>Avoid dangerous functions like:</h3>
	<ul>
		<li>remote include</li>
		<li>include</li>
		<li>exec</li>
		<li>system</li>
		<li>eval</li>
	</ul>
	<p>Disable the functions in <span style="font-weight: bold">php.ini</span> file</p>
	<p>If absolutely needed make sure to <span style="font-weight: bold">escape dangerous characters before supplying data to these functions</span></p>
	<h6>Make sure that the <span style="font-weight: bold">client can only access the folders and file types that you want to allow</span></h6>
	<p>Setup flags if you detect malicius characters like:</p>
	<ul>
		<li>/</li>
		<li>\</li>
		<li>..</li>
		<li>null</li>
		<li>byte</li>
		<li>%00</li>
	</ul>
	<p>Create a <span style="font-weight: bold">.htaccess</span> file in folders that you want to block clients from accessing.</p>
	<p>.htaccess files are used to protect folders and files from attacks and search robots</p>
</body>
</html>