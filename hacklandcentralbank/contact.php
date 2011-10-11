<?php
include_once("static.php");
$DISPLAYTEXT= $HEAD;

$DISPLAYTEXT .= <<<DISPLAYTEXT
<table cellspacing=5>
<tr><td>Chairman</td><td>Mr. Prakash Patel</td><td>prakashpatel@hacklandmail.hl</td></tr>
<tr><td>Accounts Mananger</td><td>Mr. Bilbo Baggins</td><td>bilbobaggins@hacklandmail.hl</td></tr>
<tr><td>Network Administrator</td><td>Ms. Susan Fletcher</td><td>susanfletcher@hacklandmail.hl</td></tr>
<tr><td>Customer Relations</td><td>Ms. Noor Peterson</td><td>noorpeterson@hacklandmail.hl</td></tr>
</table>
<br/><br/>
Customer Care Hotline : 1001-01101100 (Toll Free 24x7)
DISPLAYTEXT;

$DISPLAYTEXT .= $FOOT;

echo $DISPLAYTEXT;
?>
