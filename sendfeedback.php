<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['myw']))
{
    header("location:index.php");
}else
{
   $user_id=$_SESSION['user_id'];
   $fdb=$_REQUEST['feat'];
   $today = date("g:i a ,F j, Y"); 
   
   require 'mysqli_connect.php';
   $q="insert into for_us(user_id,feedback,time)values($user_id,'$fdb','$today')";
   $r=mysqli_query($dbc,$q);
   if($r)
   {
       echo'Success';
   }else
   {
       echo'Try again';
   }
}