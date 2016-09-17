<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:home.php");
}else
{
       $user_id=$_SESSION['user_id'];
       $post_id=$_REQUEST['post_id'];
       require 'mysqli_connect.php';
       $q="select user_id as u from post_status where post_id=$post_id and user_id=$user_id";
       $r=  mysqli_query($dbc, $q);
       if($r)
       {
              if(mysqli_num_rows($r)>0)
              {
	$q1="update post_status set seen_post=$user_id where post_id=$post_id and user_id=$user_id";
	
	$r1=  mysqli_query($dbc, $q1);
	if($r1)
	{
	       echo 'updated';
	}  else {
	       echo 'not updat';
	echo mysqli_error($dbc);       
	}
              }  else {
	$q1="insert into post_status (user_id,post_id,seen_post)values($user_id,$post_id,$user_id)";
	$r1=  mysqli_query($dbc, $q1);
	if($r1)
	{
	       echo 'ins vies';
	}  else {
	echo mysqli_error($dbc);       
	}
              }
       }  else {
       echo mysqli_error($dbc);       
       }
              
}
