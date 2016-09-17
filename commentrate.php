<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
	header("location:index.php");
}else
{
	$user_id=$_SESSION['user_id'];

	require 'mysqli_connect.php';
	$comment_id=$_REQUEST['commetid'];
	$rate=$_REQUEST['rate'];
	$q="SELECT comment_id from comment_status where user_id=$user_id and comment_id=$comment_id";
	$r=mysqli_query($dbc,$q);
	if($r)
	{
		if(mysqli_num_rows($r)>0)
		{
			$u="UPDATE comment_status set rate='$rate',comment_id='$comment_id' where user_id=$user_id and comment_id=$comment_id";
			$ru=mysqli_query($dbc,$u);
			if($ru)
			{
				echo"update ur rate as $rate";
			}else{
				echo "err in updt";
			}
		}else
			{
				$i="INSERT INTO comment_status (user_id,comment_id,rate)values('$user_id','$comment_id','$rate')";
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