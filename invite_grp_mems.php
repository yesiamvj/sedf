<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    
    $users=$_REQUEST['users'];
    echo 'in php';
    require 'mysqli_connect.php';
    $q="select page_id as p from pages where user_id=$user_id order by page_id desc limit 1";
    $r=  mysqli_query($dbc, $q);
    if($r)
    {
           $today = date("g:i a ,F j, Y");
           if(mysqli_num_rows($r)>0)
           {
	 $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
	 $page_id=$row['p'];
	 
           } else
    {
           echo 'empty page';
    }
    } else
    {
           echo 'not run to slct 1st ';
    }
    $q1="select page_id as p from page_status where user_id=$users and page_id=$page_id";
    echo $q1;
    $r1=  mysqli_query($dbc, $q1);
    if($r1)
    {
           if(mysqli_num_rows($r1)>0)
           {
	 $q="update page_status set followers='$users' where page_id=$page_id and user_id=$users";
	 mysqli_query($dbc, $q);
           }else
           {
	 $q="INSERT INTO `page_status` (`page_id`, `followers`,user_id) VALUES ('$page_id', '$users',$users)";
	 echo $q;
    $rw=mysqli_query($dbc, $q);
    if($rw)
    {
           echo 'ins';
    }else
    {
           echo 'not ins';
           echo mysqli_error($dbc);
    }
           }
    }
    else
    {
           echo 'not run to slct<br/>';
           echo mysqli_error($dbc);
    }

   }