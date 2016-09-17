<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['q']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    $msg_id=$_REQUEST['q'];
    
    require 'mysqli_connect.php';
    $q="delete from group_messages where grp_msg_id=$msg_id";
    $r=mysqli_query($dbc,$q);
    
}
