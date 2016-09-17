<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['his_id']))
{
    header("location:index.php");
}else
{echo'<div >';
    $user_id=$_SESSION['user_id'];
    $reposrted_id=$_REQUEST['his_id'];
 
    require 'mysqli_connect.php';
    $q1="select user_id as u,fake_id as fk from verify where user_id=$reposrted_id and verified_users=$user_id";
    $r1=mysqli_query($dbc,$q1);
    if($r1)
    {
        if(mysqli_num_rows($r1)>0)
        {
               $row=  mysqli_fetch_array($r1,MYSQLI_ASSOC);
               $fake=$row['fk'];
               $fake=1;
               
             $q="update verify set fake_id=$fake where user_id=$reposrted_id";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        echo'Reported';
    }else
    {
        echo'Try Again...';
    }
        }  else {
               $q2="insert into verify (user_id,verified_users,fake_id)values($reposrted_id,$user_id,1)";
               $r2=mysqli_query($dbc, $q2);
               if($r2)
               {
	     echo 'ins'; 
               }else
               {
	     echo mysqli_error($dbc);
               }
            
        }
    }
   
    
    
}