<!DOCTYPE html>
<html>
<head>
	<title>CSRC (Cross site request forgery)</title>
</head>
<body>
	<h3>Tests done on XSS/CSRF <span style="font-style: italic;">vulnerable</span> website</h3>
	<p><a href="./csrf1.php">CSRF logout demo</a> - Demo 1: attacker gets a victim to click on a link that logs the victim out of the system</p>
	<p><a href="./csrf2.php">CSRF php multi push demo</a> - Demo 2: attacker gets a victim to click on a link, the link forwards the victim to a malicious page that will push data to the server using the victims session.</p>
	<p><a href="./csrf3.php">OSRF js multi push demo</a> - Demo 3: attacker gets a victim to click on a link, the link forwards the victim to a malicious page that will push data to the server using the victims session.</p>

	<h3>Securing against CSRF/OSRF</h3>
	<ol>
		<li>Implement a token that is stored in session and checked	when request is received</li>
		<ul>
			<li>The token should change on each request</li>
			<li><img src="securing.png">></li>
		</ul>
		<li>Check the referer header</li>
		<li>Use POST instead of GET</li>
		<li>Make sure that you are protected against XSS as well</li>
	</ol>
</body>
</html>