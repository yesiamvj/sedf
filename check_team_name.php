<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
     require 'mysqli_connect.php';
     $user_id=$_SESSION['user_id'];
    $team=mysqli_real_escape_string($dbc,trim($_REQUEST['team']));
   
    $q="select group_name as f from groups where group_name='$team' and user_id!=$user_id";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            echo'<span style="color:red;">Already exists</span> ';
        }  else {
         echo'<span style="color:navy;">Ok</span>';   
        }
    }
}