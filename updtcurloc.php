<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
  header("location:index.php");
}else
{
	require 'mysqli_connect.php';
$user_id=$_SESSION['user_id'];
$iama=$_REQUEST['iamas'];

$q="select user_id as u from basic where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
	if(mysqli_num_rows($r)>0)
	{
		$q1="update basic set nativeplace='$iama' where user_id=$user_id";
		$r1=mysqli_query($dbc,$q1);
			if($r1)
			{
				echo "updt";
				

			}else
			{
				echo "not updaed";
			}
	
	}else
	{
	
		$q112="INSERT into basic(user_id,nativeplace)values($user_id,'$iama')";
		$r112=mysqli_query($dbc,$q112);
		if($r112)
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