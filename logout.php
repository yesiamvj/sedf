<?php session_start();
if(isset($_SESSION['user_id']) || isset($_SESSION['user_name'])){
	$userid=$_SESSION['user_id'];
	require 'mysqli_connect.php';
	
   unset($_SESSION['user_id']);
   unset($_SESSION['user_name']);
    if(empty($_SESSION['user_id']))
    {
        header("location:index.php");
    }
    else{
        echo 'no empty use id it is '.$userid.'';
    }
    
}

 else {
    
    header("location:index.php");
}
?>



