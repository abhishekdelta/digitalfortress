<?php
define('MYSQL_SERVER', 'localhost');
define('MYSQL_USERNAME', 'digitalfortress');
define('MYSQL_PASSWORD', 'digitalfortress');
define('MYSQL_DATABASE', 'digitalfortress10');

function mysqlConnect() {
        mysql_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD) or die('Could not connect to server pragyan.');
        mysql_select_db(MYSQL_DATABASE) or die('Could not select database.');
}


function updateUserWin($levelname,$points)
{
	$userid=$_SESSION['digifort10_userid'];
	
	$query="SELECT level_win_users FROM digifort_levels WHERE level_name='$levelname'";
	$result=mysql_query($query);
	$row=mysql_fetch_row($result);
	$winners=$row[0]."|{".$userid."}";
	
	$query="UPDATE digifort_users SET score=score+$points,last_win_time=NOW(),last_win_level='$levelname',time_counter=TIMESTAMPDIFF(SECOND,`activated_time`,NOW()) WHERE user_id=$userid";
	mysql_query($query);
	
	$query="UPDATE digifort_levels SET level_wins=level_wins+1, level_attempts=level_attempts+1,level_win_users='$winners' WHERE level_name='$levelname'";

	
	mysql_query($query);

}
function updateUserAttempt($levelname)
{
	$userid=$_SESSION['digifort10_userid'];
	$query="SELECT last_attempt_level FROM digifort_users WHERE user_id=$userid";
	$result=mysql_query($query);
	$row=mysql_fetch_row($result);
	if($row[0]!=$levelname)
		updateUserLost($levelname);
	
}
function updateUserLost($levelname)
{
	$userid=$_SESSION['digifort10_userid'];
	$query="UPDATE digifort_users SET last_attempt_time=NOW(),last_attempt_level='$levelname' WHERE user_id=$userid";
	
	mysql_query($query);
}
function updateUserLogin($userid)
{
	
	$query="UPDATE digifort_users SET last_login=NOW() WHERE user_id=$userid";
	mysql_query($query);
}
function isLevelCompleted($levelname)
{
	$userid=$_SESSION['digifort10_userid'];
	$query="SELECT level_id FROM digifort_levels WHERE level_win_users LIKE '%{".$userid."}%' AND level_name='$levelname'";
	$result=mysql_query($query);
	if(mysql_num_rows($result)==0)
		return false;
	return true;
}

function getUserScore()
{
	$userid=$_SESSION['digifort10_userid'];
	$query="SELECT score FROM digifort_users WHERE user_id=$userid";

	
	$result=mysql_query($query);
	$row=mysql_fetch_row($result);
	return $row[0];
}
function getUserRank($score)
{
	$userid=$_SESSION['digifort10_userid'];
	$query="SELECT count(user_id) FROM digifort_users WHERE score>$score";	
	$result=mysql_query($query);
	$row=mysql_fetch_row($result);
	$above=$row[0];
	$query="SELECT time_counter FROM digifort_users WHERE user_id=$userid";
	$result=mysql_query($query);
	$row=mysql_fetch_row($result);
	$counter=$row[0];
	$query="SELECT count(user_id) FROM digifort_users WHERE score=$score AND time_counter<$counter";

	$result=mysql_query($query);
	$row=mysql_fetch_row($result);
	$same=$row[0];

	return $above+$same+1;
}
function tryActivateUser($userid)
{
	$query="SELECT user_id FROM digifort_users WHERE user_id=$userid";
	$res=mysql_query($query);
	$count=mysql_num_rows($res);
	if($count==0)
	{
		$query="INSERT INTO digifort_users (`user_id`,`activated_time`)  VALUES ($userid,NOW())";
		mysql_query($query);
	}
}
function getLevelPoints($levelname)
{
	$query="SELECT level_points FROM digifort_levels WHERE level_name='$levelname'";
	$result=mysql_query($query);
	$row=mysql_fetch_row($result);
	return $row[0];
}
function getLevelInfo($levelname)
{
	$query="SELECT level_info FROM digifort_levels WHERE level_name='$levelname'";
$result=mysql_query($query);// or die("error1");
	$row=mysql_fetch_row($result);// or die("error2");
	return $row[0];
}
function getLevelId($levelname)
{
	$query="SELECT level_id FROM digifort_levels WHERE level_name='$levelname'";
	$result=mysql_query($query);
	$row=mysql_fetch_row($result);
	return $row[0];
}
?>
