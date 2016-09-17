<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
  header("location:index.php");
}else
{
$user_id=$_SESSION['user_id'];
$status=$_REQUEST['status'];
$oranyo=$_REQUEST['orany'];
$withrels=$_REQUEST['withrel'];
require 'mysqli_connect.php';
$q="select user_id as u from relation_stat where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
	if(mysqli_num_rows($r)>0)
	{
		$q1="update relation_stat set status='$status',orany='$oranyo',withrel='$withrels' where user_id=$user_id";
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
		
		$q2="INSERT into relation_stat (user_id,status,orany,withrel)values($user_id,'$status','$oranyo','$withrels')";
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