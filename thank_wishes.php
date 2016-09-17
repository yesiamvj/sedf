<?php session_start();
   if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['wish_id']))
   {
    header("location:index.php");
   }else
   {
          $user_id=$_SESSION['user_id'];
          require 'mysqli_connect.php';
          $wish_id=$_REQUEST['wish_id'];
          $q="select who_wished as w,wishes as wh from wishes where wish_id=$wish_id";
          $r=  mysqli_query($dbc, $q);
          if($r)
          {
	if(mysqli_num_rows($r)>0)
	{
	       $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
	       $wisher_id=$row['w'];
	       $wises=$row['wh'];
	       if(strlen($wises)>10)
	       {
	              $wises=  substr($wises,0, 10);
	              $wises="$wises...";
	              $wises=  mysqli_real_escape_string($dbc,$wises);
	       }
	       $q1="insert into notification (user_id,cu_id,notice,officiale)values($user_id,$wisher_id,'Thanked you for your Wishes<br/>$wises',1)";
	       $r1=  mysqli_query($dbc, $q1);
	       if($r1)
	       {
	              echo 'Thanked Successfully';
	       }  else {
	       echo mysqli_error($dbc);       
	       }
	}
          }
   }
   