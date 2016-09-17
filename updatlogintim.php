<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) )
{
    header("location:index.php");
}else
{
  $user_id=$_SESSION['user_id'];
$cday=date('F j, Y');
  $curtime=date("g:i a,s");
  
  
  require 'mysqli_connect.php';
  $q="select myupdate as up from access where user_id=$user_id";
  $r=mysqli_query($dbc,$q);
  if($r)
  {
      if(mysqli_num_rows($r)>1)
      {
          $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
          $myp=$row['up'];
          if($myp=="1")
          {
             $q3="select acc_id as ac from access where user_id=$user_id and myupdate='$myp' limit 1";
           
          }
          if($myp=="2")
          {
              $q3="select acc_id as ac from access where user_id=$user_id and myupdate='$myp' order by acc_id desc limit 1";
          
          }
          $r3=mysqli_query($dbc,$q3);
          if($r3)
          {
              $row=mysqli_fetch_array($r3,MYSQLI_ASSOC);
              $acc_id=$row['ac'];
          }
          $q2="update access set logout='$curtime',day='$cday' where acc_id=$acc_id";
          $r2=mysqli_query($dbc,$q2);
          if($r2)
          {
          }
      }
  }
}