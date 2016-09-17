<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['q']))
{
    
}  else 
{
    
       
  $usename=$_SESSION['user_name'];
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
 
  
if(strpos($_REQUEST['q'],"image")>0)
{
       $data=$_REQUEST['q'];
list($type, $data) = explode(';', $data);
list(, $data)      = explode(',', $data);
$data = base64_decode($data);
$user_name=$_SESSION['user_name'];
$user_id=$_SESSION['user_id'];

require 'mysqli_connect.php';
$rand=rand(00000000,9999999999999999);
$name='../'.$user_name.'/storage/publicfolder/post/images/profileimages/'.$rand.'myimg.png';
$r=file_put_contents('../'.$user_name.'/storage/publicfolder/post/images/profileimages/'.$rand.'myimg.png', $data);
if($r)
{
    
           
       $u5='../'.$user_id.'/ppic5.jpg';
$u10='../'.$user_id.'/ppic10.jpg';
$u25='../'.$user_id.'/ppic25.jpg';
$u50='../'.$user_id.'/ppic50.jpg';
$u75='../'.$user_id.'/ppic75.jpg';

$q5='../'.$usename.'/ppic5.jpg';
$q10='../'.$usename.'/ppic10.jpg';
$q25='../'.$usename.'/ppic25.jpg';
$q50='../'.$usename.'/ppic50.jpg';
$q75='../'.$usename.'/ppic75.jpg';




        compress_image($name,$q5,5);
       compress_image($name,$q10,10);
       compress_image($name,$q25,25);
       compress_image($name,$q50,50);
       compress_image($name,$q75,75);
       
       compress_image($name,$u5,5);
       compress_image($name,$u10,10);
       compress_image($name,$u25,25);
       compress_image($name,$u50,50);
       compress_image($name,$u75,75);

				$today = date("g:i a ,F j, Y"); 
 $q="insert into profile_pics (user_id,p_pic)values($user_id,'$name')";
 $r1=mysqli_query($dbc,$q);
 if($r1 && $r)
 {
     $qe="update profile_pics set update_pics='$name' where user_id=$user_id";
     $re=mysqli_query($dbc,$qe);
      $qs="select sex as s from basic where user_id=$user_id";
                        $rs=mysqli_query($dbc,$qs);
                        if($rs)
                        {
                            $et=  mysqli_fetch_array($rs,MYSQLI_ASSOC);
                            $sex=$et['s'];
                            if($sex=="girl")
                            {
                                $gen="her";
                            }else
                            {
                                $gen="his";
                            }
                        }
                        
              $qw="insert into post_permision (user_id,allrelation,allpeople,me,officiale)values('$user_id','1','0',1,1)";
                    
            $rw=mysqli_query($dbc,$qw);
                if($rw)
                {
                   
                   
                    $qe="select post_id as p from post_permision where user_id=$user_id order by post_id desc limit 1";
	     $re=mysqli_query($dbc,$qe);
                    if($re)
                    {
	           $ros=  mysqli_fetch_array($re,MYSQLI_ASSOC);
                    $pos_id=$ros['p'];
                    
                        $qr="insert into postforall (user_id,post_id,post_time,post_feelings)values($user_id,$pos_id,'$today','Changed $gen Profile Picture')";
                        $rr=mysqli_query($dbc,$qr);
                          $qr="insert into post_images (user_id,post_id,post_image)values($user_id,$pos_id,'$name')";
                        $rr=mysqli_query($dbc,$qr);
                        if($rr)
                        {
                              $qws="insert into post_ctgry(post_id,category,disc,user_id)values($pos_id,2,'Changed $gen Profile Picture',$user_id)";
                            $rws=mysqli_query($dbc,$qws);
                        }else
                        {
                            echo'no';
                        }
      $qt="select cu_id as u from contacts where user_id=$user_id";
     $rt=mysqli_query($dbc,$qt);
     if($rt)
     {
         if(mysqli_num_rows($rt)>0)
         {
             while($rop=  mysqli_fetch_array($rt,MYSQLI_ASSOC))
             {
                 $cu_id=$rop['u'];
                 $qs="insert into notification (user_id,cu_id,seen,time,discription,officiale)values($user_id,$cu_id,0,'Changed $gen Profile Picture',$user_id','',1)";
                 $rs=mysqli_query($dbc,$qs);
             }
         }
     }
     
                    }  else {
                        echo mysqli_error($dbc);
                    }
                }
     echo'<img src="'.$name.'" ><script type="text/javascript">$(document).ready(function()
{           $(\'.cropped\').append(\'<span id="ppicchngd">Profile Image Changed...</span>\');
            $(\'.curprofimg\').attr("src","'.$name.'");
         
                $(\'#my_prev_prof_pic\').html(\'<img src="'.$name.'" />\');
    
});  </script>';
        
            $img_lco="../$user_name/storage/publicfolder/post/images/profileimages/smallimages/mysmartimg.png";
           $med_lco="../$user_name/storage/publicfolder/post/images/profileimages/medimages/mymedimg.png";
           
            compress_image($name,$img_lco,8);
             compress_image($name,$med_lco,25);
            
            $qa="select pic_id as p from small_pics where user_id=$user_id";
            $ra=mysqli_query($dbc,$qa);
            if($ra)
            {
                if(mysqli_num_rows($ra)>0)
                {
                    $wt="update small_pics set p_pic='$img_lco',med_img='$med_lco' where user_id=$user_id";
                    $rts=  mysqli_query($dbc, $wt);
                }  else {
                    $qw="INSERT INTO `small_pics` (`pic_id`, `user_id`, `p_pic`, `med_img`) VALUES (NULL, '$user_id', '$img_lco', '$med_lco')";
   
                         $rw=mysqli_query($dbc,$qw);
                }
            }
     
     if($rw)
     {
         
     }else
     {
     }
 }
}
}  else {
echo 'Please Upload an Image to Change Profile Picture';       
}


}
?>