<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['userid']))
{
    header("location:profile.php");
}else
{
 $myuser_id=$_SESSION['user_id'];
 $rmv_id=$_REQUEST['userid'];
 require 'mysqli_connect.php';
 $q="delete from requests where user_id=$myuser_id and reqstd_userid=$rmv_id";
 $r=mysqli_query($dbc,$q);
 if($r)
 {
     echo'Removed your request';
 }else
 {
     echo'Already Removed';
 }
    
}