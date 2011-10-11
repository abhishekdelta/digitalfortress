<?php
function getChallenges($USERLOGGEDIN)
{
	if($USERLOGGEDIN==false)
	{
		return "Please Login First!";
	}
	
	$challenges='<div id="challenges">';
	$userid=$_SESSION['digifort10_userid'];
	$query="SELECT level_id,level_name,level_desc,level_points,level_wins,level_attempts FROM digifort_levels WHERE level_win_users NOT LIKE '%{".$userid."}%' ORDER BY level_id";

	$result=mysql_query($query);
	$flag=false;
	while($row=mysql_fetch_assoc($result))
	{
		$flag=true;
		if($row['level_wins']+0.0==0)
			$ratio=0;
		else
		{
			$ratio=(($row['level_wins']+0.0)/($row['level_attempts']+0.0))*100.0;
		}
		$ratioSubstr = substr($ratio,0,5);
		$challenges.=<<<CHALLENGEBOX
			<div class="challengebox">
				<a  href="{$row['level_name']}/levelstart.php">
					<div id="digitbox">
						<img id="digit" src="ui/images/numbers/{$row['level_id']}.png" />
					</div>
					<div id="levelcontent">Level {$row['level_id']}<br/>{$row['level_desc']}<br/>Points: {$row['level_points']}<br/>
						No. of users completed: {$row['level_wins']}
					</div>
				</a>
			</div>
CHALLENGEBOX;
	}
	
	if($flag==false)
	{
		$challenges.="<br/>You have completed all the levels! We never expected anyone to do so, but you did and you are truly a genious. Now relax and wait for the results. U did a great job!";
	}
	$challenges.='</div>';
	return $challenges;
}
?>
