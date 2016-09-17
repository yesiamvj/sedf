<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
	header("location:index.php");
}else
{
	$user_id=$_SESSION['user_id'];
	$toverifyid=$_REQUEST['q'];
	require 'mysqli_connect.php';
	echo "to verify id =$toverifyid & userid is $user_id";
	$q="select veryfied_times as vt from verify where user_id=$toverifyid order by verify_id desc";
	$r=mysqli_query($dbc,$q);
	if($r)
	{
		if(mysqli_num_rows($r)>0)
		{

			$row=mysqli_fetch_array($r);
			$times=$row['vt'];
			if($times>5 || $times==5)
			{
				echo "verified";
			}else
			{
				$times=$times+1;
				$q1="select verified_users from verify where verified_users=$user_id and user_id=$toverifyid";
			$r1=mysqli_query($dbc,$q1);
			if($r1)
			{
				if(mysqli_num_rows($r1)>0)
				{
					echo "Already verified By You";
				}
		else
			{
				$q="insert into verify (user_id,verified_users,veryfied_times)values($toverifyid,$user_id,$times)";
				$r=mysqli_query($dbc,$q);
				if($r)
				{

						echo'<script type="text/javascript">
						$(document).ready(function()
							{
								#$(\'#doVerify\').hide();
								$(\'#iAmExist\').fadeToggle(500);
							});
						</script>';
				}else
				{
					echo'not ins 1st';
				}
				}
			
			}else
			{
				echo'not run here';
			}

			}

		}else
		{

			$q1="select verified_users from verify where verified_users=$user_id and user_id=$toverifyid";
			$r1=mysqli_query($dbc,$q1);
			if($r1)
			{
				if(mysqli_num_rows($r1)>0)
				{
					echo "Already verified By You";
				}
		else
			{
				$q="insert into verify (user_id,verified_users,veryfied_times)values($toverifyid,$user_id,1)";
				$r=mysqli_query($dbc,$q);
				if($r)
				{

						echo'<script type="text/javascript">
						$(document).ready(function()
							{
								#$(\'#doVerify\').hide();
								$(\'#iAmExist\').fadeToggle(500);
							});
						</script>';
				}else
				{
					echo'not ins 1st';
				}
				}
			
			}else
			{
				echo'not run here';
			}
		}
	}else
	{
		echo'not run st';
	}
}
?>
