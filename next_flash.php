<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) )
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    $flash_id=$_REQUEST['flash_id'];
    $change=$_REQUEST['q'];
    require 'mysqli_connect.php';
    if($change=="1")
    {
           $q="select flash as f,user_id as u,time as t,flash_id as fid,public as p,checks as ck from flash_news where flash_id<=$flash_id and flash_id!=$flash_id and checks=1 order by flash_id desc";
    }  else {
    $q="select flash as f,user_id as u,time as t,flash_id as fid,public as p,checks as ck from flash_news where flash_id>=$flash_id and flash_id!=$flash_id and  checks=1";       
    }
   
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
	 $check=$row['ck'];
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
	  $q3="select first_name as f,sex as s from basic where user_id=$flasher_id";
	 $r3=  mysqli_query($dbc, $q3);
	 if($r3)
	 {
	        if(mysqli_num_rows($r3)>0)
	        {
	               $rt=  mysqli_fetch_array($r3,MYSQLI_ASSOC);
	               $flsher_name=$rt['f'];
	               $sex=$rt['s'];
	        }else
	        {
	               $flsher_name="some one";
	               $sex="boy";
	        }
	 }
	  $q4="select p_pic as p from small_pics where user_id=$flasher_id";
	 $r4=mysqli_query($dbc,$q4);
	 if($r4)
	 {
	        if(mysqli_num_rows($r4)>0)
	        {
	               $rowx=  mysqli_fetch_array($r4,MYSQLI_ASSOC);
	               $p_pic=$rowx['p'];
	        }else
	        {
	               if($sex=="girl")
	               {
		     $p_pic="icons/female.png";
	               }else
	               {
		    $p_pic="icons/male.png";     
	               }
	           
	        }
	 }
	 $q2z="select username as u from users where user_id=$flasher_id";
	 $r2z=  mysqli_query($dbc, $q2z);
	 if($r2z)
	 {
	        $ed=  mysqli_fetch_array($r2z,MYSQLI_ASSOC);
	        $flasher_usernm=$ed['u'];
	 }
	 
	 if($showme==1)
	 {
	        break;
	 }else
	 {
	        continue;
	 }
	
	        
	 }
	  echo '<img src="'.$p_pic.'" width="30" height="30" > <a href="../'.$flasher_usernm.'" ><span class="FlashNewsOwner">'.$flsher_name.' : </span> </a>'.  htmlentities($flash).' <span class="FlashNewsTime"> <span class="timeDivider">|</span> '.$flashed_time.', Flash No '.$flash_id.'</span>';
	 echo '<input type="hidden" value="'.$flash_id.'" id="cur_flsh_id" />';
    
	 }  else {
	   $q="select flash as f,user_id as u,time as t,flash_id as fid,public as p from flash_news where flash_id=$flash_id and checks=1 order by flash_id desc";
    
 
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
	
	  $q3="select first_name as f,sex as s from basic where user_id=$flasher_id";
	 $r3=  mysqli_query($dbc, $q3);
	 if($r3)
	 {
	        if(mysqli_num_rows($r3)>0)
	        {
	               $rt=  mysqli_fetch_array($r3,MYSQLI_ASSOC);
	               $flsher_name=$rt['f'];
	               $sex=$rt['s'];
	        }else
	        {
	               $flsher_name="some one";
	               $sex="boy";
	        }
	 }
	 $q2z="select username as u from users where user_id=$flasher_id";
	 $r2z=  mysqli_query($dbc, $q2z);
	 if($r2z)
	 {
	        $ed=  mysqli_fetch_array($r2z,MYSQLI_ASSOC);
	        $flasher_usernm=$ed['u'];
	 }
	  $q4="select p_pic as p from small_pics where user_id=$flasher_id";
	 $r4=mysqli_query($dbc,$q4);
	 if($r4)
	 {
	        if(mysqli_num_rows($r4)>0)
	        {
	               $rowx=  mysqli_fetch_array($r4,MYSQLI_ASSOC);
	               $p_pic=$rowx['p'];
	        }else
	        {
	               if($sex=="girl")
	               {
		     $p_pic="icons/female.png";
	               }else
	               {
		    $p_pic="icons/male.png";     
	               }
	           
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
	  echo '<img src="'.$p_pic.'" width="30" height="30" > <a href="../'.$flasher_usernm.'" ><span class="FlashNewsOwner">'.$flsher_name.' : </span> </a>'.  htmlentities($flash).' <span class="FlashNewsTime"> <span class="timeDivider">|</span> '.$flashed_time.', Flash No '.$flash_id.'</span>';
	 echo '<input type="hidden" value="'.$flash_id.'" id="cur_flsh_id" />';
    
	 } 
    }    
	 echo '<input type="hidden" value="'.$flash_id.'" id="cur_flsh_id" />';
           
	 }
    }  else {
        echo '<input type="hidden" value="'.$flash_id.'" id="cur_flsh_id" />';
    
    }
	
}