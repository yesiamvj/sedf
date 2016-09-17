<?php session_start();
   if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['my']))
   {
    header("location:index.php");
   }else
   {
          $user_id=$_SESSION['user_id'];
          require 'mysqli_connect.php';
        
          $q="select who_wished as w,wishes as wh from wishes where wished_to=$user_id";
          $r=  mysqli_query($dbc, $q);
          if($r)
          {
	if(mysqli_num_rows($r)>0)
	{
	       while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
	       {
	                     
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
	             
	       }  else {
	       echo mysqli_error($dbc);       
	       }
	       }
	echo 'Thanked successfully';
	}
          }
   }
   