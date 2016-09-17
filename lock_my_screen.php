<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['myword']))
{
    header("location:index.php");
}else
{
    $n=0;
    $user_id=$_SESSION['user_id'];
    require 'mysqli_connect.php';
    $q="select locked as lk from person_config where user_id=$user_id";
    $r=  mysqli_query($dbc, $q);
    if($r)
    {
           $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
           $pass=$row['lk'];
           if($pass=="0")
           {
	 $lock=1;
           }else
           {
	 $lock=0;
           }
           $q2="update person_config set locked=$lock where user_id=$user_id";
           $r2=  mysqli_query($dbc, $q2);
           if($r2)
           {
	 echo 'updated';
           }
           
    }
}