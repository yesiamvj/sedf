<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    $msg_id=$_REQUEST['q'];
    
    require 'mysqli_connect.php';
    $q="update messages set delt=1 where msg_id=$msg_id";
    $r=mysqli_query($dbc,$q);
    
}
