<?php session_start();
   if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['wish_id']))
   {
    header("location:index.php");
   }else
   {
          $user_id=$_SESSION['user_id'];
          require 'mysqli_connect.php';
          $wish_id=$_REQUEST['wish_id'];
          $q="update wishes set delt=1 where wish_id=$wish_id";
          $r=  mysqli_query($dbc, $q);
          if($r)
          {
	echo 'Successfully Deleted';
          }else
          {
	echo mysqli_error($dbc);
          }
   }