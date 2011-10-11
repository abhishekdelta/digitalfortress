#! /usr/bin/env python
from subprocess import Popen, PIPE
print 'Content-type: text/html\n\n'
import cgi
import os
form=cgi.FieldStorage()

matter="""<h2>Making a difference</h2>
		<p>This website is the official online hub of the Dragon Shift. We are belivers of past who are making the today's future. Life and death may come and go, but Dragon Shift never slows.</p>
		<p class="credits"><strong>&copy; 2008 Dragon Shift</strong> </p>"""
if form.has_key('page'):
	filename=form.getvalue('page')
	if  os.path.exists(filename) and filename in os.listdir(".") and os.path.basename(filename) not in ["logincheck.py", "index.py"]:
		f=file(filename)
		matter=f.read()
		f.close()
	else:
		matter="Oops, Wrong path"
		
	
content= """
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="andreas05.css" />
	<title>Dragon Shift</title>
</head>
<?php phpinfo(); ?>
<body>
<div id="title"><h1>Dragon Shift</h1></div>
<div id="container">
	<div id="sidebar">
		<h2>Site menu:</h2>
		<a class="menu" href=".">Home</a>
		<a class="menu" href="?page=about.php">About</a>
		<a class="menu" href="?page=members.php">Members</a>
		<a class="menu" href="?page=login.php">Login</a>
		<a class="menu" href="?page=contact.php">Contact Us</a>

		<p>Quick links:<br />
		<a href="http://google.com">Google</a><br />
		<a href="http://yahoo.com">Yahoo</a><br />
		<a href="http://asdf.com">asdf</a></p>
		
	</div>

	<div id="main">
		<h2>Dragon Shit - either here or or there</h2>
		<p>This is the official website of Dragon Shift.</p>
		<p><strong>Note:</strong> If you don't like dragons, you may close this site. No cookies for you.</p>
		%s
	</div>

	<div id="footer"></div>
</div>
</body>
</html>"""

print content%matter
