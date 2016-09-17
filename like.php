<?php session_start();
if(empty($_SESSION['user_id']) )
{
	header("location:index.php");
}else
{
	$user_id=$_SESSION['user_id'];
	$post_id=$_REQUEST['post_id'];
	$status=$_REQUEST['like_or_inlike'];
       echo $post_id;
      
			$time= date("g:i a ,F j, Y"); 
	require 'mysqli_connect.php';
	$q="select liked_times as lk,unliked_times as uk from post_status where post_id=$post_id and user_id=$user_id";
	$r=  mysqli_query($dbc, $q);
	if($r)
	{
	       
	       $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
	        $tot_like=  $row['lk'];
	      $tot_like=$tot_like+1;
	       $tot_unlike=$row['uk'];
	       $tot_unlike=$tot_unlike+1;
	       $cal="SELECT post_id as pid from post_status where user_id=$user_id and post_id=$post_id";
		$rcal=mysqli_query($dbc,$cal);
		if($rcal)
		{
			if(mysqli_num_rows($rcal)>0)
			{
                                if($status=="1")
	               {
		  $q6="UPDATE post_status set l_seen=0,like_time='$time',like_userid='$user_id',liked_times='$tot_like' where post_id=$post_id and user_id=$user_id";
                                  $r6=mysqli_query($dbc,$q6);
                                	   if($r6)
		   {
		          echo 'sux';
		   }else
		   {
		          echo mysqli_error($dbc);
		   }
	               }
	               if($status=="0")
	               {
		     $q6="UPDATE post_status set u_seen=0,unlike_time='$time',unlike_userid='$user_id',unliked_times='$tot_unlike' where post_id=$post_id and user_id=$user_id";
                                  $r6=mysqli_query($dbc,$q6);
                                	  if($r6)
		   {
		          echo 'sux';
		   }else
		   {
		          echo mysqli_error($dbc);
		   }
	               }
	               echo $q6;
                                   
			}else{
                            if($status=="1")
	           {
		$like="INSERT INTO `post_status` (`post_id`,unlike_time ,`like_userid`, `unlike_userid`, `rating`, `post_status_id`,user_id,u_seen,unliked_times) VALUES ('$post_id', '$time','0', '$user_id', '0', NULL,$user_id,0,1)";
	 
	           }else
	           {
		$like="INSERT INTO `post_status` (`post_id`, `like_userid`, `unlike_userid`, `rating`, `post_status_id`,user_id,like_time,l_seen,liked_times) VALUES ('$post_id', '$user_id', '0', '0', NULL,$user_id,'$time',0,1)";
	 
	           }
	    	$rlik=mysqli_query($dbc,$like);
		

			}
		}else
                {
                    echo"not run";
                }
	}
	
}


?>