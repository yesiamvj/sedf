<?php session_commit();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) )
{
    header("location:index.php");
}else
{
  $user_id=$_SESSION['user_id'];

  $time=$time=date("g:i a,s");
  $day=date('F j, Y');
  require_once 'mysqli_connect.php';
  	
  $q="SELECT online_id as od from onlines where user_id=$user_id";
  $r=mysqli_query($dbc,$q);
  if($r)
  {
  	if(mysqli_num_rows($r)>0)
  	{
  		$q1="UPDATE onlines set time='$time',day='$day' where user_id=$user_id";
  		$r1=mysqli_query($dbc,$q1);
  		if($r1)
  		{
  		//	echo'updt';
  		}

  	}else
  	{
  		$q2="INSERT into onlines (user_id,time)values($user_id,'$time')";
  		$r2=mysqli_query($dbc,$q2);
  		if($r2)
  		{
  			//echo'ins';
  		}
  	}
  }else
  {
  	//echo "n r";
  }

}

	?>