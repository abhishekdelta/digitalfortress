#! /usr/bin/env python
import os
from subprocess import Popen, PIPE
website="http://www.ultapultakulta.com"
password="blackmind"
error_message= """We allow access to this page only through the link found on <a href="%s"><b><u>%s</u></b></a>
		<BR>Last, month, %s bought the rights to be our sole referer. Hence, we now only accept traffic from %s. Only those coming from this website are able to view the content. Sorry for the inconvenience thus caused."""%(website,website,website,website)

# title #heading1 #heading2 #posttitle #post content

content="""<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>%s</title>
<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>
<body>
<div id="wrap">

<div id="header">
<h1><a href="#">%s</a></h1>
<h2>%s</h2>
</div>

<div id="menu">
<ul>
<li><a href="#">Home</a></li>
<li><a href="#">About</a></li>
<li><a href="#">Links</a></li>
<li><a href="#">Personal Stuff</a></li>
<li><a href="#">Free Stuff</a></li>
<li><a href="#">Downloads</a></li>
<li><a href="#">SiteMap</a></li>
</ul>
</div>

<div id="content">
<div class="left"> 

<h2><a href="#">%s</a></h2>
%s</div>

<div class="right"> 

<h2>Site :</h2>
<ul>
<li><a href="#">Home</a></li>
<li><a href="#">About</a></li>
<li><a href="#">Links</a></li>
<li><a href="#">Personal Stuff</a></li>
<li><a href="#">Free Stuff</a></li>
<li><a href="#">Downloads</a></li>
<li><a href="#">SiteMap</a></li>
</ul>



</div>

<div style="clear: both;"> </div>

</div>

<div id="bottom"> </div>


</div>

</body>
</html>""" # title #heading1 #heading2 #posttitle #post content

print 'Content-type: text/html\n\n'
if os.environ.has_key('HTTP_REFERER') and os.environ['HTTP_REFERER']==website:
	print content%('Tight Security','Tight Security','Making the security: Tight','Password'," The password is<b> "+password+"</b>")
else:
	print content%('Tight Security','Tight Security','Making the security: Tight','Error',error_message)
