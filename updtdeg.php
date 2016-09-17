<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
  header("location:index.php");
}else
{
$user_id=$_SESSION['user_id'];
$user_name=$_SESSION['user_name'];
$predeg=$_REQUEST['predegs'];
$curdeg=$_REQUEST['curdegs'];
require 'mysqli_connect.php';
$q="select user_id as u from current where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
	if(mysqli_num_rows($r)>0)
	{
		$q1="update current set degree='$predeg',deg_cur='$curdeg' where user_id=$user_id";
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
		$q2="INSERT into current (user_id,degree,deg_cur)values($user_id,'$predeg','$curdeg')";
		$r2=mysqli_query($dbc,$q2);
		if($r2)
		{
			echo "ins";
			
		}else
		{
			echo "not ins";
			echo mysqli_error($dbc);
		}
	}

}
}
?>