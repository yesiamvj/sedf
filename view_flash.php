<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) )
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    require 'mysqli_connect.php';
     $q="select flash as f,user_id as u,time as t,flash_id as fid,public as p from flash_news where   checks=1 order by flash_id desc ";
    $r=  mysqli_query($dbc, $q);
    if($r)
    {
           if(mysqli_num_rows($r)>0)
           {
	 while ($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
	 {
	 $flash=$row['f'];
	 $flasher_id=$row['u'];
	 $flashed_time=$row['t'];
	 $flash_id=$row['fid'];
	 $pubic=$row['p'];
	 $showme=0;
	 if($pubic==1)
	 {
	        $showme=1;
	 }  else {
	        
	 $q1="select cu_id as c from contacts where user_id=$user_id and cu_id=$flasher_id or user_id=$flasher_id";
	 $r1=  mysqli_query($dbc, $q1);
	 if($r1)
	 {
	        if(mysqli_num_rows($r1)>0)
	        {
	               $showme=1;
	        }
	 }
	 }
	  $q3="select first_name as f from basic where user_id=$flasher_id";
	 $r3=  mysqli_query($dbc, $q3);
	 if($r3)
	 {
	        if(mysqli_num_rows($r3)>0)
	        {
	               $rt=  mysqli_fetch_array($r3,MYSQLI_ASSOC);
	               $flsher_name=$rt['f'];
	        }else
	        {
	               $flsher_name="some one";
	        }
	 }
	 if($showme==1)
	 {
	        break;
	 }else
	 {
	        continue;
	 }
	
	        
	 }
	 }
    }
	 echo '<span class="FlashNewsOwner">'.$flsher_name.' : </span> '.  htmlentities($flash).' <span class="FlashNewsTime"> <span class="timeDivider">|</span> '.$flashed_time.', Flash No '.$flash_id.'</span>';
     
}

?>