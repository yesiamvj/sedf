<?php session_start();
 if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['postid']))
 {
     header("location:index.php");
 }
 else{
     $user_id=$_SESSION['user_id'];
     $post_id=$_REQUEST['postid'];
     $rate=$_REQUEST['rate_cnt'];
     require 'mysqli_connect.php';
     $q="select rating as r from post_status where post_id=$post_id and rating=$rate";
     
     $r=mysqli_query($dbc,$q);
     if($r)
     {
         $tot_rate=  mysqli_num_rows($r);
         echo ''.$tot_rate.'';
     }else
     {
         echo mysqli_error($dbc);
     }
 }