<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
	header("location:index.php");
}else
{
	$user_id=$_SESSION['user_id'];

	require 'mysqli_connect.php';
	$post_id=$_REQUEST['postid'];
	$rate=$_REQUEST['rate'];
        
			$time= date("g:i a ,F j, Y"); 
	$q="SELECT user_id from post_status where user_id=$user_id AND post_id=$post_id ";
	$r=mysqli_query($dbc,$q);
	if($r)
	{
		if(mysqli_num_rows($r)>0)
		{
			$u="UPDATE post_status set rating='$rate',r_seen=0,rate_time='$time' where user_id=$user_id and post_id=$post_id";
			$ru=mysqli_query($dbc,$u);
			if($ru)
			{
				echo"update ur rate as $rate";
			}else{
				echo "err in updt";
			}
		}else
			{
				$i="INSERT INTO post_status (post_id,user_id,rating,rate_time,r_seen)values('$post_id','$user_id','$rate','$time',0)";
				$ri=mysqli_query($dbc,$i);
				if($ri)
				{
					echo "ur rate inserted as $rate";
				}else
					{
						echo "err in insrt";
					}
			}

	}	
}
?>