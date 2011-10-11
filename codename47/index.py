#!/usr/bin/python
import os
import cgi
writedir="data/"

error_message= """The File name %s already exist                                                                                                               
. Please choose another file name and try again.<br>""" # % filename                                                                                           
formcontent="""<form action="#" method="post" name = "textposter" onsubmit="textposter.content.value='Message:'+textposter.content.value">                     
File Name: <input type="text" name="filename" value="" maxlength="5"><br>                                                                                      
Text to save:<br><textarea name="content" rows="15" cols="40"></textarea>                                                                                      
<input type="hidden" name="allowappend" value="False"><br>                                                                                                     
<input type="submit" name="submit" value="Post">                                                                                                               
</form>"""
filename=None
filecontent=None
form=cgi.FieldStorage()

if form.has_key('filename'):
        #formcontent='File successfully written to . To view the file you will need to be the owner or the administrator of the website.<br><br>%s'%formcontent                     
        filename=form.getvalue('filename')
        filecontent=form.getvalue('content')
        allowoverwrite=form.getvalue('allowappend')
        if allowoverwrite=='False' and os.path.exists(writedir+filename) :
            formcontent=(error_message%filename)+formcontent
        elif  ('/' in filename) or ('\\' in filename) or filename.endswith(".php") or filename.endswith(".py") or ('.' in filename and filename!='.htaccess'):
            error_message="You can't write to that location. Choose another filename. Be sure to only enter the file name and not its path or extention. Slashes not allowed."
            formcontent=(error_message)+formcontent
        else:
             newname=writedir+filename
             f=file(newname,"a")
             f.write('\n')
             form=cgi.FieldStorage()
             f.write(filecontent[:512])
             f.close()
             formcontent="File successfully written to <a href=\"%s\">%s</a>. To view the file you will need to be the owner or the administrator of the website.<br>%s"%(newname,newname,formcontent)

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
                                                                                                                                                                                   
                                                                                                                                                                                   
<div style="clear: both;"> </div>                                                                                                                                                  
                                                                                                                                                                                   
</div>                                                                                                                                                                             
                                                                                                                                                                                   
<div id="bottom"> </div>                                                                                                                                                           
                                                                                                                                                                                   
                                                                                                                                                                                   
</div>                                                                                                                                                                             
                                                                                                                                                                                   
</body>                                                                                                                                                                            
</html>""" # title #heading1 #heading2 #posttitle #post content                                                                                                                    

                                                                                                 
print 'Content-type: text/html\n\n'
print content%('Tight Security','Tight Security','Making the security: Tight','Text Poster',formcontent)


