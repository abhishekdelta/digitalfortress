#! /usr/bin/env python
print 'Content-type: text/html\n\n'
f=file("data/.htaccess","w")
data="""AuthType Basic
AuthName "Username-Password required to view personal files"
Require valid-user
AuthUserFile /var/www/html/10/cms/P10/digitalfortress/codename47/data/passwords"""
f.write(data)
f.close()
print "Reseted"
