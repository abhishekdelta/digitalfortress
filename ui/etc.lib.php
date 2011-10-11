<?php
function getHomePage($USERLOGGEDIN)
{
	$HOME=<<<HOME
	<div id="introbox">
	Welcome to Digital Fortress 2010.<br/>
	The levels are designed in such a way so as to emulate real-world challenges as closely as possible.<br/>
	You may start with any level you want, but be aware that the "points" associated with the level are an indication of its difficulty.<br/>
	Go to <a href="index.php?page=challenges">challenges page</a> and pick your victim!
	<br>Use the <a href="http://www.pragyan.org/10/forum/digitalfortress">Forum</a> for any doubts or queries.<br/>
	We wish you best of luck!<br/><br/>
	</div>
HOME;
	return $HOME;
}
function getContactPage()
{
	$CONTACT=<<<CONTACT
	<div id="contactbox">
	For any queries or bugs, contact : <br/><br/><hr/>
	Abhishek Shrivastava, i.abhi27@gmail.com
	<hr/>
	</div>
CONTACT;
	return $CONTACT;
}
?>
