<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['batl_id']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    require 'mysqli_connect.php';
    $group_id=$_REQUEST['batl_id'];
  
    $q="delete from group_members where members_id=$user_id and group_id=$group_id ";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
           echo 'Removed Successfully';
    }else
    {
           echo'Not removed';
           echo mysqli_error($dbc);
    }
}