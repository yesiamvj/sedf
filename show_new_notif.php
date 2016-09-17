<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    $notif_id=$_REQUEST['q'];
    require 'mysqli_connect.php';
    $q="update notification set seen=1 where my_notif_id=$notif_id";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        echo'updated';
    }
    
}