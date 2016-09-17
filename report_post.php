<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['q']))
{
	header("location:index.php");
}else
{
	$user_id=$_SESSION['user_id'];
	$post_id=$_REQUEST['q'];
        $cday=date('F j, Y');
  $curtime=date("g:i a,s");
  $time="$curtime $cday";
        require 'mysqli_connect.php';

        $q="select user_id as u from post_reports where user_id=$user_id";
        $r=  mysqli_query($dbc, $q);
        if($r)
        {
            if(mysqli_num_rows($r)>0)
            {
                
            }else
            {
                $q1="insert into post_reports(user_id,post_id,time)values($user_id,$post_id,'$time')";
                $r1=  mysqli_query($dbc, $q1);
                if($r1)
                {
                    echo'This is post is reported';
                }else
                {
                    echo 'Not Added';
                }
            }
        }
}