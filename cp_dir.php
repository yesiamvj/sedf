<?php

       function compress_image($source_url, $destination_url, $quality) {
	$info = getimagesize($source_url);
 
	if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
	elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
	elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
 
	//save it
	imagejpeg($image, $destination_url, $quality);
      
	//return destination file url
	return $destination_url;
}
require 'mysqli_connect.php';
$q="select username as u,user_id as uid  from users ";
$r=  mysqli_query($dbc, $q);
if($r)
{
       if(mysqli_num_rows($r)>0)
       {
              while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
              {
	    $usename=$row['u'];
	    $user_id=$row['uid'];
	    
	   $qw="select update_pics as p from profile_pics where user_id=$user_id order by pic_id desc limit 1";
	   $rw=  mysqli_query($dbc, $qw);
	   if($rw)
	   {
	          if(mysqli_num_rows($rw)>0)
	          {
		$pic_row=  mysqli_fetch_array($rw,MYSQLI_ASSOC);
		$p_pics=$pic_row['p'];
		$name=$p_pics;
		
	          }else
	          {
		 $qs="select sex as s from basic where user_id=$user_id";
                        $rs=mysqli_query($dbc,$qs);
                        if($rs)
                        {
                            $et=  mysqli_fetch_array($rs,MYSQLI_ASSOC);
                            $sex=$et['s'];
                            if($sex=="girl")
                            {
                                $name="../web/icons/female.png";
                            }else
                            {
                                    $name="../web/icons/male.png";
                            }
                        }
	          }
	   }
	   
	    $qx="select update_wall as c from wall_pics where user_id=$user_id";
$rx=mysqli_query($dbc,$qx);
if($rx)
{
    if(mysqli_num_rows($rx)>0)
    {
        $roe=mysqli_fetch_array($rx,MYSQLI_ASSOC);
        $w_pic=$roe['c'];
        
    }else
    {
        $w_pic="";
    }
}



$q5='../'.$usename.'/ppic5.jpg';
$q10='../'.$usename.'/ppic10.jpg';
$q25='../'.$usename.'/ppic25.jpg';
$q50='../'.$usename.'/ppic50.jpg';
$q75='../'.$usename.'/ppic75.jpg';

$u5='../'.$user_id.'/ppic5.jpg';
$u10='../'.$user_id.'/ppic10.jpg';
$u25='../'.$user_id.'/ppic25.jpg';
$u50='../'.$user_id.'/ppic50.jpg';
$u75='../'.$user_id.'/ppic75.jpg';

        $r1=compress_image($name,$q5,5);
       $r2=compress_image($name,$q10,10);
       $r3=compress_image($name,$q25,25);
       $r4=compress_image($name,$q50,50);
       $r5=compress_image($name,$q75,75);
       
        $r6=compress_image($name,$u5,5);
       $r7=compress_image($name,$u10,10);
       $r8=compress_image($name,$u25,25);
       $r9=compress_image($name,$u50,50);
       $r10=compress_image($name,$u75,75);

$q5='../'.$usename.'/wpic5.jpg';
$q10='../'.$usename.'/wpic10.jpg';
$q25='../'.$usename.'/wpic25.jpg';
$q50='../'.$usename.'/wpic50.jpg';
$q75='../'.$usename.'/wpic75.jpg';

$u5='../'.$user_id.'/wpic5.jpg';
$u10='../'.$user_id.'/wpic10.jpg';
$u25='../'.$user_id.'/wpic25.jpg';
$u50='../'.$user_id.'/wpic50.jpg';
$u75='../'.$user_id.'/wpic75.jpg';
          $r11=compress_image($w_pic,$q5,5);
      $r12=compress_image($w_pic,$q10,10);
       $r13=compress_image($w_pic,$q25,25);
       $r14=compress_image($w_pic,$q50,50);
       $r15=compress_image($w_pic,$q75,75);
       
             $r16= compress_image($w_pic,$u5,5);
       $r17=compress_image($w_pic,$u10,10);
       $r18=compress_image($w_pic,$u25,25);
       $r19=compress_image($w_pic,$u50,50);
       $r20=compress_image($w_pic,$u75,75);
       if($r1)
       {
              echo 'created '.$usename.'';
       }else
       {
              echo 'not created '.$usename.'';
       }
       if($r2)
       {
              echo 'created '.$usename.'';
       }else
       {
              echo 'not created '.$usename.'';
       }
       if($r3)
       {
              echo 'created '.$usename.'';
       }else
       {
              echo 'not created '.$usename.'';
       }
       if($r4)
       {
              echo 'created '.$usename.'';
       }else
       {
              echo 'not created '.$usename.'';
       }
       if($r5)
       {
              echo 'created '.$usename.'';
       }else
       {
              echo 'not created '.$usename.'';
       }
       if($r6)
       {
              echo 'created '.$usename.'';
       }else
       {
              echo 'not created '.$usename.'';
       }
       if($r7)
       {
              echo 'created '.$usename.'';
       }else
       {
              echo 'not created '.$usename.'';
       }
       if($r8)
       {
              echo 'created '.$usename.'';
       }else
       {
              echo 'not created '.$usename.'';
       }
       if($r9)
       {
              echo 'created '.$usename.'';
       }else
       {
              echo 'not created '.$usename.'';
       }
       if($r10)
       {
              echo 'created '.$usename.'';
       }else
       {
              echo 'not created '.$usename.'';
       }
       if($r11)
       {
              echo 'created '.$usename.'';
       }else
       {
              echo 'not created '.$usename.'';
       }
       if($r12)
       {
              echo 'created '.$usename.'';
       }else
       {
              echo 'not created '.$usename.'';
       }
       if($r13)
       {
              echo 'created '.$usename.'';
       }else
       {
              echo 'not created '.$usename.'';
       }
       if($r14)
       {
              echo 'created '.$usename.'';
       }else
       {
              echo 'not created '.$usename.'';
       }
       if($r15)
       {
              echo 'created '.$usename.'';
       }else
       {
              echo 'not created '.$usename.'';
       }
       if($r16)
       {
              echo 'created '.$usename.'';
       }else
       {
              echo 'not created '.$usename.'';
       }
       if($r17)
       {
              echo 'created '.$usename.'';
       }else
       {
              echo 'not created '.$usename.'';
       }
       if($r18)
       {
              echo 'created '.$usename.'';
       }else
       {
              echo 'not created '.$usename.'';
       }
       if($r19)
       {
              echo 'created '.$usename.'';
       }else
       {
              echo 'not created '.$usename.'';
       }
       if($r20)
       {
              echo 'created '.$usename.'';
       }else
       {
              echo 'not created '.$usename.'';
       }
              }
       }
}