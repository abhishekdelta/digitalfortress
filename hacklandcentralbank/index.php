<?php
include_once("static.php");

$DISPLAYTEXT = $HEAD;
$DISPLAYTEXT .= <<<DISPLAYTEXT
Welcome to Hackland Central Bank! <br/>
We provide the most secure online transactions throughout Hackland.<br/>
Please browse our site for more details about our achievements and services.<br/>
If you would like to open an account with us, please send an email to our Account Manager.</p>
DISPLAYTEXT;
$DISPLAYTEXT .= $FOOT;

echo $DISPLAYTEXT;
?>
