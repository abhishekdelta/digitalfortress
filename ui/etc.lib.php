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
UPDATES:<b><ul><li>Results are out! <a href=" http://pragyan.org/10/home/events/encypher/digital_fortress/Results">Click Here</a></li>
<li>Digital Fortress is in <i>Practice Mode</i>. You may solve any level you want and your score will also be updated but no relevance is given to your ranking hereafter.</li>
<li>Solutions will be put up on the Digital Fortress Forum.</li>
</ul>
	</div>
HOME;
	return $HOME;
}
function getContactPage()
{
	$CONTACT=<<<CONTACT
	<div id="contactbox">
	For any queries or bugs, contact : <br/><br/><hr/>
	Abhishek Shrivastava, abhi.nitt@gmail.com, +91-9894505965<br/>
	Sumit Ranjan, sumitr.nitt@gmail.com, +91-9952842678
	<hr/>
	<br/>
	PS : Please don't call us asking for hints. We may disqualify you if we get annoyed :)
	</div>
CONTACT;
	return $CONTACT;
}
?>
