<?php session_start();
if(empty($_SESSION['user_id']) )
{
	header("location:index.php");
}else
{
	
	$user_id=$_SESSION['user_id'];
	$cmnt1_id=$_REQUEST['like'];
	$cmnt2_id=$_REQUEST['unlike'];
	echo "$cmnt1_id  $cmnt2_id";
	require 'mysqli_connect.php';
	if(!empty($cmnt1_id))
	{
		$cal="SELECT comment_id as pid from comment_status where user_id=$user_id and comment_id=$cmnt1_id";
		$rcal=mysqli_query($dbc,$cal);
		if($rcal)
		{
		
			if(mysqli_num_rows($rcal)>0)
			{
				$q6="UPDATE comment_status set c_unlike_userid='0',c_like_userid='$user_id' where comment_id=$cmnt1_id and user_id=$user_id";
				$r6=mysqli_query($dbc,$q6);
				if($r6)
				{
					echo"ur unlike removed<br/>";
				}else{
					echo "err in UPDATE";
				}
			

			}else{
	    $like="INSERT INTO comment_status(user_id,c_like_userid,comment_id) VALUES ('$user_id', '$user_id',$cmnt1_id)";
		$rlik=mysqli_query($dbc,$like);
		if($rlik)
		{
			echo "liked cmnt";
		}else{
			echo"not run to  like";
		}

			}
		}else{
			echo "not run q";
		}
	
	}
	if(!empty($cmnt2_id))
	{
		echo "in !empty cid $cmnt2_id";
		$ucal="SELECT comment_id as pid from comment_status where user_id=$user_id and comment_id=$cmnt2_id";
		$urcal=mysqli_query($dbc,$ucal);
		if($urcal)
		{
			echo "in run";
			if(mysqli_num_rows($urcal)>0)
			{
			
		echo "in update";
				$ul="UPDATE comment_status set c_like_userid='0' ,c_unlike_userid='$user_id' where comment_id=$cmnt2_id and user_id=$user_id";
				$rip=mysqli_query($dbc,$ul);
				if($rip)
				{
					echo"really removed ur like<br/>";
				}else{
					echo"not removed";
				}	
				}else{
	    $unlike="INSERT INTO comment_status (`comment_id`,`c_unlike_userid`, user_id) VALUES ('$cmnt2_id', '$user_id',$user_id)";
		$urlik=mysqli_query($dbc,$unlike);
		if($urlik)
		{
			echo "ins unlik";
		}else{
			echo"not run unlike";
		}

			}
		}
	
	}else{
		echo "empty c_id";
	}
}


?>