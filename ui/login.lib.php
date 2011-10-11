<?php
function getLoginForm()
{
	$loginform=<<<LOGIN
	<form id='loginform' name='loginform' action='index.php?page=login' method='POST'>
	Are you ready ? 
	<input type='text' name='username' />
	<input type='password' name='password' />
	<input type='submit' value='Login into Digital Fortress' />
	</form>
LOGIN;
	return $loginform;
}
function checkLogin(&$USERLOGGEDIN)
{
	require_once("auth.lib.php");
	$userid=checkAuth();
	if($userid!=0)
	{
		setAuth($userid);
		updateUserLogin($userid);
		$USERLOGGEDIN=true;
	}
	
}
function logout(&$USERLOGGEDIN)
{
	if($USERLOGGEDIN==false)
	{
		return "You are not logged in!";
	}
	$valid=clearAuth();
	if($valid==true)
	{
		$USERLOGGEDIN=false;
		return "You have been successfully logged out!";
		
	}
	else 
	{
		return "Logout Failed!";
	}
}
