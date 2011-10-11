<?php
function getSessionData($user_id) {
        $query = "SELECT `user_name`,`user_email`,`user_lastlogin` FROM `digifort_users` WHERE `user_id`=$user_id";
        $data = mysql_query($query) or die(mysql_error());
        $temp = mysql_fetch_assoc($data);
        $user_name = $temp['user_name'];
        $user_email = $temp['user_email'];
        $lastlogin = $temp['user_lastlogin'];
        $sessionDataRaw = $user_id . $user_name . $user_email . $lastlogin;
        $sessionData = md5($sessionDataRaw);
        return $sessionData;
}

function checkSessionAuth()
{
	if(!isset($_SESSION['digifort10_authid']) || !isset($_SESSION['digifort10_userid']))
		return false;
	if(md5("ALPHA".$_SESSION['digifort10_userid'])==$_SESSION['digifort10_authid'])
		return true;
	return false;
}
function checkAuth()
{
 	if (!isset($_SESSION['userId']) || !isset($_SESSION['data']) || getSessionData($_SESSION['userId']) != $_SESSION['data']) {
 		if(!isset($_POST['username']) || !isset($_POST['password']))
 			return 0;
 		$username = addslashes($_POST['username']);
		$query = "SELECT `user_id`,`user_name`,`user_password` FROM `digifort_users` WHERE `user_name`='$username'";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		if($row['user_password'] == md5($_POST['password']))
		{
			$_SESSION['userId'] = $row['user_id'];
			$_SESSION['data'] = getSessionData($row['user_id']);
			
			$query = "UPDATE `digifort_users` SET `user_lastlogin`=NOW() WHERE `user_id` ='{$row['user_id']}'";
		   	mysql_query($query) or die(mysql_error() . " in login.lib.L:111");
		   	return $row['user_id'];
		}
                return 0;
        } 

	$userid=$_SESSION['userId'];
	  $query = "SELECT * FROM `pragyan10`.`form_regdata` where `page_modulecomponentid`=31 and user_id=$userid";
	  $resource = mysql_query($query) or die(mysql_error());
	if(mysql_num_rows($resource)!=1) {
                        return 0;
                     }
	return $_SESSION['userId'];
}
function setAuth($userid)
{
	$_SESSION['digifort10_userid']=$userid;
	$_SESSION['digifort10_authid']=md5("ALPHA".$_SESSION['digifort10_userid']);
	tryActivateUser($userid);
}
function clearAuth()
{
	if(!isset($_SESSION['digifort10_authid']) || !isset($_SESSION['digifort10_userid']))
		return false;
	unset($_SESSION['digifort10_userid']);
	unset($_SESSION['digifort10_authid']);
	return true;
}

function showWarning($type)
{

	if($type==1)
		echo "You are not authorized to view this page. <a href='../'>Click here to go back.</a>";
	else if($type==2)
		echo "You have already completed this level. <a href='../'>Click here to go back.</a>";
}
?>
