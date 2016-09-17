<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
 {
     header("location:index.php");
 }
 else{
     $user_id=$_SESSION['user_id'];
     $qlty=$_REQUEST['qlt'];
     require 'mysqli_connect.php';
     $q="select user_id as u from person_config where user_id=$user_id";
     $r=  mysqli_query($dbc, $q);
     if($r)
     {
         if(mysqli_num_rows($r)>0)
         {
             $q2="update person_config set speed_up='$qlty' where user_id=$user_id";
             $r2=  mysqli_query($dbc, $q2);
             if($r2)
             {
                 echo 'ipdt';
             }
                 
         }else
         {
             $q2="insert into person_config (user_id,speed_up)values($user_id,'$qlty')";
             $r2=  mysqli_query($dbc, $q2);
             
         }
         
     }
     
 }