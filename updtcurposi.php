<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
  header("location:index.php");
}else
{
	require 'mysqli_connect.php';
$user_id=$_SESSION['user_id'];
$position=$_REQUEST['posis'];
$oranypos=$_REQUEST['orany'];
$nameoforgn=$_REQUEST['namoforg'];
$q="select user_id as u from cur_position where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
	if(mysqli_num_rows($r)>0)
	{
		$q1="update cur_position set position='$position',nmoforg='$nameoforgn',orany='$oranypos'";
		$r1=mysqli_query($dbc,$q1);
		if($r1)
		{
			echo "updated";
		}else
		{
			echo "not updated";
		}
	}else
	{
		$q2="INSERT into cur_position(user_id,position,orany,nmoforg)values($user_id,'$position','$oranypos','$nameoforgn')";
		$r2=mysqli_query($dbc,$q2);
		if($r2)
		{
			echo "ins";
		}else
		{
			echo "not ins";
		}
	}
}

}
?>
