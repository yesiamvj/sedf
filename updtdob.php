<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
  header("location:index.php");
}else
{
$user_id=$_SESSION['user_id'];

$day=$_REQUEST['d'];
$month=$_REQUEST['m'];
$year=$_REQUEST['y'];
$age=$_REQUEST['a'];
require 'mysqli_connect.php';
$q="select user_id as u from basic where user_id=$user_id";
$r=mysqli_query($dbc,$q);
if($r)
{
	if(mysqli_num_rows($r)>0)
	{
		$q1="update basic set year='$year',month='$month',day='$day',age=$age where user_id=$user_id";
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
		$q2="INSERT into basic (user_id,day,month,year,age)values('$user_id','$day','$month','$year',$age)";
		$r2=mysqli_query($dbc,$q2);
		if($r2)
		{
			echo "ins";
			echo mysqli_error();
		}else
		{
			echo "not ins";
		}
	}

}
}
?>