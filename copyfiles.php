<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
	header("location:index.php");
}else
{
	$user_id=$_SESSION['user_id'];
        $today = date("g:i a ,F j, Y"); 
	require 'mysqli_connect.php';
	$files_id=mysqli_real_escape_string($dbc,$_REQUEST['media']);
        $q1="select media as m,size as s from folder_contents where fc_id=$files_id";
        $r1=mysqli_query($dbc,$q1);
        if($r1)
        {
            if(mysqli_num_rows($r1)>0)
            {
                while($rt=  mysqli_fetch_array($r1,MYSQLI_ASSOC))
                {
                    $med_file=$rt['m'];
                    $size=$rt['s'];
                    $q="insert into copied_files (user_id,media,size,time)values($user_id,'$med_file','$size','$today')";
        $r=mysqli_query($dbc,$q);
        if($r)
        {
            echo'Your Files Copied Successfuly...';
        }else
        {
            echo'Try again...';
        }
                }
            }
        }
        
        $size=$_REQUEST['size'];
        
	
}