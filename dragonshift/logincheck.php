#! /usr/bin/env python
from subprocess import Popen, PIPE
import os
import cgi
import hashlib
from ConfigParser import ConfigParser
form=cgi.FieldStorage()
passfile=".htpasswd"
cfg=ConfigParser()
cfg.read(passfile)
def success():
	return "Success"

print 'Content-type: text/html\n\n'
if Popen(["php -f begin.script"], stdout=PIPE,shell=True).communicate()[0]:
        print Popen(["php -f begin.script"], stdout=PIPE,shell=True).communicate()[0]
        import sys
        sys.exit()
if form.has_key('uname') and form.has_key('pass'):
	uname=form.getvalue('uname')
	password=form.getvalue('pass')
	hash=hashlib.new("md5")
	hash.update(password)
	passhash=hash.hexdigest()
	if(  cfg.has_option('passwords',uname) and passhash==cfg.get('passwords',uname) ):
		print Popen(["php -f right.script"], stdout=PIPE,shell=True).communicate()[0]
		print success()
	else:
		print Popen(["php -f wrong.script"], stdout=PIPE,shell=True).communicate()[0]
		print "Password not correct according the the password file."
else:
	print "Error in Reading the password file :    <i>%s</i> <br>Server Error."%passfile
	
