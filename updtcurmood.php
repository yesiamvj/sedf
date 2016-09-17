<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
  header("location:index.php");
}else
{
	require 'mysqli_connect.php';
$user_id=$_SESSION['user_id'];
$mood=$_REQUEST['mood'];
$mdwrd=$_REQUEST['mdwrd'];
$mdwith=$_REQUEST['moodwith'];
$q="select user_id as u from cur_details where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
	if(mysqli_num_rows($r)>0)
	{
		$q1="update cur_details set mood='$mood',mood_with='$mdwith',orany='$mdwrd'";
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
		$q2="INSERT into cur_details(user_id,mood,mood_with,orany)values($user_id,'$mood','$mdwith','$mdwrd')";
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
