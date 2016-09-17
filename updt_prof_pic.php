<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) )
{
  header("location:index.php");
}else
{
		 require 'mysqli_connect.php';
	 $user_id=$_SESSION['user_id'];
	 $p_pic=$_FILES['p_pic']['name'];
	 echo $p_pic;
	 require 'mysqli_connect.php';
	 $p_pic=  mysqli_real_escape_string($dbc,$p_pic);
	 $q="select user_id as u from profile_pics where user_id=$user_id";
	 $r=  mysqli_query($dbc, $query);
	 if($r)
	  {
	        if(mysqli_num_rows($r)>0)
	        {
	               
	        }  else {
	        $q2="insert into profile_pics (user_id,p_pic,update_pic)values($user_id)";       
	        }
	 }
	 }