<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['q']))
{
    header("location:index.php");
}else
{
	$user_id=$_SESSION['user_id'];
	$cu_id=$_REQUEST['q'];
	$cday=date('F j, Y');
  $curtime=date("g:i a,s");
	require 'mysqli_connect.php';
	$msg=mysqli_real_escape_string($dbc,$_REQUEST['msg']);
	
	$q="SELECT type_id as tp from msg_typing where user_id=$user_id and cu_id=$cu_id";
	$r=mysqli_query($dbc,$q);
	if($r)
	{
		if(mysqli_num_rows($r)>0)
		{
			$q2="UPDATE msg_typing set typed='$msg',time='$curtime',day='$cday' where user_id=$user_id and cu_id=$cu_id";
			$r2=mysqli_query($dbc,$q2);
			if($r2)
			{

			}
		}else
		{
			$q3="INSERT into msg_typing (user_id,cu_id,typed,time,day)VALUES($user_id,$cu_id,'$msg','$curtime','$cday')";
			$r3=mysqli_query($dbc,$q3);
			if($r3)
			{
				echo'ins';
			}else
			{
				echo mysqli_error($dbc);
			}

		}
	}
  }