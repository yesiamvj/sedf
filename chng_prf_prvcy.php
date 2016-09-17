<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    $type=$_REQUEST['type'];
    $who_see=$_REQUEST['who_see'];
    require 'mysqli_connect.php';
    $q1="select user_id as u from profile_sets where user_id=$user_id";
    $r1=  mysqli_query($dbc, $q1);
    if($r1)
    {
           if(mysqli_num_rows($r1)>0)
           {
	 
	 $q="update profile_sets set $type='$who_see' where user_id=$user_id";
           }  else {
	$q="insert into profile_sets (user_id,$type)values($user_id,$who_see)"; 
           }
           $r=mysqli_query($dbc, $q);
           if($r)
           {
	 
           }else
           {
	 echo mysqli_error($dbc);
           }
    }
    
}