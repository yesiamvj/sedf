<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['page_id']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    require 'mysqli_connect.php';
    $page_id=$_REQUEST['page_id'];
    $mem_id=$_REQUEST['mem_id'];
    $n=1;
    $q="delete from page_status where followers=$mem_id and page_id=$page_id ";
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