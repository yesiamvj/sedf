<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['curloc']))
{
  header("location:index.php");
}else
{
	require 'mysqli_connect.php';
$user_id=$_SESSION['user_id'];
$location=$_REQUEST['curloc'];
$q="select user_id as u from cur_details where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
	if(mysqli_num_rows($r)>0)
	{
		$q1="update cur_details set cur_loc='$location' where user_id=$user_id";
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
		$q2="INSERT into cur_details(user_id,cur_loc)values($user_id,'$location')";
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
