<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    $page_id=$_REQUEST['page_id'];
    $users=$_REQUEST['users'];
    require 'mysqli_connect.php';
    $q="select page_id as p,user_id as u from pages where user_id=$user_id order by page_id desc limit 1";
    $r=  mysqli_query($dbc, $q);
    if($r)
    {
           $today = date("g:i a ,F j, Y");
           if(mysqli_num_rows($r)>0)
           {
	 $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
	
	 $admin_id=$row['u'];
	 
           }
    }
    
    if($admin_id==$user_id)
    {
           $q1="select user_id as f from page_status where page_id=$page_id and user_id=$users";
           $r1=  mysqli_query($dbc, $q1);
           if($r1)
           {
	 if(mysqli_num_rows($r1)>0)
	 {
	  $q="update page_status set followers='$users' where page_id=$page_id and user_id=$users";
	  mysqli_query($dbc, $q);
	 }else
	 {
	            $q="INSERT INTO `page_status` (`page_id`,`followers`,user_id) VALUES ('$page_id', '$users',$user_id)";
    $r=mysqli_query($dbc, $q);
	 }
           }
        
    if($r)
    {
           echo 'Members Added '.$page_id.'';
    }  else {
    echo mysqli_error($dbc);       
    }
    }else
    {
           echo 'You are not admin to this group';
    }
    

   }