<?php
$LEVELNAME="hacklandsecurityagency";
$LEVELPOINTS="1000";
require_once("../session.inc.php");


if(isset($_POST["passkey"]) || $_POST["passkey"]!="")
{
	if($_POST["passkey"]=="bbroygbvgw")
		$WIN=1;
	else 
	{
		require_once("../mysql.inc.php");
		updateUserLost($LEVELNAME);
		$INFOMSG="Wrong Answer!";
	}
}
$DISPLAYTEXT=<<<DISPLAYTEXT
<html>
<head>
<title>Hackland Security Agency (HSA)</title>
<link rel="stylesheet" href="style/main.css" />
</head>
<body bgcolor="#000000">
DISPLAYTEXT;
if($WIN==1)
{
	require_once("../mysql.inc.php");
	updateUserWin($LEVELNAME,$LEVELPOINTS);
	$DISPLAYTEXT .= "Congratulations, $LEVELPOINTS points have been added to your score! <a href='../'>Click here</a>";
}
else
{
$DISPLAYTEXT.=<<<DISPLAYTEXT
Hackland Security Agency is in deep trouble. An electronics scientist from an enemy state, has invented a device which can jam all the wireless signals coming to and from Hackland. HSA believes that the scientist is negotiating with a terrorist group and they must act fast. They have successfully implanted a packet-sniffer on his network, but they found all the communications were encrypted. To decrypt it, they need a "passkey", which is again, encrypted! Fortunately, they have recieved the following information from an HSA informer about the scientist's passkey:<b>
<ul>
<li>The passkey consists of only "lowercase alphabetical characters" and no numbers.
<li>The passkey is not a dictionary word.
<li>The passkey is encrypted with an algorithm, invented by the scientist himself.
</ul></b>
The HSA informer had also stolen the encrypted passkey and a binary of the encryption algorithm which the scientist uses for encryption. Unfortunately, his cover was blown before he could steal the decryption algorithm. So along with the above information, you also have the encrypted passkey and a binary of his encryption algorithm.<br/>
Your challenge is to decrypt the encrypted passkey by reverse engineering the algorithm and hand it over to HSA before its too late! All the above information are at your disposal. Best of Luck!
<br/>
<br/>
<center>
Download the binary of the encryption algorithm : <input type="button" value="download" onclick='window.open("encrypt.zip","_top")' />
<br/>
<br/>
The encrypted passkey is : 2397574293-0112002020
<br/><br/>
<form name="HSApasskey" action="index.php" method="POST">
<input type="text" value="" name="passkey" />
<input type="submit" value="Submit Passkey" />
</form><br/>$INFOMSG
</center>
DISPLAYTEXT;
}
$DISPLAYTEXT.="</body></html>";

echo $DISPLAYTEXT;
?>


