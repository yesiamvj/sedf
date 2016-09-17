<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
	header("location:index.php");
}else
{
	$user_id=$_SESSION['user_id'];
	require 'mysqli_connect.php';
	$npass=$_REQUEST['npass'];

	

	$opass=$_REQUEST['opass'];
	$fname=$_REQUEST['foldernm'];

	if(empty($npass))
	{
		$npass="";
	
	}
	if(empty($opass))
	{
		$opass="";
		
	}
	$m=sha1($opass);

	$n=sha1($npass);
	
	$q1="SELECT user_id as u from myfolders where passwd='$m' and folder_name='$fname' and user_id=$user_id";
	$r1=mysqli_query($dbc,$q1);
	if($r1)
	{
		if(mysqli_num_rows($r1)>0)
		{
	$q="UPDATE myfolders set passwd='$n' where user_id=$user_id and folder_name='$fname'";
	$r=mysqli_query($dbc,$q);
	if($r)
	{
		echo "Password Changed";
	}else
	{
		echo "password not set";
	}
		}else
		{
			echo "Try Again..";
		}
	}

}